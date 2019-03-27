<?php 
	require('fpdf/fpdf.php');
	require('connectANSI.php');
	$idorder=$_GET['id'];
	 $sql = "SELECT * FROM tb_order LEFT JOIN user ON tb_order.uid = user.uid WHERE ID_order =  $idorder";
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
    $this->Cell(70,20,iconv( 'UTF-8','TIS-620','ใบสั่งสินค้า'),0,1,'C');
   
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
 $sql2 = "SELECT * FROM tb_order_detail LEFT JOIN products ON tb_order_detail.idProducts = products.idProducts WHERE ID_order =  $idorder";
       $result2= mysqli_query($conn,$sql2);
       	$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620','รหัสใบสั่งสินค้า: '),0,0,'L');
		$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620',' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.$row['ID_order'].' '),0,1,'L');
		$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620','รหัสลูกค้า: '),0,0,'L');
		$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620',' '.' '.' '.' '.' '.' '.' '.' '.$row['uid'].' '),0,1,'L');
		$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620','ชื่อ:'),0,0,'L');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',$row['fname'].' '),0,0,'L');
		$pdf->Cell(15,10,iconv( 'UTF-8','TIS-620','นามสกุล: '),0,0,'L');
		$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620',' '.' '.' '.' '.$row['lname'].' '),0,0,'L');
		$pdf->Cell(15,10,iconv( 'UTF-8','TIS-620',' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.'เบอร์โทรศัพท์: '),0,0,'L');
		$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620',' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.$row['phone'].' '),0,1,'L');
		$pdf->Cell(15,10,iconv( 'UTF-8','TIS-620','วันที่สั่งของ: '),0,0,'L');
		$pdf->Cell(50,10,iconv( 'UTF-8','TIS-620',' '.' '.' '.' '.' '.$row['order_date'].' '),0,0,'L');
		$pdf->Cell(15,10,iconv( 'UTF-8','TIS-620','วันที่มารับของ: '),0,0,'L');
		$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620',' '.' '.' '.' '.' '.' '.' '.' '.' '.$row['date_take'].' '.$row['time_take'].''),0,1,'L');
		$pdf->Cell(30,10,'',0,1,'C');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620','รหัสสินค้า '),1,0,'C');
		$pdf->Cell(80,10,iconv( 'UTF-8','TIS-620','ชื่อสินค้า '),1,0,'C');
		$pdf->Cell(40,10,iconv( 'UTF-8','TIS-620','จำนวน '),1,0,'C');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620','ราคา '),1,0,'C');
		$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620','ราคารวม '),1,1,'C');
		




       while($row2 = mysqli_fetch_assoc($result2)){      
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',$row2['idProducts']),1,0,'C');
		$x=$pdf->GetX();
		$y=$pdf->GetY();
		$pdf->Cell(80,10,iconv( 'UTF-8','TIS-620',$row2['P_name']),1,0,'C');
		$pdf->Cell(40,10,iconv( 'UTF-8','TIS-620',$row2['qty']) ,1,0,'C');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',$row2['Cost']),1,0,'C');
		$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620',number_format($row2['qty'] * $row2['Cost'])),1,1,'C');
			$total = $total + ($row2['qty'] * $row2['price']);
			}
			 
		$pdf->Cell(160,10,iconv( 'UTF-8','TIS-620','ราคารวม'),1,0,'R');
		$pdf->Cell(30,10,number_format($total, 2),1,1,'C');
		$pdf->Cell(30,10,'',0,1,'C');
		$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620','*หมายเหตุ'),0,1,'L');
		$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620','1.กรุณามารับสินค้าตามเวลาที่สั่ง'),0,1,'L');
		$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620','2.ถ้ามารับสินค้าช้ากว่าเวลาที่สั่ง 30 นาทีการสั่งซื้อจะถูกยกเลิก'),0,1,'L');
		$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620','3.ถ้าหากต้องการยกเลิกสามาเข้าไปกดยกเลิกในหน้าประวัติการสั่งซื้อหรือโทรมาที่  081-941-1603'),0,1,'L');
		$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620','4.ถ้าหากสั่งสินค้าแล้วไม่ได้รับการตอบรับจากลูกค้าเกิน 3 ครั้งทางเราขอระงับการใช้งาน'),0,1,'L');

			
$pdf->Output();
?>	