<?php

session_start();
require('../includes/fpdf.php');
require_once("../includes/class.Conexion.BD.php");
require_once("../config/parametros.php");



if ($_SESSION['ingreso']) {

    $conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
    if ($conn->conectar()) {
        $sqlVideosPerRating = "SELECT * FROM videos ORDER BY rating DESC";
        if ($conn->consulta($sqlVideosPerRating)) {
            $videosPerRating = $conn->restantesRegistros();

            $sqlPerComments = "select v.*, c3.commentCount from videos as v join (select distinct c.idVideo, commentCount from comments as c join 
                                (select idVideo, count(*) as commentCount from comments group by idVideo)
                                as c2 on (c.idVideo = c2.idVideo) order by c2.commentCount desc) as c3 on v.idVideo = c3.idVideo;";
            if ($conn->consulta($sqlPerComments)) {
                $videosPerComment = $conn->restantesRegistros();
            } else {
                $result = array("success" => false);
                echo json_encode($result);
            }
        } else {
            $result = array("success" => false);
            echo json_encode($result);
        }
        $conn->desconectar();
    } else {

        $result = array("success" => false);
        echo json_encode($result);
    }
} else {
    $result = array("success" => false);
    echo json_encode($result);
}

class PDF extends FPDF {

    
// Load data
    function LoadData($videos, $perComment, $title) {
        $this->title = $title;
        $data = array();
        if ($perComment)
            foreach ($videos as $video) {
                $data[] = array($video['idVideo'], $video['title'], $video['commentCount'], $video['votes']);
            } else
            foreach ($videos as $video) {
                $data[] = array($video['idVideo'], $video['title'], $video['rating'], $video['votes']);
            }
        return $data;
    }

    function Header() {

        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30, 10, $this->title, 1, 0, 'C');
        // Line break
        $this->Ln(20);
    }

// Colored table
    function FancyTable($header, $data) {
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(40, 60, 50, 30);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }

}

$pdf = new PDF();
// Column headings
$header = array('Video Id', 'Title', 'Comments Count', 'Votes');
// Data loading
$data = $pdf->LoadData($videosPerComment, true, "Videos per Comments");
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->FancyTable($header, $data);

$header2 = array('Video Id', 'Title', 'Rating', 'Votes');
// Data loading
$data = $pdf->LoadData($videosPerRating, false, "Videos per Rating");
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->FancyTable($header2, $data);


$url = '../temp/Pdf/test.pdf';
$pdf->Output($url, 'F');

$result = array("success" => true, "new_pdf_url" => $url);
echo json_encode($result);
