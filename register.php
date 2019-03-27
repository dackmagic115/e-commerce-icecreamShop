<?php
     require './connect.php';
     session_start();
     error_reporting(E_all);

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
                        <li class="active "><a href="register.php" class="hvr-grow"><i class="fa fa-user"></i>&nbsp;สมัครสมาชิก</a></li>
                        <li><a href="login.php" onclick="login()" class="hvr-grow"><i class="fa fa-lock"></i>&nbsp;เข้าสู่ระบบ</a></li>  
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
                            <a href="#" class=""  aria-haspopup="true" style=" color: black;">ยินดีต้อนรับคุณ <?php echo $_SESSION['fname']; ?>  <i class="caret"></i></a>
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
      if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $uname=$_POST['uname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $idnum=$_POST['idnum'];
        $bd=$_POST['bd'];
        $password=md5($_POST['pwd']);
        $address=$_POST['address'];
        $sex=$_POST['gender'];
        $proviance=$_POST['ProID'];
        $District=$_POST['District'];
        $Subdistrict=$_POST['Subdistrict'];
        $Postcode=$_POST['Postcode'];
        $img = $_FILES['image1']['name'];
        $temp = explode('.',$img);
        $newName = round(microtime(true)).'.'. end($temp);
        $sql1 = "SELECT * FROM user WHERE username = '$uname' ";
        $result1 = mysqli_query($conn,$sql1);
        $row = mysqli_num_rows($result1);
        if($row>0){
            echo "<script>swal('มี Username นี้อยู่ในระบบแล้ว','', 'warning');</script>";
        }else{
         $sum = 0;
         for ($i = 0; $i < 12; $i++) {
         $digitValue = substr($idnum, $i, 1);
       $digitId    = 13 - $i;
         $sum += (int) ($digitValue) * ($digitId);
         }
         $digit13 = substr($idnum, 12, 1);
          if((11-($sum%11))%10 != (int)($digit13)) {    
               echo '<script>swal("เลขบัตรประชาชนไม่ถูกต้อง","", "warning")</script>';
      } else {
         if(move_uploaded_file($_FILES['image1']['tmp_name'], 'uploaduser/'.$newName)){
       $sql="INSERT INTO user(fname,lname,username,password,address,proviance,District,Subdistrict,Postcode,birthday,idnum,phone,Email,gender,uimage)
        VALUES('$fname','$lname','$uname','$password','$address','$proviance','$District','$Subdistrict','$Postcode','$bd','$idnum','$phone','$email','$sex','$newName')";
        $result=mysqli_query($conn,$sql);

        if($result){
          echo '<script>swal("สมัครสมาชิกเสร็จสิิน้!", "ยินดีต้อนรับคุณ", "success").then(function() {
               // Redirect the user
                window.location.href = "index.php";
               console.log("The Ok Button was clicked.");});</script>';
                   
        }else{
          echo mysqli_error($conn);
       }
      }
    }
   }
    
      }
    ?>
	
	<section id="feature" style="background:#444; ">
        <div style="" >
           <div class="center wow fadeInDown">
                <h1 style="color: #fff; text-shadow: 4px 4px 2px 0px black;"><i class="fa fa-user" ></i>&nbsp;สมัครสมาชิก</h1>
            </div>
            <div style="padding-left: 30%; padding-right: 0%">
              <div class="row" >
                <div class="features">
                    <div class="col-md-7  wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" style="background-color:#FF9797; border-radius: 25px; box-shadow: 7px 7px 5px 2px; ">
                        <br>
                        <div style="color: #fff; font-size: 20px;">
                    <form method="POST" name="submit" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();" >
                     <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Username </label>
                            <input type="text" name="uname" class="form-control" value="<?=$_POST['uname']?>" onkeypress="isenglish(event)"  style="box-shadow: 5px 5px 5px 2px;">
                        </div>
                        <div class="form-group">
                            <label>ชื่อ </label>
                            <input type="text" name="fname" class="form-control"  value="<?=$_POST['fname']?>"   style="box-shadow: 5px 5px 5px 2px;">
                        </div>
                        <div class="form-group">
                            <label>e-mail</label>
                            <input type="email" name="email" class="form-control"  value="<?=$_POST['email']?>" onkeypress="isenglish(event)" style="box-shadow: 5px 5px 5px 2px;">
                        </div>
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" name="phone"  value="<?=$_POST['phone']?>"  onkeypress="isInputNumber(event)" maxlength="10" style="box-shadow: 5px 5px 5px 2px;">
                        </div>   
                           <div class="form-group">
                            <label>เพศ</label><br>
                            <input type="radio" name="gender" id="rdo1"  value="Male"> ชาย
                            <input type="radio" name="gender" id="rdo2" value="Female"> หญิง
                        </div>
                         <div class="form-group">
                            <label>ที่อยู่</label><br>
                            <label>บ้านเลขที่</label>
                             <input name="address" id="message"   class="form-control" value="<?=$_POST['address']?>" rows="5" style="box-shadow: 5px 5px 5px 2px;">
                        </div> 
                        <label for="Proviance">จังหวัด</label>
                            <select name="Proviance" id="Proviance" name="proviance"  class="form-control"  data-old="<?= $_POST['Proviance']?>" style="box-shadow: 5px 5px 5px 2px;">
                            </select>
                            <input type="hidden" name="ProID" id="ProID" />
                            <p>
                              <label for="District">อำเภอ</label>
                              <select name="District" id="District" name="District" data-old="<?= $_POST['District']?>" class="form-control" style="box-shadow: 5px 5px 5px 2px;">
                              </select>
                              
                            </P>
                            <p>
                              <label for="Subdistrict">ตำบล</label>
                              <select name="Subdistrict" id="Subdistrict" name="Subdistrict" data-old="<?= $_POST['Subdistrict']?>" class="form-control" style="box-shadow: 5px 5px 5px 2px;">
                              </select>
                             
                            </P>
                            <p>
                              <label for="Postcode">รหัสไปรษณีย์</label>
                              <select name="Postcode" id="Postcode" name="Postcode" data-old="<?= $_POST['Postcode']?>" class="form-control" style="box-shadow: 5px 5px 5px 2px;">
                              </select>
                              
                            </P>
                        

                                        
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Password </label>
                            <input type="Password" name="pwd" value="<?=$_POST['pwd']?>" class="form-control" onkeypress="isenglish(event)"  style="box-shadow: 5px 5px 5px 2px;">
                        </div>
                         <div class="form-group">
                            <label>นามสกุล </label>
                            <input type="text" name="lname" value="<?=$_POST['lname']?>" class="form-control"  style="box-shadow: 5px 5px 5px 2px;">
                        </div>
                        <div class="form-group">
                            <label>วันเกิด</label>
                            <input type="text" id="bd" name="bd" class="form-control" value="<?=$_POST['bd']?>"  style="box-shadow: 5px 5px 5px 2px;">
                        </div>  
                          <div class="form-group" style="color: black;">
                            <label style="color: #fff;">บัตรประชาชน</label>
                            <input type="text"  name="idnum" class="form-control" value="<?=$_POST['idnum']?>" onkeypress="isInputNumber(event)" maxlength="13" style="box-shadow: 5px 5px 5px 2px;">
                        </div>  
                        <label style="padding-top: 80px;">รูปสินค้า : </label>
                            <div class="form-group" align="center">

                                 <span class="btn btn-info btn-file"><span class="fileinput-new"><h4 style="color: #444;">เลือกรูปภาพ</h4></span> <input type="file" id="inputGroupFile02"  onchange="readURL(this)" name="image1"></span><br><br>
                                  <figure class="figure">
                                    <img id="imgUpload" src="image/55.svg" width="250"  class="figure-img img-fluid rounded"  alt="" >
                                  </figure>
                                </div>
                        </div>  

                                             
                    </div>
                    <div class="col-md-12" align="center">
                         <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="สมัครสมาชิก" style="font-size: 25px; font-weight:normal;">
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
         function readURL(input){
                        var reader = new FileReader();

                        reader.onload = function(e){
                            console.log(e.target.result)
                            $('#imgUpload').attr('src',e.target.result).width(250)
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
        function isInputNumber(evt){
                
                var ch = String.fromCharCode(evt.which);
                
                if(!(/[0-9]/.test(ch))){
                    evt.preventDefault();
                } 
            }
             
            function isPhoneNo(evt){
                var regExp = /^0[0-9]{8,9}$/i;
                return regExp.test(input);
              }
        function fncSubmit()
        {

           if(document.submit.uname.value == "")
           {
              swal("กรุณากรอก Username", "", "warning"); 
              document.submit.uname.focus();
              return false;
           }   
           if(document.submit.pwd.value == "")
           {
              swal('กรุณากรอก Password', "", "warning");
              document.submit.pwd.focus();
              return false;
           }   
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
           if(document.submit.image1.value == "")
           {
              swal('กรุณากใส่ รูปภาพของท่าน', "", "warning");
              document.submit.image1.focus();
              return false;
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