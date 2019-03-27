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
    .popup {
    height: 100%;
    width: 100%;
    display: none;
    position: fixed;
    z-index: 1500;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(136, 187, 170,0.97);
    transition: 2s;
    filter: opacity(100%);
    

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

          .popup-content {
              position: relative;
              top: 25%;
              width: 100%;
              text-align: center;
              margin-top: 30px;
              transition: 0.3s;
          }

          .popup a {
              padding: 8px;
              text-decoration: none;
              font-size: 36px;
              color: #818181;
              display: block;
              transition: 0.3s;
          }

          .popup a:hover, .overlay a:focus {
              color: #f1f1f1;
              transition: 0.3s;
          }

          .popup .closebtn {
              position: absolute;
              top: 20px;
              right: 45px;
              font-size: 60px;
              transition: background .35s ease-out;;
          }

          @media screen and (max-height: 450px) {
            .popup a {font-size: 20px}
            .popup .closebtn {
              font-size: 40px;
              top: 15px;
              right: 35px;
            }
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
                 <li class="active "><a href="index.php" class="hvr-grow"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;หน้าแรก</a></li>
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
           <div class="row" style="padding-left: 10px; ">
            <div>
                <div class="col-md-2" >
                      <a href="index.php" ><img src="image/logo.png" width="150" height="80" style="margin-left: 60px;"></a>
                </div>
                <!-- login !-->
            
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
            </div>
            </div><!--/.container-->

        </nav><!--/nav-->
    </header> 

	<div class="slider">
		<div class="" style="padding-bottom: 0px;">
			<div id="about-slider">
				<div id="carousel-slider" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
				  	<ol class="carousel-indicators visible-xs">
					    <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-slider" data-slide-to="1"></li>
					    <li data-target="#carousel-slider" data-slide-to="2"></li>
				  	</ol>

					<div class="carousel-inner" style="padding-top: 0px;">
						<div class="item active">
							<img src="image/01.jpg" class="img-responsive" alt="" width="100%" height="1080"> 
					   </div>
					   <div class="item">
							<img src="image/05.jpg" class="img-responsive" alt="" width="100%" height="1080"> 
					   </div> 
					   <div class="item">
							<img src="image/03.jpg" class="img-responsive" alt="" width="100%" height="1080"> 
					   </div> 

					</div>
          
				</div> <!--/#carousel-slider-->
			</div><!--/#about-slider-->
		</div>
	</div>
</div>
    <section id="feature" style="background: #444;  " >
        <div style="padding-right: 15%; padding-left:15%; ">

           
           <div class="row" style="">
               <div class="col-md-4 col-sm-6 hvr-grow boxitem " style="background: #6b8e23; bottom: 40px;  box-shadow: 5px 8px 20px 5px ;">
            <h2><i class="fa fa-star" aria-hidden="true"></i>&nbsp;รสชาติยอดนิยม</h2>
    <div class="slider">
        <div class="" style="padding-bottom: 0px;">
            <div id="about-slider">
                <div id="carousel-slider" class="carousel slide" data-ride="carousel" style="padding-top: 50px;">
                    <!-- Indicators -->
                    <ol class="carousel-indicators visible-xs" >
                        <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-slider" data-slide-to="1"></li>
                        <li data-target="#carousel-slider" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner"  align="center">
                        <div class="item active">
                          <a href="menu.php">
                            <img src="image/allmenu/ช็อคโกแลต.png" class="img-responsive" alt="" width="200" height="250"> 
                            <h2>ช็อคโกแลต</h2>
                           </a> 
                       </div>
                       <div class="item">
                            <img src="image/allmenu/บลูเบอร์รี่ชีสเค้ก.png" class="img-responsive" alt="" width="200" height="250"> 
                            <h2>ลูเบอร์รี่ชีสเค้ก</h2>
                       </div> 
                       <div class="item">
                            <img src="image/allmenu/ดาร์คช็อคโกแลต ทรัฟเฟิล.png" class="img-responsive" alt="" width="200" height="250"> 
                            <h2>ดาร์คช็อคโกแลต ทรัฟเฟิล</h2>
                       </div> 
      
                    </div>

                </div> <!--/#carousel-slider-->
            </div><!--/#about-slider-->
        </div>
        </a>  
    </div>
               </div>
               <a href="menu2.php">
               <div class="col-md-4 col-sm-6  " style="background: height: 400px; " >
                   <p align="center" style="padding-top: 100px; padding-right:  80px"><h2 align="center" align="center" style="padding-top: 0px; padding-right:  110px; text-shadow: 4px 4px 2px 0px black;" >โปรโมชั่น<br> & <br>สินค้ายอดนิยม<h2></p>
               </div>
               <div class="col-md-4 col-sm-6 hvr-grow boxitem" style="background: #88BBAA; height: 400px; right: 120px;bottom: 40px;
               box-shadow: 5px 8px 20px 5px ;">
                   
                 <h2><i class="fa fa-tags" aria-hidden="true"></i>&nbsp;โปรโมชั่น</h2>
    <div class="slider">
        <div class="" style="padding-bottom: 0px;">
            <div id="about-slider">
                <div id="carousel-slider" class="carousel slide" data-ride="carousel" style="padding-top: 80px;">
                    <!-- Indicators -->
                    <ol class="carousel-indicators visible-xs" >
                        <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-slider" data-slide-to="1"></li>
                        <li data-target="#carousel-slider" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner"  align="center">
                        <div class="item active">
                            <img src="image/promo1.png" class="img-responsive" alt="" width="200" height="250"> 
                            <h2>โปรโมชั่น1</h2>
                       </div>
                       <div class="item">
                            <img src="image/promo1.png" class="img-responsive" alt="" width="200" height="250"> 
                            <h2>โปรโมชั่น2</h2>
                       </div> 
                       <div class="item">
                            <img src="image/promo1.png" class="img-responsive" alt="" width="200" height="250"> 
                            <h2>โปรโมชั่น3</h2>
                       </div> 

                    </div>
                </div> <!--/#carousel-slider-->
            </div><!--/#about-slider-->
        </div>
         </a>
    </div>
               </div>
               <li style="color: #444">.</li>
               <a href="menu2.php">
               <div class="col-md-4 col-sm-6 hvr-grow boxitem" style="background: #A4C8F0; height: 400px; bottom: 50px; left:180px; box-shadow: 5px 8px 20px 5px;">
                    <h2><i class="fa fa-star" aria-hidden="true"></i>&nbsp;ถ้วยยอดนิยม</h2>
    <div class="slider">
        <div class="" style="padding-bottom: 0px;">
            <div id="about-slider">
                <div id="carousel-slider" class="carousel slide" data-ride="carousel" style="padding-top: 40px;">
                    <!-- Indicators -->
                    <ol class="carousel-indicators visible-xs" >
                        <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-slider" data-slide-to="1"></li>
                        <li data-target="#carousel-slider" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner"  align="center">
                        <div class="item active" style="color: #fff;">
                           <img src="image/png/CHOCOLATE ICE CREAM BOWLS.png" width="350" height="100"> 
                            <p><h3>CHOCOLATE ICE CREAM BOWLS</h3></p>
                       </div>
                       <div class="item" style="color: #fff;">
                            <img src="image/png/Chocolate Chip Cookie Bowls Recipe.png" width="250" height="250">
                            <h3>Chocolate Chip Cookie Bowls</h3>
                       </div> 
                       <div class="item" style="padding-top: 40px; ">
                            <img src="image/png/Mix Ice Cream Bowl in Plate Wallpaper.png" width="300" height="150">
                            <h3>Mix Ice Cream Bowl</h3>
                       </div> 
                    </div>
                </div> <!--/#carousel-slider-->
            </div><!--/#about-slider-->
        </div>
         </a>
    </div>

               </div>
               <a href="menu3.php">
               <div class="col-md-4 col-sm-6 hvr-grow" style="background:  height: 400px; px;"></div>
               <div class="col-md-4 col-sm-6 hvr-grow boxitem" style="background: #6699AA; height: 400px; bottom: 50px; left:60px;
               box-shadow: 5px 8px 20px 5px ;">
                    <h2><i class="fa fa-star" aria-hidden="true"></i>&nbsp;เครื่องดื่มยอดนิยม</h2>
    <div class="slider">
        <div class="" style="padding-bottom: 0px;">
            <div id="about-slider">
                <div id="carousel-slider" class="carousel slide" data-ride="carousel" style="padding-top: 50px;">
                    <!-- Indicators -->
                    <ol class="carousel-indicators visible-xs" >
                        <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-slider" data-slide-to="1"></li>
                        <li data-target="#carousel-slider" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner"  align="center">
                        <div class="item active">
                            <img src="image/water/โยเกิร์ตน้ำผึ้งมะนาวปั่น1.png" width="150" height="250"> 
                            <h2>โยเกิร์ตน้ำผึ้งมะนาวปั่น</h2>
                       </div>
                       <div class="item">
                            <img src="image/water/แอปเปิ้ลปั่น.png" width="300" height="250"> 
                            <h2>แอปเปิ้ลปั่น</h2>
                       </div> 
                       <div class="item">
                            <img src="image/water/น้ำสตอเบอรี่กล้วยปั่น1.png" width="150" height="250">
                            <h2>น้ำสตอเบอรี่กล้วยปั่น</h2>
                       </div> 
                    </div>
                </div> <!--/#carousel-slider-->
            </div><!--/#about-slider-->
        </div>
         </a>
    </div>

               </div>
           </div> 
        <br>
    </section><!--/#feature-->

    <footer id="footer" class="midnight-blue">
        <div class="container" style="font-size: 16px">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 59122202038
                </div>
             
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="index.php">หน้าแรก</a></li>
                        <li><a href="Contact.php">เกี่ยวกับเรา</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="login" class="popup">
            <a href="javascript:void(0)" class="closebtn" onclick="closemenu009()">&times;</a>
          <div style="padding-left: 50px;">  
            <div class="col-sm-4" style="border-bottom: 2px solid #fff;">
              <h1 style="color: #fff; text-align: left;" >ทุเรียนหมอนทอง</h1>
            </div>
          </div> 
                <div class="col-sm-12 center" style="padding-top: 130px">
                   <div class="hvr-grow">
                           <i><img src="image/allmenu/ทุเรียนหมอนทอง.png" width="300" height="250"></i>  
                    </div>
                </div>
           <div style="padding-left: 50px;">    
            <div class="col-sm-3" style="background: ; border-right: 2px solid #fff; height: 150px; color: #fff; " >    
             <p style=" ">
                   <span class="glyphicon glyphicon-list"></span> &nbsp;รายละเอียดสินค้า 
             </p> 
              <p>ส่วนผสม :</p>
             </div> 
            </div>   
           <div style="position: relative;top: 15px;"> 
            <div class="col-sm-3" style="background: ;" >    
              <p style=" color: #fff; ">ราคา : xxx บาท</p>
            </div> 
            </div> 
              <p align="right" style="padding-right: 200px; padding-top: 50px">
                  <button type="button" class="btn btn-default" style="font-size: 30px; color: #88BBAA;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; สั่งจองสินค้า</button>
              </p>   
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