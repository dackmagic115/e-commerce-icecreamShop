<?php
    require'./connect.php';
    session_start();
     error_reporting(E_ALL);
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
  <link rel="stylesheet" href="css/menu.css">
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
                 <li ><a href="index.php" class="hvr-grow"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;หน้าแรก</a></li>
                        <li class="active "><a href="menu.php" class="hvr-grow"><i class="fa fa-cutlery" aria-hidden="true"></i>&nbsp;รายการสินค้า</a></li>
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
        <nav class="navbar navbar-fixed-top" role="banner" style="background: #88BBAA; filter: opacity(90%);box-shadow: 1px 2px 2px 1px rgba(0, 0, 0, 0.07) ">
                 <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn" style="margin-left: 40px; background: transparent;  ">
                                <i><div >
                                <div class="bar1" style="background-color: #fff "></div>
                                <div class="bar2" style="background-color: #fff "></div>
                                <div class="bar3" style="background-color: #fff "></div>
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

                  </nav>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header> 


  	  <section id="feature" style="background: #88BBAA;" >
                  <div style=" padding-left: 50px;  margin-top: 150px;  ">
                       <div class="left " style="background: #88BBAA;">
                       
                              <div class="item ">
                              

                              <a href="menu.php" >
                                  <span class="glyphicon" ><img src="image/logoicecream.png" width="50" height="50">
                                  <span style="font-size: 30px;  padding-left: 20px; font-family: 'kanit',jasmineupc; ">ไอศกรีม</span>
                                  </span>
                              </a>    
                              </div>

                            
                              <div class="item">
                                <a href="menu2.php" class="active">
                                    <span class="glyphicon "><img src="image/logobowl.png" width="50" height="50">
                                    <span style="font-size: 30px;  padding-left: 20px;font-family: 'kanit',jasmineupc;">ไอศกรีมถ้วย</span>
                                    </span>
                                </a> 
                              </div>
                              <div class="item">
                                <a href="menu3.php" class="active">
                                    <span class="glyphicon "><img src="image/cooldrink.png" width="50" height="50">
                                    <span style="font-size: 30px; padding-left: 20px;font-family: 'kanit',jasmineupc; ">เครื่องดื่ม</span>
                                 </div>  
                                </a>    
                               </div>


                  </div>
      </section >
      
      <section id="features" style="background: #88BBAA;">
        <div style="padding-left: 10%; padding-right: 10%;">
         <div class="center wow fadeInDown"  style="padding-right: 20px; margin-top: 0px;">
                <h1 style="color: #fff; text-shadow: 4px 4px 2px 0px black;"><img src="image/logoicecream.png" width="50" height="50">รสชาติไอศครีม</h1>
                </p>
                <p class="lead" align="right" style="font-size: 20px;"><a href="cart.php"><i class="fa fa-shopping-cart fa-5x"></i><br>ตะกร้าสินค้า</a></p>
            </div>

            <div class="row">
                <div class="features" style="background: #88BBAA; " align="center">
                  <?php
                     $sql="SELECT * FROM products WHERE type=1";
                     $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                          while ($row = mysqli_fetch_array($result))
                          {
                        ?>

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
                        <div class="hvr-grow">
                          <a href="menu_details.php?id_product=<?php echo $row["idProducts"];?>">
                           <h2><?php echo $row["P_name"];?></h2>
                            <span style="cursor:pointer"><img src="upload/<?php echo $row["P_image"];?>" width="300" height="250"></span>
                           </a>
                        </div>
            </div><!--/.row-->   
                          <?php
          }
        }
      ?> 

                


        </div><!--/.container-->
      </section><!--/#feature-->
       <!---/#POP-UP-->
       
      
      

    
     
     
      <footer id="footer" class="midnight-blue" style="background: #88BBAA;">
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
        if ($(window).scrollTop() >= 20
        ) { // use any value lower than the navbar height, [20] is an example

            $('.navbar').css({ // reducing the vertical padding from 25px to 10px
                'padding-top': '10px',
                'padding-bottom': '10px'

            });

        } else {

            $('.navbar').css({ // reset the vertical padding to its initial value [25px]
                'padding-top': '35px',
                'padding-bottom': '35px'


            });
        }
    });

    });    
   </script>
 
</body>
</html>