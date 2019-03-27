
<!DOCTYPE html>
<html>
<head>
	<title>delete</title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<?php 
require'./connect.php';
	$id=$_GET["id"];
	$sql = "SELECT * FROM tb_order LEFT JOIN tb_order_detail ON tb_order.ID_order = tb_order_detail.ID_order WHERE status = 1 and idProducts = $id ";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_num_rows($result);
	
	if( $row > 0 )
	{
			
			echo '<script>swal("เกิดข้อผิดพลาด!", "สินค้ามีการสั่งซื้อไม่สามารถลบได้", "warning").then(function() {
                // Redirect the user
                window.location.href = "adminShowproduct.php";
                console.log("The Ok Button was clicked.");});</script>';
	
	}else{
		
		$sql="DELETE FROM products WHERE idProducts ='$id'";
		mysqli_query($conn, $sql);
		echo '<script>swal("ลบเรียบร้อยแล้ว!", "", "success").then(function() {
                // Redirect the user
                window.location.href = "adminShowproduct.php";
                console.log("The Ok Button was clicked.");});</script>';
	}
	
?>

</body>
</html>