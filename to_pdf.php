<?php
ob_start();
$name = $_POST['name'];
$Aort = $_POST['aort'];
$LA = $_POST['la'];
$LVH = $_POST['lvh'];
$PAP = $_POST['pap'];
$EF = $_POST['ef'];
$TR = $_POST['tr'];
//selectives and options
$MR = $_POST['MR'];
$AI = $_POST['AI'];
$PI = $_POST['PI'];
$DD = $_POST['DD'];
$Today = date("Y-m-d");

//switch for Aort
switch(true){
    case in_array($Aort, range(0,20)):
        $Aort_str = 'Mild';
        break;
    case in_array($Aort, range(20,30)):
        $Aort_str = 'Moderate';
        break;
        case in_array($Aort, range(30,40)):
        $Aort_str = 'Severe';        
        break;    
}

//switch for LA
switch(true){
    case in_array($LA, range(0,20)):
        $LA_str = 'NO';
        break;
    case in_array($LA, range(20,30)):
        $LA_str = 'Mild';
        break;
    case in_array($LA, range(30,40)):
        $LA_str = 'Moderate';        
        break;
    case ($LA>"40"):
        $LA_str = 'Severe';
}

//switch for LVH
switch(true){
    case in_array($LVH, range(0,10)):
        $LVH_str = 'NO';
        break;
    case in_array($LVH, range(10,14)):
        $LVH_str = 'Mild';
        break;
    case in_array($LVH, range(14,18)):
        $LVH_str = 'Moderate';        
        break;
    case ($LVH>"18"):
        $LVH_str = 'Severe';
}

//switch for PAP
switch(true){
    case in_array($PAP, range(0,25)):
        $PAP_str = 'Mild';
        break;
    case in_array($PAP, range(25,35)):
        $PAP_str = 'Moderate';        
        break;
    case in_array($PAP, range(35,60)):
        $PAP_str = 'Severe';
		break;
}
//switch for TR
switch(true){
    case in_array($TR, range(15,25)):
        $TR_str = 'Mild';
        break;
    case in_array($TR, range(26,35)):
        $TR_str = 'Moderate';        
        break;
    case ($TR>'60'):
        $TR_str = 'Severe';
		break;    

}
//switch for EF
switch($EF){
    case "60":
        $EF_str = 'good';
        break;
    case "55":
        $EF_str = 'Preserved';
        break;
    case "50":
        $EF_str = 'Preserved';        
        break;
    case "45":
        $EF_str = 'Mild';
		break;
    case "40":
        $EF_str = 'Moderate';
}


//Making PDF
require('fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('Icon.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Trans Thoracic Echocardiography',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(40,10,"Patient Name: $name",0,0,'L');
$pdf->Cell(120,10,$Today,0,0,'R');
$pdf->Write(10,"\nAtrial Situs is solitus.");
$pdf->Write(10,"\nAtrio Ventricular Connection is concordance");
$pdf->Write(10,"\nVentriculoarteial Connection is concordance");
$pdf->Write(10,"\nLeft Ventricle IS ");
$pdf->Write(10,$LVH_str);
$pdf->Write(10," LVH (");
$pdf->Write(10,$LVH);
$pdf->Write(10,"MM)");
$pdf->Cell(120,10,"RIGHT Ventricle is normal size",0,0,'R');
$pdf->Write(10,"\nLeft Atrial is ");
$pdf->Write(10,$LA_str);
$pdf->Write(10," dilated (");
$pdf->Write(10,$LA);
$pdf->Write(10,"MM)");
$pdf->Cell(120,10,"RIGHT Atrial is normal size",0,0,'R');
$pdf->Write(10,"Diastolic Dysfunction (");
$pdf->Write(10,$DD);
$pdf->Write(10,")");
$pdf->Cell(120,10,"Global EF:",0,0,'R');
$pdf->Write(10,$EF);
$pdf->Write(10,"%");






$pdf->Output();
ob_end_flush(); 
?>
