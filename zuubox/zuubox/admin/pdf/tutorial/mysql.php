<?php

define('FPDF_FONTPATH', '.');
require('../fpdf.php');

$conn = mysql_connect("localhost", "root", "");
mysql_select_db("food4Thought", $conn);

$result = mysql_query("SELECT * from `tbl_audit` LIMIT 1");
while ($record = mysql_fetch_assoc($result)) {
    $data = $record;
}

class PDF extends FPDF {
    function Header()
    {
        $this->Cell(80);
        $this->Cell(50,10,'Audit Report',1,0,'C');
        $this->Ln(20);
    }

// Colored table
    function FancyTable($header, $data) {
        // Colors, line width and bold font
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        // Header
        $width = array(50, 140);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($width[$i], 7, $header[$i], 1, 0, 'L', true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        foreach ($data as $key => $value) {
            if ($key != "audit_id" && $key != "user_id") {
                $this->Cell($width[0], 6, $key, 'LR', 0, 'L', $fill);
                $this->Cell($width[1], 6, $value, 'LR', 0, 'L', $fill);
                $this->Ln();
                $fill = !$fill;
            }
        }
        // Closing line
        $this->Cell(array_sum($width), 0, '', 'T');
    }

}

$pdf = new PDF();
// Column headings
$header = array('Key', 'Value');
$pdf->AddFont('Gotham', '', 'GothamBook.php');
$pdf->SetFont('Gotham', '', 14);
$pdf->AddPage();
$pdf->FancyTable($header, $data);
$pdf->Output();
?>
