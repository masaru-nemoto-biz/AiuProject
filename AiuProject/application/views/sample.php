<?php
require('japanese.php');

$pdf=new PDF_Japanese();
$pdf->AddUniJISFont();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('UniJIS','',18);
$pdf->Write(8,mb_convert_encoding("あいうえお","unicode","utf-8"));
$pdf->Output();
?>