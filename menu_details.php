<?php
require './connect.php';
$id=$_GET['id_product'];
$sql="SELECT * FROM products WHERE idProducts = $id";
$result = mysqli_query($conn,$sql);
$row =  mysqli_fetch_assoc($result) ;
?>
<!DOCTYPE html>
<html>
<head>
	<title>รายละเอียดสินค้า</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 	<link rel="stylesheet" href="style.css" />
 	 <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/prettyPhoto.css" rel="stylesheet">      
  <link href="css/main.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link href="css/style3.css" rel="stylesheet">
  <link rel="stylesheet" href="css/hover-min.css">
  <link rel="stylesheet" href="css/menu.css">
  <style>
  	h1{
  		color: #fff;
  	}
  </style>
</head>
<body>
<div style="background: #88BBAA;; width: 100% ; height: 955px;">
	<form method="post" action="cart.php?action=add&id=<?php echo $row["idProducts"];?> ">
	<div class="row">
		<div class="col-md-11" style="background: ; height: 20%;">
			<div style="margin: 38px;">
			<h1 class=""><?php echo $row["P_name"];?></h1>
			</div>
			<hr>
		</div>
		
		<div class="col-md-1" align="center" style="padding-top: 30px;">
   			 <a href="menu.php"><i class="fa fa-times fa-3x"></i></a>
   		</div>		 
	</div>
	<div class="row">
		<div class="col-md-12" style="height: 40% ; padding-top: 50px;" align="center">
			<div>
			<img src="upload/<?php echo $row["P_image"];?>" width="350"  ><br><br>
			</div>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-8" style="background: ; height: 300px;">
			<div class="row" style="margin: 50px;">
				<div class="col-sm-5" style="background: ; border-right: 2px solid #fff; height: 200px; color: #fff; " >    
             	<p style=" ">
                   <span class="glyphicon glyphicon-list"></span> &nbsp;รายละเอียดสินค้า 
             	</p> 
              	<p>ส่วนผสม : <?php echo $row["P_details"];?></p>
             	</div> 
             	<div class="col-sm-5" style="background: ; height: 150px; color: #fff; " >    
             	<p style=" ">
                    
                   <div style="color: #000;">
                   	<h2>กรอกจำนวนที่ต้องการ</h2>
                   <input type="text" name="quantity" onkeypress="isInputNumber(event)" maxlength="2" size="2" value="1"  />
                   </div>
                  
				   <h2 class=""><i class="fa fa-cube"></i> กล่องละ <?php echo $row["Cost"];?> บาท</h2>
             	</p> 
            
             	</div> 
			</div>
		</div>  
			
           
		<div class="col-md-3" style="background: ; ">
			<div style="margin: 60px;">
					
					<input type="hidden" name="hidden_name" value="<?php echo $row["P_name"];?>">
					<input type="hidden" name="hidden_price" value="<?php echo $row["Cost"];?>">
					<input type="hidden" name="hidden_image" value="<?php echo $row["P_image"];?>">
					<input type="submit" name="add_to_cart" style="margin-top: 5px; font-size: 25px;" class="btn btn-success" value="เลือกสินค้า">
			</div>
		</div>
		<script>
			 function isInputNumber(evt){
                
                var ch = String.fromCharCode(evt.which);
                
                if(!(/[0-9]/.test(ch))){
                    evt.preventDefault();
                } 
            }
		</script>
	</div>
	</form>
	</div>
</div>
</body>
</html>
