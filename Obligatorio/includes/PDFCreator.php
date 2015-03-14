<?php
require('../includes/fpdf.php');
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
