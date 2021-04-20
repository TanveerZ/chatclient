<?php
require('html_table.php');

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$html='<table border="0" style="width:100%">
  <tr>
    <td style="width:70%"><p>Food Service Establishment Inspection Report</p></td>
    <td style="width:15%">Smith</td> 
    <td style="width:15%">50</td>
  </tr>
  
</table>';

$pdf->WriteHTML($html);
$pdf->Output();
?>
