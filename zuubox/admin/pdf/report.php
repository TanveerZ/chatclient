<?php

define('FPDF_FONTPATH', '.');
require('fpdf2.php');

$conn = mysql_connect("localhost", "root", "");
mysql_select_db("food4thought", $conn);

$result = mysql_query("SELECT * from `tbl_audit` LIMIT 1");
while ($record = mysql_fetch_assoc($result)) {
    $data = $record;
}

class PDF extends FPDF {
    

// Colored table
function TableHeader($data) {	
	$this->SetFont('Gotham', '', 10);
	$this->Cell(120,2,'Food Service Establishment Inspection Report',0,0,'C');
	$this->Ln(7);	
	$this->SetFont('Gotham', '', 9);
	$this->Cell(35,2,'Establishment Name :',0,0,'L');
	$this->SetFont('Gotham', '', 11);
	$this->Cell(50,2,$data['name'],0,0,'L');
	$this->Ln(6);
	$this->SetFont('Gotham', '', 9);
	$this->Cell(16,2,'Address :',0,0,'L');
	$this->SetFont('Gotham', '', 11);
	$this->Cell(50,2,$data['address'],0,0,'L');
	$this->Ln(6);
	$this->SetFont('Gotham', '', 9);
	$this->Cell(9,2,'City :',0,0,'L');
	$this->SetFont('Gotham', '', 11);
	$this->Cell(25,2,$data['city'],0,0,'L');
	$this->SetFont('Gotham', '', 9);
	$this->Cell(15,2,'Time In :',0,0,'L');
	$this->SetFont('Gotham', '', 11);
	$this->Cell(14,2,$data['time_in'],0,0,'L');
	$this->SetFont('Gotham', '', 9);
	$this->Cell(17,2,'Time Out :',0,0,'L');
	$this->SetFont('Gotham', '', 11);
	$this->Cell(12,2,$data['time_out'],0,0,'L');
	$this->Ln(6);
	$this->SetFont('Gotham', '', 9);
	$this->Cell(28,2,'Inspection Date :',0,0,'L');
	$this->SetFont('Gotham', '', 11);
	$this->Cell(28,2,date("F j, Y",strtotime($data['inspection_date'])),0,0,'L');
	$this->SetFont('Gotham', '', 9);
	$this->Cell(12,2,'CFSM :',0,0,'L');
	$this->SetFont('Gotham', '', 11);
	$this->Cell(28,2,$data['cfsm'],0,0,'L');
	$this->Ln(6);
	$this->SetFont('Gotham', '', 9);
	$this->Cell(38,2,'Purpose of Inspection :',0,0,'L');
	$this->SetFont('Gotham', '', 11);
	$this->Cell(20,2,'Routine',0,0,'L');
	if (strpos($data['purpose'], 'Routine') !== false) {
		$this->Image('images/ok.png',65,41,-300);
	} else {
		$this->Image('images/cross.png',65,41,-300);
	}
	$this->Cell(26,2,'Follow-up',0,0,'L');
	if (strpos($data['purpose'], 'Follow-up') !== false) {
		$this->Image('images/ok.png',90,41,-300);
	} else {
		$this->Image('images/cross.png',90,41,-300);
	}
	$this->Cell(20,2,'Billable',0,0,'L');
	if (strpos($data['purpose'], 'Billable') !== false) {
		$this->Image('images/ok.png',110,41,-300);
	} else {
		$this->Image('images/cross.png',110,41,-300);	
	}	
	$this->Ln(6);
	$this->Cell(28,2,'Preliminary',0,0,'L');
	if (strpos($data['purpose'], 'Preliminary') !== false) {
		$this->Image('images/ok.png',34,47,-300);
	} else {
		$this->Image('images/cross.png',34,47,-300);	
	}
	$this->Cell(18,2,'PV',0,0,'L');
	if (strpos($data['purpose'], 'PV') !== false) {
		$this->Image('images/ok.png',46,47,-300);
	} else {
		$this->Image('images/cross.png',46,47,-300);	
	}
	//$this->Cell(50,2,$data['purpose'],0,0,'L');
	$this->Ln(20);
}
	
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
$pdf->TableHeader($data);
$pdf->SetFont('Gotham', '', 14);
$pdf->FancyTable($header, $data);
$pdf->Output();
?>
