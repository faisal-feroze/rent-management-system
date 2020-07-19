<?php
require('../fpdf17/fpdf.php');

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm


$pdf = new FPDF('P','mm','A4');

$pdf->AddFont('Nikosh','','Nikosh.php');
$pdf->AddPage();

//$pdf->SetFont('Arial','',12);
$pdf->SetFont('Nikosh','',12);

$pdf->Cell(35,35,'দেখি কি হয়',1,0,'C');
$pdf->Cell(100,9,'Dhaka Metropoliton Police\n\nDivision:',0,0,'C');
//$pdf->Multicell(100,9,"This is a multi-line text string\nNew line\nNew line",0,0,'C');
$pdf->Cell(40,35,'Demo Text',1,1,'C');
$pdf->Cell(136,9,'Division:',0,1,'C');
$pdf->Cell(143,9,'Post Office:',0,0,'C');



//$pdf->Cell(35,35,'Demo Text',1,0,'C');


$pdf->Cell(189,10,'',0,1,'C');

$pdf->SetFont('Arial','',10);

//$pdf->Image('../images/logo.png',10,10,-300);
//$pdf->Cell(44,8,'Building Name:',1,0,'C');
// Insert a dynamic image from a URL

$pdf->Cell(30,9,'1. Name:',0,0,'L');
$pdf->Cell(30,9,'Faisal Feroze',0,1,'L');

$pdf->Cell(30,9,"2. Father's Name:",0,0,'L');
$pdf->Cell(30,9,'Humayun Feroze',0,1,'L');

$pdf->Cell(23.625,9,'3. Date of Birth:',0,0,'L');
$pdf->Cell(47.25,9,'2-08-1995',0,0,'C');
$pdf->Cell(23.625,9,'',0,0,'L');

$pdf->Cell(23.625,9,'Maritial Status:',0,0,'L');
$pdf->Cell(47.25,9,'Married',0,1,'C');


$pdf->Cell(40,9,"4. Permanent Address:",0,0,'L');
$pdf->Cell(30,9,'960/1 East Shewrapara',0,1,'L');


$pdf->Cell(70,9,"5. Occupation and Address of Company:",0,0,'L');
$pdf->Cell(50,9,'960/1 East Shewrapara',0,1,'L');


$pdf->Cell(23.625,9,'6. Religion:',0,0,'L');
$pdf->Cell(47.25,9,'Islam',0,0,'C');
$pdf->Cell(23.625,9,'',0,0,'L');

$pdf->Cell(23.625,9,'Education Status:',0,0,'L');
$pdf->Cell(47.25,9,'Bcs (hons)',0,1,'C');

$pdf->Cell(23.625,9,'7. Mobile:',0,0,'L');
$pdf->Cell(47.25,9,'01675187137',0,0,'C');
$pdf->Cell(23.625,9,'',0,0,'L');

$pdf->Cell(23.625,9,'Email:',0,0,'L');
$pdf->Cell(47.25,9,'faisal@cokreates.com',0,1,'C');


$pdf->Cell(30,9,'8. NID:',0,0,'L');
$pdf->Cell(30,9,'12345678',0,1,'L');

$pdf->Cell(30,9,'9. Passport:',0,0,'L');
$pdf->Cell(30,9,'212',0,1,'L');

$pdf->Cell(30,9,'10. Emergency Cantact:',0,1,'L');

$pdf->Cell(10,9,'',0,0,'L');
$pdf->Cell(23.625,9,'Name:',0,0,'L');
$pdf->Cell(47.25,9,'Nahian',0,0,'C');
$pdf->Cell(23.625,9,'',0,0,'L');

$pdf->Cell(23.625,9,'Relation:',0,0,'L');
$pdf->Cell(47.25,9,'Friend',0,1,'C');

$pdf->Cell(10,9,'',0,0,'L');
$pdf->Cell(23.625,9,'Address:',0,0,'L');
$pdf->Cell(47.25,9,'Mirpur',0,0,'C');
$pdf->Cell(23.625,9,'',0,0,'L');

$pdf->Cell(23.625,9,'Mobile:',0,0,'L');
$pdf->Cell(47.25,9,'0155494946',0,1,'C');


$pdf->Cell(23.625,9,'12. House Worker Name:',0,0,'L');
$pdf->Cell(47.25,9,'xyz',0,0,'C');
$pdf->Cell(23.625,9,'',0,0,'L');

$pdf->Cell(10,9,'',0,0,'L');

$pdf->Cell(23.625,9,'NID:',0,0,'L');
$pdf->Cell(47.25,9,'2345678323',0,1,'C');

$pdf->Cell(5,9,'',0,0,'L');

$pdf->Cell(23.625,9,'Mobile:',0,0,'L');
$pdf->Cell(47.25,9,'0170000000',0,0,'C');
$pdf->Cell(23.625,9,'',0,0,'L');

$pdf->Cell(5,9,'',0,0,'L');
$pdf->Cell(23.625,9,'Permanent Address:',0,0,'L');
$pdf->Cell(47.25,9,'mirpur',0,1,'C');


$pdf->Cell(23.625,9,'13. Driver Name:',0,0,'L');
$pdf->Cell(47.25,9,'xyz',0,0,'C');
$pdf->Cell(23.625,9,'',0,0,'L');

$pdf->Cell(10,9,'',0,0,'L');

$pdf->Cell(23.625,9,'NID:',0,0,'L');
$pdf->Cell(47.25,9,'2345678323',0,1,'C');

$pdf->Cell(5,9,'',0,0,'L');

$pdf->Cell(23.625,9,'Mobile:',0,0,'L');
$pdf->Cell(47.25,9,'0170000000',0,0,'C');
$pdf->Cell(23.625,9,'',0,0,'L');

$pdf->Cell(5,9,'',0,0,'L');
$pdf->Cell(23.625,9,'Permanent Address:',0,0,'L');
$pdf->Cell(47.25,9,'mirpur',0,1,'C');

$pdf->Cell(28,9,'14. Previous Landlord Name:',0,0,'L');
$pdf->Cell(47.25,9,'xyz',0,0,'C');
$pdf->Cell(23.625,9,'',0,0,'L');

$pdf->Cell(5,9,'',0,0,'L');

$pdf->Cell(23.625,9,'Mobile:',0,0,'L');
$pdf->Cell(47.25,9,'2345678323',0,1,'C');

$pdf->Cell(5,9,'',0,0,'L');

$pdf->Cell(23.625,9,'Address:',0,0,'L');
$pdf->Cell(47.25,9,'0170000000',0,1,'C');

$pdf->Cell(50,9,'15. Reason of leavinf Previous Hhouse:',0,0,'L');
$pdf->Cell(47.25,9,'xyz',0,0,'C');
$pdf->Cell(23.625,9,'',0,1,'L');



$pdf->Cell(34,9,'16. Current Landlord Name:',0,0,'L');
$pdf->Cell(47.25,9,'2345678323',0,0,'C');

$pdf->Cell(22,9,'',0,0,'L');

$pdf->Cell(23.625,9,'Mobile:',0,0,'L');
$pdf->Cell(47.25,9,'0170000000',0,1,'C');


$pdf->Cell(20,9,'17. Living Date:',0,0,'L');
$pdf->Cell(47.25,9,'xyz',0,1,'C');





$pdf->Output();




?>
