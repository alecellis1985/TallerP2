<?php

session_start();
require('../includes/PDFCreator.php');
require_once("../includes/class.Conexion.BD.php");
require_once("../config/parametros.php");
require_once("../includes/MessageHandler.php");

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
                $response = MessageHandler::getSuccessResponse('Pdf Generated', $url);
            }
        }
        $conn->desconectar();
    }
}

if($response == null)
{
    header('HTTP/1.1 400 Bad Request');
    echo MessageHandler::getDBErrorResponse();
}
else
{
    echo $response;
}


