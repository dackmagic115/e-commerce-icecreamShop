<?php 
	require('fpdf/fpdf.php');
	require('connectANSI.php');

	$uid=$_GET['id'];
	 $sql="SELECT  *  FROM user LEFT JOIN province ON (user.proviance = province.PROVINCE_ID) lEFT JOIN amphur ON (user.District = amphur.AMPHUR_ID) lEFT JOIN district ON (user.Subdistrict = district.DISTRICT_ID)  WHERE uid = $uid";
 	 $result= mysqli_query($conn,$sql);
  	 $row = mysqli_fetch_assoc($result);


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
    $this->Cell(70,20,iconv( 'UTF-8','TIS-620','ข้อมูลลูกค้า'),0,1,'C');
   
    $this->line(5,28,200,28);
   
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
$pdf = new PDF('P');
$pdf->AddFont('Angsana','','angsa.php');
$pdf->AddFont('Angsana','B','angsab.php');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Angsana','',16);
require('connectANSI.php');

  
       
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620','รหัสลูกค้า : '),0,0,'L');
		$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620',$row['uid'].' '),0,1,'L');
		if($row['uimage'] == ""){
			$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',''),0,1,'L');
		}else{

		$pdf->Image('uploaduser/'.$row['uimage'],150,30,50,0);
		}
		$pdf->Cell(20,50,iconv( 'UTF-8','TIS-620',''),0,1,'L');
		$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620','ชื่อ :'),0,0,'L');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',$row['fname'].' '),0,0,'L');
		$pdf->Cell(17,10,iconv( 'UTF-8','TIS-620','นามสกุล : '),0,0,'L');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',' '.$row['lname'].' '),0,0,'L');
		$pdf->Cell(8,10,iconv( 'UTF-8','TIS-620','เพศ : '),0,0,'L');
		if($row['gender'] == Male){
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620','ชาย'.' '),0,1,'L');
			}else{
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',' '.'หญิง'.' '),0,1,'L');
			}
		$pdf->Cell(14,10,iconv( 'UTF-8','TIS-620','วันเกิด: '),0,0,'L');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',' '.$row['birthday'].' '),0,0,'L');
		$pdf->Cell(33,10,iconv( 'UTF-8','TIS-620','รหัสบัตรประชาชน: '),0,0,'L');
		$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620',' '.$row['idnum'].' '),0,0 	,'L');
		$pdf->Cell(25,10,iconv( 'UTF-8','TIS-620','เบอร์โทรศัพท์: '),0,0,'L');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',' '.$row['phone'].' '),0,1,'L');
		$pdf->Cell(14,10,iconv( 'UTF-8','TIS-620','อีเมลล์: '),0,0,'L');
		$pdf->Cell(40,10,iconv( 'UTF-8','TIS-620',$row['Email'].' '),0,1,'L');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',''),0,1,'L');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620','ที่อยู่'),0,1,'L');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620','บ้านเลขที่ : '),0,0,'L');
		$pdf->Cell(15,10,iconv( 'UTF-8','TIS-620',$row['address'].' '),0,1,'L');
		$pdf->Cell(15,10,iconv( 'UTF-8','TIS-620','ตำบล : '),0,0,'L');
		$pdf->Cell(15,10,iconv( 'UTF-8','TIS-620',' '.$row['DISTRICT_NAME'].' '),0,1,'L');
		$pdf->Cell(15,10,iconv( 'UTF-8','TIS-620','อำเภอ : '),0,0,'L');
		$pdf->Cell(15,10,iconv( 'UTF-8','TIS-620',' '.$row['AMPHUR_NAME'].' '),0,1,'L');
		$pdf->Cell(15,10,iconv( 'UTF-8','TIS-620','จังหวัด : '),0,0,'L');
		$pdf->Cell(15,10,iconv( 'UTF-8','TIS-620',' '.$row['PROVINCE_NAME'].' '),0,1,'L');
		$pdf->Cell(25,10,iconv( 'UTF-8','TIS-620','รหัสไปรษณีย์ : '),0,0,'L');
		$pdf->Cell(17,10,iconv( 'UTF-8','TIS-620',' '.$row['Postcode'].' '),0,1,'L');


		
	
			
$pdf->Output();
?>	