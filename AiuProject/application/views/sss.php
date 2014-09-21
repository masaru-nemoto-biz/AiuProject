<?php
require('japanese.php');

$pdf=new PDF_Japanese();
$pdf->AddSJISFont();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('SJIS','',18);
$pdf->Write(8,mb_convert_encoding("かきくけこ","SJIS","UTF-8"));
$pdf->Output();
?>