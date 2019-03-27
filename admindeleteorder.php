
<!DOCTYPE html>
<html>
<head>
	<title>delete</title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<?php 
	session_start();
	require'./connect.php';
	$id=$_GET["id"];
	$sql="DELETE FROM tb_order WHERE ID_order ='$id'";
	mysqli_query($conn, $sql);
	echo '<script>swal("ยกเลิกรียบร้อยแล้ว!", "", "success").then(function() {
                // Redirect the user
                window.location.href = "adminSeeOrader.php";
                console.log("The Ok Button was clicked.");});</script>';

?>
</body>
</html>