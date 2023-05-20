<?php
require('fpdf.php');
class PDF extends FPDF
{
function Header()
{
    $this->Image('icon.png',10,6,30);
    $this->SetFont('Arial','B',15);
    $this->Cell(80);
    $this->Cell(30,10,'Dr Bayatian Clinic',1,0,'C');
    $this->Ln(20);
}    
function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$Aort = readline("Enter Aort: ");
$LA

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'printing line number '.$i,0,1);
$pdf->Output();
?>
