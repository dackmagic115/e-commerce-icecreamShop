<?php
     require './connect.php';
     session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MAIMEEARAI</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">      
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
    <link rel="stylesheet" href="css/hover-min.css">
    <style>
        a.highlight:hover{
            color: #fff;
        }
    </style>
</head>
<body class="homepage"> 
    <?php 
        if(isset($_POST['login'])){
            $u = $_POST['uname'];
            $p = md5($_POST['pwd']);
     

            $sql = "SELECT * FROM user WHERE username= '$u' and password = '$p'";
            $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['id']=$row['uid'];
                    $_SESSION['fname']=$row['fname'];
                    $_SESSION['level']=$row['level'];
                    $_SESSION['proviance']=$row['proviance'];
                    $_SESSION['District']=$row['District'];
                    $_SESSION['Subdistrict']=$row['Subdistric'];
                    $_SESSION['Postcode']=$row['Postcode'];
                    header('location:index.php');
                }else{
                    echo '<script>swal("กรุณากรอกข้อมูลให้ถูกต้อง!", "", "warning");</script>';
                }
        }
        ?>
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
                        <li ><a href="menu.php" class="hvr-grow"><i class="fa fa-cutlery" aria-hidden="true"></i>&nbsp;รายการสินค้า</a></li>
                        <li><a href="Contact.php" class="hvr-grow"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;เกี่ยวกับเรา</a></li>
                        <li><a href="register.php" class="hvr-grow"><i class="fa fa-user"></i>&nbsp;สมัครสมาชิก</a></li>
                        <li class="active "><a href="login.php" class="hvr-grow"><i class="fa fa-lock"></i>&nbsp;เข้าสู่ระบบ</a></li>  
                </ul>
                </nav>  
         <header id="header">
        <nav class="navbar navbar-fixed-top" role="banner" style=" ">
                 <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn" style="margin-left: 40px; background: transparent;  ">
                                <i><div >
                                <div class="bar1" style="background-color: #fff "></div>
                                <div class="bar2" style="background-color: #fff "></div>
                                <div class="bar3" style="background-color: #fff "></div>
                                </div></i>
                            </button>
                         
                        </div>
         
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a  href="index.php" ><img src="image/logo.png" width="150" height="80" style="margin-left: 60px;"></a>
                    </div>
                    <div align="right" style="padding-top: 30px;">
                    
                       <a href="#"><img src="image/search_icon.png" width="20" height="20"></a>
                    </div>

                  </nav>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header> 
	
    <section id="feature" style="background: #444; padding-top: 150px;">
        <div style="padding-left: 30%; padding-right: 30%;">
           <div class="center wow fadeInDown">
                <h2 style="text-shadow: 4px 4px 2px 0px black;"><i class="fa fa-lock"></i>&nbsp;เข้าสู่ระบบ</h2>
            </div>
              <div class="row" >
                <div class="features" align="center" >
                    <div class=" wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" style="background-color: #EFA694; border-radius: 25px; height: 320px; width: 50%;box-shadow: 6px 6px 5px 2px;" ">
                        <br>
                        <div style="color: #fff; font-size: 20px;">
                        <form method="POST" action="">
                        <div class="form-group" style="width: 250px;">
                            <label>ชื่อผู้ใช้</label>
                            <input type="text" name="uname" class="form-control" required="required" style="box-shadow: 5px 5px 5px 2px;">
                        </div>
                        <div class="form-group" style="width: 250px;">
                            <label>รหัสผ่าน</label>
                            <input type="password" name="pwd" class="form-control" required="required" style="box-shadow: 5px 5px 5px 2px;">
                        </div>
                         <div class="col-md-12" align="center">
                         <div class="form-group">
                            <button type="submit" name="login" class="btn btn-primary btn-lg" required="required" style="font-size: 23px; font-weight: normal;">เข้าสู่ระบบ</button>
                        </div>
                        <div class="form-group" style="width: 250px;">
                            <a href="register.php" ><u>สมัครสมาชิก</u></a>
                        </div>
                        </form>
                    </div>
                        </div>
                    </div><!--/.col-md-12-->
                  <div class="features" align="center">
                    <div class="col-md-4  wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" style=" border-radius: 25px; height: 800px; ">
                        <div>
                            <i></i>
                          
                        </div>
                    </div><!--/.col-md-4-->
        </div><!--/.container-->

    </section><!--/#feature-->

    <footer id="footer" class="midnight-blue">
        <div class="container" style="font-size: 16px">
            <div class="row">
                <div class="col-sm-6">
                    &copy; ID59122202031
                </div>
             
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="index.php">หน้าแรก</a></li>
                        <li><a href="Contact.php">เกี่ยวกับเรา</a></li>
                    </ul>
                </div>
            </div>
        </div>
     <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>   
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
    <!-- jQuery CDN -->
        <script src="js/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="/js/bootstrap3.3.7.min.js"></script>
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