<?php
     require './connect.php';
     session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>MAIMEEARAI</title>
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
         #map {
        height: 400px;
        width: 100%;
       }
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
<body class="homepage">   
   
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
                        <li class="active "><a href="Contact.php" class="hvr-grow"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;เกี่ยวกับเรา</a></li>
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
        <nav class="navbar navbar-fixed-top" role="banner" style="box-shadow: 0px 0px 5px 1px ;  ">
                 <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn" style="margin-left: 40px; background: transparent;  ">
                                <i><div >
                                <div class="bar1" style="background-color: #fff; box-shadow: 0px 0px 5px 5px rgba(0,0,0,.09); "></div>
                                <div class="bar2" style="background-color: #fff; box-shadow: 0px 0px 5px 5px rgba(0,0,0,.09); "></div>
                                <div class="bar3" style="background-color: #fff; box-shadow: 0px 0px 5px 5px rgba(0,0,0,.09); "></div>
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
                  </nav>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header> 
	
   
<div style="background: #333; z-index: 1;">
 <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 13.769014, lng: 100.622259};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdlFP5BnF5auUa6ZjXj5vl9HNZQdDnYPY&callback=initMap">
    </script>
</div>

	<section id="feature" style="background: #444">
        <div style="padding-left: 10%; padding-right: 10%;">
              <div class="row">
                <div class="features " align="left">
                    <div class="hvr-grow">
                    <div class="col-md-11  wow fadeInDown " data-wow-duration="1000ms" data-wow-delay="600ms" style="background-color: #FFBE7D; border-radius: 5px; height: 500px; bottom: 100px; box-shadow: 7px 7px 5px 2px; left: 150px; ">
                        <div style="color: #fff">
                            <i></i>
                            <h2><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;ที่อยู่</h2>
                            <p>250 ลาดพร้าว 
                            แขวง พลับพลา 
                             <br>เขต วังทองหลาง <br>
                             กรุงเทพมหานคร 10312</p>
                             <br>
                            <h2><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp;Social</h2>
                            <p><i class="fa fa-facebook-official"></i>&nbsp;facebook: ฟินแลนด์ นมสด&ไอติม</p>
                            <br>
                            <br>
                            <p><i class="fa fa-mobile fa-lg" aria-hidden="true"></i>&nbsp;เบอร์โทรศัพท์: 081-941-1603</p>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;เวลาเปิด-ปิด  : <br>เปิดทุกวัน 12:00-24:00น.</p>
                        </div>
                    </div><!--/.col-md-4-->
                </div> 

               <div class="hvr-grow wow fadeInDown">
                    <p style="background: transparent; bottom: 150px; left: 150px; position: relative;"><img src="image/shop/1.jpg" width="250" height="150" style="box-shadow: 5px 5px 20px 5px;  "></p>
                </div>
                 <div class="hvr-grow wow fadeInDown">
                    <p style="background: transparent; top: 50px; left: 10px; position: relative;"><img src="image/shop/222.jpg" width="250" height="150" style="box-shadow: 5px 5px 20px 5px "></p>
                </div>
                <div class="hvr-grow wow fadeInDown">
                    <p style="background: transparent; bottom: 100px;left: 50px; position: relative;"><img src="image/shop/3.jpg" width="250" height="150" style="box-shadow: 5px 5px 20px 5px "></p>
                </div>
                <div class="hvr-grow wow fadeInDown">
                    <p style="background: transparent; top: 150px; left: 10px; position: relative;"><img src="image/shop/4.jpg" width="250" height="150" style="box-shadow: 5px 5px 20px 5px "></p>
                </div>
                 <div class="hvr-grow wow fadeInDown">
                    <p style="background: #fff; top: 50px; left: 30px; position: relative;"><img src="image/shop/2.jpg" width="250" height="150" style="box-shadow: 5px 5px 20px 5px "></p>
                </div>
                <div class="hvr-grow wow fadeInDown">
                    <p style="background: transparent; bottom: 50px; left: 50px; position: relative;"><img src="image/shop/6.jpg" width="250" height="150" style="box-shadow: 5px 5px 20px 5px "></p>
                </div>
                <div class="hvr-grow wow fadeInDown">
                    <p style="background: transparent; top: 0px; left: 130px; position: relative;"><img src="image/shop/7.jpg" width="250" height="150" style="box-shadow: 5px 5px 20px 5px "></p>
                </div>



               
               

        </div><!--/.container-->
    </div>
     </section><!--/#feature-->
    <footer id="footer" class="midnight-blue">
        <div class="container" style="font-size: 16px">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 59122202031
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
</body>
</html>