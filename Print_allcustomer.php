<?php 
	require('fpdf/fpdf.php');
	require('connectANSI.php');
	
	


class PDF extends FPDF
{
// Page header
function Header()
{
	define('FPDF_FONTPATH','font/');
	$this -> AddFont('angsa','','angsa.php');
    // Logo
    $this->Image('fpdf/logo.png',10,1,25);
    // Arial bold 15
    $this->SetFont('Angsana','B',28);
    // Move to the right
    $this->Cell(60);
    // PDF_set_info_title()
    $this->Cell(180,20,iconv( 'UTF-8','TIS-620','ข้อมูลลูกค้าทั้งหมด'),0,1,'C');
   
    $this->line(5,28,290,28);
   
    // Line break
    $this->Ln(5);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Angsana','',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
define('FPDF_FONTPATH','font/');
$pdf = new PDF('L');
$pdf->AddFont('Angsana','','angsa.php');
$pdf->AddFont('Angsana','B','angsab.php');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Angsana','',16);
require('connectANSI.php');
 $sql="SELECT  *  FROM user LEFT JOIN province ON (user.proviance = province.PROVINCE_ID) lEFT JOIN amphur ON (user.District = amphur.AMPHUR_ID) lEFT JOIN district ON (user.Subdistrict = district.DISTRICT_ID) WHERE level = 0 ";
 		$result= mysqli_query($conn,$sql);
  
  
       
		$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620','uid'),1,0,'C');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620','ชื่อ'),1,0,'C');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620','นามสกุล'),1,0,'C');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620','บ้านเลขที่'),1,0,'C');
		$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620','จังหวัด'),1,0,'C');
		$pdf->Cell(25,10,iconv( 'UTF-8','TIS-620','อำเภอ'),1,0,'C');
		$pdf->Cell(25,10,iconv( 'UTF-8','TIS-620','ตำบล'),1,0,'C');
		$pdf->Cell(25,10,iconv( 'UTF-8','TIS-620','รหัสไปรษณีย์'),1,0,'C');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620','วันเกิด'),1,0,'C');
		$pdf->Cell(40,10,iconv( 'UTF-8','TIS-620','รหัสบัตรประชาชน'),1,0,'C');
		$pdf->Cell(23,10,iconv( 'UTF-8','TIS-620','เบอร์โทรศัพท์'),1,0,'C');
		
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620','เพศ'),1,1,'C');
	 while($row = mysqli_fetch_assoc($result)){
		$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620',$row['uid']),1,0,'C');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',$row['fname']),1,0,'C');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',$row['lname']),1,0,'C');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',$row['address']),1,0,'C');
		$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620',$row['PROVINCE_NAME']),1,0,'C');
		$pdf->Cell(25,10,iconv( 'UTF-8','TIS-620',$row['AMPHUR_NAME']),1,0,'C');
		$pdf->Cell(25,10,iconv( 'UTF-8','TIS-620',$row['DISTRICT_NAME']),1,0,'C');
		$pdf->Cell(25,10,iconv( 'UTF-8','TIS-620',$row['Postcode']),1,0,'C');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',$row['birthday']),1,0,'C');
		$pdf->Cell(40,10,iconv( 'UTF-8','TIS-620',$row['idnum']),1,0,'C');
		$pdf->Cell(23,10,iconv( 'UTF-8','TIS-620',$row['phone']),1,0,'C');
		
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',$row['gender']),1,1,'C');		
		}

		
	
			
$pdf->Output();
?>	