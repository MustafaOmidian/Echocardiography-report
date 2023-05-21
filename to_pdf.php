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
$Conclusion =$_POST['Conclusion'];
$Today = date("Y-m-d");
$pageWidth = 210;
$pageHeight = 297;


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
require('alphapdf.php');
class PDF extends AlphaPDF
{
// Page header
function Header()
{
    //logo
    //$this->Image('Icon.png',10,6,30);
    $this->SetTextColor(0,0,0);

    $this->SetFont('Courier','B',15);
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
    $this->SetTextColor(0,0,0);
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Dr. Bayatian Clinic',0,0,'C');
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAlpha(0.43);
$pdf->Image('background.png', 0, 25, $pdf->GetPageWidth(), $pdf->GetPageHeight()-50);
// Arial bold 15
$pdf->SetAlpha(1);
$pdf->SetFont('Times','B',14);
$pdf->Write(10,"\n");
$pdf->Cell(40,10,"Patient Name: $name",0,0,'L');
$pdf->Cell(120,10,$Today,0,0,'R');
$pdf->SetFont('Times','',12);
$pdf->Write(10,"\n");
$pdf->Write(10,"\nAtrial Situs is solitus.");
$pdf->Write(10,"\nAtrio Ventricular Connection is concordance");
$pdf->Write(10,"\nVentriculoarteial Connection is concordance");
$pdf->Write(10,"\nLeft Ventricle IS ");
$pdf->Write(10,$LVH_str);
$pdf->Write(10," LVH (");
$pdf->Write(10,$LVH);
$pdf->Write(10,"MM)");
$pdf->Cell(120,10,"RIGHT Ventricle is normal size",0,0,'R');
$pdf->SetTextColor(255,0,0);
$pdf->Write(10,"\nLeft Atrial is ");
$pdf->Write(10,$LA_str);
$pdf->Write(10," dilated (");
$pdf->Write(10,$LA);
$pdf->Write(10,"MM)");
$pdf->SetTextColor(0,0,0);
$pdf->Cell(120,10,"RIGHT Atrial is normal size",0,0,'R');
$pdf->Write(10,"Diastolic Dysfunction (");
$pdf->Write(10,$DD);
$pdf->Write(10,")");
$pdf->Write(15,"\n");
$pdf->SetTextColor(255,0,0);
$pdf->SetFont('Times','B',14);
$pdf->Cell(150,10,"Global EF:",0,0,'R');
$pdf->Write(10,$EF);
$pdf->Write(10,"%");
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Times','',12);
$pdf->Write(10,"\nMitral Valve : ");
$pdf->Write(10,$MR);
$pdf->Write(10,"\nAortic Valve : ");
$pdf->Write(10,$Aort_str);
$pdf->Write(10,"\nPulmonary Valve : ");
$pdf->Write(10,$PI);
$pdf->Write(10,"\nTricuspid Valve : ");
$pdf->Write(10,$TR_str);
$pdf->Write(10,"\nPAPs:");
$pdf->Write(10,$PAP);
$pdf->Write(10,"MMHG");
$pdf->Write(15,"\n");
$pdf->Write(10,"\nIntertrial Septum is normal size");
$pdf->Cell(120,10,"Interventricular Septum is normal size",0,0,'R');
$pdf->Write(10,"\nAscending Aorta is normal size");
$pdf->Cell(120,10,"Desending Aorta is normal size",0,0,'R');
$pdf->Write(10,"\nAortic Arch ");
$pdf->Write(10,$Aort_str);
$pdf->Write(10," dilated(");
$pdf->Write(10,$Aort);
$pdf->Write(10,"MM)");
$pdf->Write(5,"\n");
if($Conclusion!=null)
    {
    $pdf->SetTextColor(255,0,0);
    $pdf->Write(10,"\nConclusion:");
    $pdf->Write(10,"\n");
    $pdf->Write(10,$Conclusion);
    $pdf->SetTextColor(0,0,0);
}

$pdf->Output('D', "$name-$Today.pdf", true);
ob_end_flush(); 
?>
