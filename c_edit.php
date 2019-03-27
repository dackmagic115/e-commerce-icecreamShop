<?php
     require'./connect.php';
     session_start();
        $idSelect=$_GET["id"];
        
        $sql="SELECT * FROM user WHERE uid = $idSelect";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $old_province = $row['proviance'];
        $old_amphur = $row['District'];
        $old_tumbol = $row['Subdistrict'];
        $old_postcode= $row['Postcode'];

       

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>MAIMEEARAI</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="js/jasny-bootstrap.js"></script>
     <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="ajax.js" ></script>
     <script src="./js/jquery.js"></script>
    <script src="./js/jquery-ui.js"></script>
    <link href="css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="js/jquery-ui.css" rel="stylesheet">
    <link href="js/jquery-ui.theme.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">      
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
    <link rel="stylesheet" href="css/hover-min.css">
    <style >
        
        .navbar-nav>li {
             margin-left: 35px;
              padding-bottom: 0px;
                }
                ul ul a {
                font-size: 20px !important;
                padding-left: 30px !important;
                background: #FF9797;
            }
    </style>
   
</head>
 
<body class="homepage" onload="Add()"> 
<div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div id="dismiss" >
                    <i class="glyphicon glyphicon-arrow-left"></i>
                </div>

                <div class="sidebar-header">
                    <p style="padding-left: 50px;"><a class="navbar-brand" href="index.php" "><img src="image/logo.png" width="150" height="80" ></a></p>
                </div>
                    <br>
                <ul class="list-unstyled components" style="padding-left: 15px;">
                    <p align="center">เมนูหลัก</p>
                 <li ><a href="index.php" class="hvr-grow"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;หน้าแรก</a></li>
                        <li><a href="menu.php" class="hvr-grow"><i class="fa fa-cutlery" aria-hidden="true"></i>&nbsp;รายการสินค้า</a></li>
                        <li><a href="Contact.php" class="hvr-grow"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;เกี่ยวกับเรา</a></li>
                           <?php
                         if(isset($_SESSION['id'])){
                            echo " ";
                         }else{?>
                        <li><a href="register.php" class="hvr-grow"><i class="fa fa-user"></i>&nbsp;สมัครสมาชิก</a></li>
                        <li><a href="login.php" onclick="login()" class="hvr-grow"><i class="fa fa-lock"></i>&nbsp;เข้าสู่ระบบ</a></li>
                        <?php }?>   
                </ul>
                </nav>  
    <header id="header">
        <nav class="navbar navbar-fixed-top" role="banner" style="box-shadow: 1px 2px 2px 1px rgba(0, 0, 0, 0.07)">
                 <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn" style="margin-left: 40px; background: transparent;  ">
                                <i><div>
                                <div class="bar1" style="background: #fff; box-shadow: 0px 0px 5px 5px rgba(0,0,0,.09); "></div>
                                <div class="bar2" style="background: #fff;box-shadow: 0px 0px 5px 5px rgba(0,0,0,.09);"></div>
                                <div class="bar3" style="background: #fff;box-shadow: 0px 0px 5px 5px rgba(0,0,0,.09);"></div>
                                </div></i>
                               
                            </button>
                        </div>
           
            <div style="padding-left: 10px; ">
             <div>
                <div class="col-md-2" >
                      <a href="index.php" ><img src="image/logo.png" width="150" height="80" style="margin-left: 60px;"></a>
                </div>
                 <?php
              if(isset($_SESSION['id'])){
                if(trim($_SESSION['level'] == 1)){ ?>
                      <div style="padding-top: 5px; color: black;">
                        <ul class="nav navbar-nav navbar-right" >
                            <li class="dropdown">
                            <a href="#" class=""  aria-haspopup="true" style=" color: black;">ยินดีต้อนรับคุณ <?php echo $_SESSION['fname']; ?>  <i class="caret"></i></a>
                              <ul class="dropdown-menu">
                                <li><a href="adminMenu.php">เมนูผู้ดูแล</a></li>
                                <li><a href="logout.php">ออกจากระบบ</a></li>
                              </ul>
                            </li>
                          </ul>
                       </div>
                          
                     <?php }else{?>
                   <div style="padding-top: 5px; color: black;">
                        <ul class="nav navbar-nav navbar-right" >
                            <li class="dropdown" style="margin-bottom: 0px;">
                            <a href="#" class=""  aria-haspopup="true" style=" color: #fff;">ยินดีต้อนรับคุณ <?php echo $_SESSION['fname']; ?>  <i class="caret"></i></a>
                              <ul class="dropdown-menu" style="font-size: 20px;">
                                <li><a href="c_edit.php?id=<?php echo $_SESSION['id']; ?>" >แก้ไขข้อมูลส่วนตัว</a></li>
                                <li><a href="c_checkorder.php?id=<?php echo $_SESSION['id']; ?>" >ประวัติการสั่งซื้อ</a></li>
                                <li><a href="logout.php">ออกจากระบบ</a></li>
                              </ul>
                            </li>
                          </ul>
                       </div>
               <?php } }
                     else
                  {?>
            <div class="col-md-9" align="right">    
              <a href="login.php"  class="hvr-grow"><h2 style="color: red;"><i class="fa fa-lock"></i> เข้าสู่ระบบ</h2></a>
                <?php }?>
            </div>
                
            </div><!--/.container-->
        </nav><!--/nav-->
    </header> 
	       
                     <?php
                            if(isset($_POST['edit'])){
                                $fname=$_POST['fname'];
                                $lname=$_POST['lname'];
                                $email=$_POST['email'];
                                $phone=$_POST['phone'];
                                $idnum=$_POST['idnum'];
                                $bd=$_POST['bd'];
                                $address=$_POST['address'];
                                $sex=$_POST['sex'];
                                $proviance=$_POST['ProID'];
                                $District=$_POST['District'];
                                $Subdistrict=$_POST['Subdistrict'];
                                $Postcode=$_POST['Postcode'];
                                $oldpic = $_POST['oldpic'];
                                $img = $_FILES['image1']['name'];
                                 $sum = 0;
                                   for ($i = 0; $i < 12; $i++) {
                                   $digitValue = substr($idnum, $i, 1);
                                 $digitId    = 13 - $i;
                                   $sum += (int) ($digitValue) * ($digitId);
                                   }
                                   $digit13 = substr($idnum, 12, 1);
                                    if((11-($sum%11))%10 != (int)($digit13)) {    
                                         echo '<script>swal("เลขบัตรประชาชนไม่ถูกต้อง")</script>';
                                } else {
                                  if($img !=="")
                                  {
                                @unlink("uploaduser/".$oldpic);
                                $temp = explode('.',$img);
                                $newName = round(microtime(true)).'.'. end($temp);
                                move_uploaded_file($_FILES['image1']['tmp_name'], 'uploaduser/'.$newName);
                              
                                }else{
                                  $newName = $oldpic;
                                }
                                $sql="UPDATE `user` SET `fname` = '$fname', `lname` = '$lname', `address` = '$address',`proviance` = '$proviance',`District` = '$District',`Subdistrict` = '$Subdistrict',`Postcode` = '$Postcode', `birthday` = '$bd', `idnum` = '$idnum', `phone` = '$phone', `Email` = '$email', `gender` = '$sex',`uimage` = '$newName' WHERE `user`.`uid` = $idSelect";                                                                             
                                $result = mysqli_query($conn,$sql);
                                if($result){
                                        echo' <script>swal("แก้ไขข้อมูลเสร็จสิ้น!", "", "success"); </script>';
                                       echo "<META HTTP-EQUIV='Refresh' CONTENT='1 URL=http://localhost/ProjectNewV.7/c_edit.php?id=$idSelect'>";
                                       // echo '<script>swal("ลบเรียบร้อยแล้ว!", "", "success").then(function() {
                                          // Redirect the user
                                         // window.location.href = "c_edit.php?id=$idSelect";
                                          //console.log("The Ok Button was clicked.");});</script>';
                                    }
                                }
                              }

                                
                            ?>
	<section id="feature" style="background:#444; ">
        <div style="" >
           <div class="center wow fadeInDown">
                <h1 style="color: #fff; text-shadow: 4px 4px 2px 0px black;"><i class="fa fa-user" ></i>&nbsp;แก้ไขข้อมูลส่วนตัว</h1>
            </div>
            <div style="padding-left: 30%; padding-right: 0%">
              <div class="row" >
                <div class="features">
                    <div class="col-md-7  wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" style="background-color:#FF9797; border-radius: 25px; box-shadow: 7px 7px 5px 2px; ">
                        <br>
                        <div style="color: #fff; font-size: 20px;">
                <form method="POST" name="submit" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
                     <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>ชื่อ</label>
                            <input type="text" name="fname" class="form-control"  style="box-shadow: 5px 5px 5px 2px;" value="<?php echo $row['fname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>e-mail</label>
                            <input type="text" name="email" class="form-control" style="box-shadow: 5px 5px 5px 2px;"
                            value="<?php echo $row['Email']; ?>">
                        </div>
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" name="phone" onkeypress="isInputNumber(event)" maxlength="10" style="box-shadow: 5px 5px 5px 2px;"
                            value="<?php echo $row['phone']; ?>">
                        </div>   
                           <div class="form-group">
                            <label>เพศ</label><br>
                             <?php
                                  if($row['gender']=='Male'){
                                    echo "<input type='radio' name='sex' id='rdo1' value='Male' checked> ชาย";
                                  } else{
                                    echo "<input type='radio' name='sex' id='rdo1' value='Male'> ชาย";
                                  }
                                  if($row['gender']=='Female'){
                                    echo " <input type='radio' name='sex' id='rdo2' value='Female' checked> หญิง";
                                  } else{
                                    echo " <input type='radio' name='sex' id='rdo2' value='Female'> หญิง";
                                  }
                                  ?>
                        </div>
                         <div class="form-group">
                            <label>ที่อยู่</label><br>
                            <label>บ้านเลขที่</label>
                             <input name="address" id="message"  value="<?php echo $row['address']?>" class="form-control" rows="5" style="box-shadow: 5px 5px 5px 2px;">

                        </div> 
                        <label for="Proviance">จังหวัด</label>
                            <select name="Proviance" id="Proviance" name="proviance" class="form-control"   data-old="<?=$old_province?>" style="box-shadow: 5px 5px 5px 2px;" >
                            </select>
                            
                            <input type="hidden" name="ProID" id="ProID" />
                            <p>
                              <label for="District">อำเภอ</label>
                              <select name="District" id="District" name="District" class="form-control" 
                              data-old="<?=$old_amphur?>" style="box-shadow: 5px 5px 5px 2px;">
                              </select>
                              
                            </P>
                            <p>
                              <label for="Subdistrict">ตำบล</label>
                              <select name="Subdistrict" id="Subdistrict" name="Subdistrict"   class="form-control" data-old="<?=$old_tumbol?>"  style="box-shadow: 5px 5px 5px 2px;">
                              </select>
                             
                            </P>
                            <p>
                              <label for="Postcode">รหัสไปรษณีย์</label>
                              <select name="Postcode" id="Postcode" name="Postcode" class="form-control"  
                              data-old="<?=$old_postcode?>" style="box-shadow: 5px 5px 5px 2px;">
                              </select>
                              
                            </P>
                        
                                        
                    </div>
                    <div class="col-sm-5">
                     
                         <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text" name="lname" class="form-control"  style="box-shadow: 5px 5px 5px 2px;" value="<?php echo $row['lname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>วันเกิด</label>
                            <input type="text" id="bd" name="bd" class="form-control"  style="box-shadow: 5px 5px 5px 2px;"
                            value="<?php echo $row['birthday']; ?>">
                        </div>  
                          <div class="form-group">
                            <label>บัตรประชาชน</label>
                            <input type="text"  name="idnum" class="form-control" onkeypress="isInputNumber(event)" maxlength="13"  style="box-shadow: 5px 5px 5px 2px;"
                            value="<?php echo $row['idnum']; ?>">
                        </div>  
                        <label style="padding-top: 80px;">รูปลูกค้า : </label>
                            <div class="form-group" align="center">

                                 <span class="btn btn-info btn-file"><span class="fileinput-new"><h4 style="color: #444;">เลือกรูปใหม่</h4></span> <input type="file" id="inputGroupFile02"  onchange="readURL(this)" name="image1"></span><br><br>
                                  <input type="hidden" name="oldpic" value="<?php echo $row["uimage"]?>">
                                  <figure class="figure">
                                    <img id="imgUpload" class="figure-img img-fluid rounded" src="uploaduser/<?php echo $row["uimage"]?>" width="250" alt="" >
                                  </figure>
                                </div>
                        
                        </div>  

                                             
                    </div>
                    <div class="col-md-12" align="center">
                            <div class="form-group" align="center">
                                  <input type="submit"  name="edit" value="บันทึก" class="btn btn-primary" style="font-size: 25px;">
                                <button type="button"   onclick="window.location='index.php';" class="btn btn-primary" style="font-size: 25px; font-weight:normal;"> 
                                     ยกเลิก </button>
                            </div>
                    </div>
                        </div>
                    </div><!--/.col-md-4-->
             </form>

                  <div class="features" align="center">
                    <div class="col-md-4  wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" style=" border-radius: 25px; height: 500px; ">
                        <div>
                            <i></i>
                          
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="features" align="center">
                    <div class="col-md-4  wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" style=" border-radius: 25px; height: 410px; ">
                        <div>
                            <i></i>
                          
                        </div>
                    </div><!--/.col-md-4-->
        </div><!--/.container-->
        </div>
    </div>
     <script>
      function fncSubmit()
        {
           
           if(document.submit.fname.value == "")
           {
              swal('กรุณากรอก ชื่อ', "", "warning");
              document.submit.fname.focus();
              return false;
           }   
           if(document.submit.lname.value == "")
           {
              swal('กรุณากรอก นามสกุล', "", "warning");
              document.submit.lname.focus();
              return false;
           } 
            if(document.submit.email.value == "")
           {
              swal('กรุณากรอก อีเมล์', "", "warning");
              document.submit.email.focus();
              return false;
           } 
           if(document.submit.phone.value == "")
           {
              swal('กรุณากรอก เบอร์โทรศัพท์', "", "warning");
              document.submit.phone.focus();
              return false;
           } 
            if(document.submit.bd.value == "")
           {
              swal('กรุณากรอก วันเกิด', "", "warning");
              document.submit.bd.focus();
              return false;
           } 
          
            if(document.submit.idnum.value == "")
           {
              swal('กรุณากรอก บัตรประชาชน', "", "warning");
              document.submit.idnum.focus();
              return false;
           } 
            if(document.submit.rdo1.checked == false && document.submit.rdo2.checked == false )
           {
                  swal('กรุณาเลือก เพศ', "", "warning");
                
                  return false;
           } 
             if(document.submit.address.value == "")
           {
              swal('กรุณากรอก บ้านเลขที่', "", "warning");
              document.submit.address.focus();
              return false;
           } 
           if(document.submit.Proviance.value == 0)
           {
              swal('กรุณากรอก จังหวัด', "", "warning");
              document.submit.Proviance.focus();
              return false;
           } 
           if(document.submit.District.value == 0)
           {
              swal('กรุณากรอก อำเภอ', "", "warning");
              document.submit.District.focus();
              return false;
           } 
           if(document.submit.Subdistrict.value == 0)
           {
              swal('กรุณากรอก ตำบล', "", "warning");
              document.submit.Subdistrict.focus();
              return false;
           } 
           if(document.submit.Postcode.value == 0)
           {
              swal('กรุณากรอก รหัสไปรษณีย์', "", "warning");
              document.submit.Postcode.focus();
              return false;
           } 
          
      }
        function readURL(input){
                        var reader = new FileReader();

                        reader.onload = function(e){
                            console.log(e.target.result)
                            $('#imgUpload').attr('src',e.target.result).width(250)
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
       
       function isenglish(evt){
                
                var ch = String.fromCharCode(evt.which);
                
                if((/[^A-Za-z0-9]+/.test(ch))){
                    evt.preventDefault();
                } 
            }
         function isInputNumber(evt){
                
                var ch = String.fromCharCode(evt.which);
                
                if(!(/[0-9]/.test(ch))){
                    evt.preventDefault();
                } 
            }
           $('#bd').datepicker({
        dateFormat:"yy-mm-dd"
        ,changeYear: true
        ,changeMonth:true
        ,yearRange:"c-100:c+10"
        ,dayNamesMin:[ "อา.", "จ.", "อ.", "พ.", "พฤ.", "ศ.", "ส." ]
        ,monthNamesShort:[ "ม.ค.", "ก.พ.", "มี.ค", "เม.ย", "พ.ค", "มิ.ย", "ก.ค", "ส.ค", "ก.ย.", "ต.ค", "พ.ย", "ธ.ค" ]
        });
       </script>
</section>
    </div></section>
    </div>
     </section><!--/#feature-->
    <footer id="footer" class="midnight-blue">
        <div class="container" style="font-size: 16px">
            <div class="row">
                <div class="col-sm-6">
                    &copy; ID59122202038
                </div>
             
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="index.php">หน้าแรก</a></li>
                        <li><a href="Contact.php">เกี่ยวกับเรา</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>   
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
    <!-- jQuery CDN -->
        <script src="js/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
      
        <!-- jQuery Custom Scroller CDN -->
        <script src="js/jquery-mCustomScrollbar.concat.min.js"></script>
          <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#dismiss, .overlay').on('click', function () {
                    $('#sidebar').removeClass('active');
                    $('.overlay').fadeOut();
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').addClass('active');
                    $('.overlay').fadeIn();
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });
        </script>

        <script>
           $(document).ready(function () {

    $(window).on('scroll', function () {
        if ($(window).scrollTop() >= 20) { // use any value lower than the navbar height, [20] is an example

            $('.navbar').css({ // reducing the vertical padding from 25px to 10px
                'padding-top': '10px',
                'padding-bottom': '10px'
            });

        } else {

            $('.navbar').css({ // reset the vertical padding to its initial value [25px]
                'padding-top': '50px',
                'padding-bottom': '50px'
            });

        }
    });

});            
        </script>
        <script>
          function login() {
              document.getElementById("login").style.display = "block";

            
          }

          function login() {
              document.getElementById("login").style.display = "none";
          }

        
   
        </script>
       

</body>
</html>