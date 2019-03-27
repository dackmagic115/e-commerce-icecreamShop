
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
	$sql = "SELECT * FROM tb_order WHERE uid = $id and status = 1";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_num_rows($result);
	if($row>0)
	{
		echo '<script>swal("เกิดข้อผิดพลาด!", "ลูกค้าทำการสั่งซื้อไม่สามารถลบได้", "warning").then(function() {
                // Redirect the user
                window.location.href = "adminShowcustomer.php";
                console.log("The Ok Button was clicked.");});</script>';
		
	}else{
		
			$sql="DELETE FROM user WHERE uid ='$id'";
			mysqli_query($conn, $sql);
			echo '<script>swal("ลบข้อมูลเสร็จสิ้น!", "", "success").then(function() {
                // Redirect the user
                window.location.href = "adminShowcustomer.php";
                console.log("The Ok Button was clicked.");});</script>';
			
	
}
?>
</body>
</html>