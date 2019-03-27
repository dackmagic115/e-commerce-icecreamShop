
<!DOCTYPE html>
<html>
<head>
	<title>delete</title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<?php 
	session_start();
	$uid = $_SESSION['id'];
	require'./connect.php';
	$id=$_GET["id"];
	$sql="DELETE FROM tb_order WHERE ID_order ='$id'";
	mysqli_query($conn, $sql);
	echo' <script>swal("ยกเลิกเรียบร้อย!", "", "success"); </script>';
   echo "<META HTTP-EQUIV='Refresh' CONTENT='1 URL=http://localhost/ProjectNewV.7/c_checkorder.php?id=$uid'>";


?>
</body>
</html>