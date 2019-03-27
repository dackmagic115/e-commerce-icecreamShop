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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jasny-bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">      
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
    <link rel="stylesheet" href="css/hover-min.css">
    <style >
        #product{
            border:1px solid red;
            background-color: ;
            border-radius: 5px;
            padding: 16px;
        }
        h3,h2{
            color: #fff;
        }
        h4{
            color: #fff;
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
                        <li ><a href="menu.php" class="hvr-grow"><i class="fa fa-cutlery" aria-hidden="true"></i>&nbsp;รายการสินค้า</a></li>
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
                            <a href="#" class=""  aria-haspopup="true" style=" color: #fff;">ยินดีต้อนรับคุณ <?php echo $_SESSION['fname']; ?>  <i class="caret"></i></a>
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
	
    <section id="feature" style="background: #444; padding-top: 150px; height: 3500px;">
        <div style="padding-left: 30%; padding-right: 30%;">
           <div class="center wow fadeInDown">
                <h2 style="text-shadow: 4px 4px 2px 0px black;">&nbsp;เพิ่มสินค้าใหม่</h2>
            </div>
            <div class="row" align="center" style="padding-right : 50%">
                
                <div class="col-sm-6 wow fadeInDown"><br>
                    <a href="adminShowproduct.php" onclick="blowdata();">
                    <div  align="center" style=" border:1px solid red;
                                                 background-color: #FDB4BF;
                                                 border-radius: 5px;
                                                 padding: 16px;">

                        <i class="fa fa-shopping-cart fa-5x"></i>

                        <h2>ข้อมูลสินค้า</h2>
                    </div>
                    </a>
                </div>  
                
            </div>
                    
                    <?php
                            if(isset($_POST['ok'])){
                                $n = $_POST['p_name'];
                                $c = $_POST['cost'];
                                $d = $_POST['details'];
                                $t = $_POST['menu'];
                                $img = $_FILES['image_product']['name'];
                                $temp = explode('.',$img);
                                $newName = round(microtime(true)).'.'. end($temp);
                                if(move_uploaded_file($_FILES['image_product']['tmp_name'], 'upload/'.$newName)){
                                $sql = "INSERT INTO `products` (`P_name`, `cost`, `P_image`,`P_details`,`type`) VALUES ('$n', '$c','$newName','$d','$t');";
                                    $result = mysqli_query($conn,$sql);
                                    if($result){
                                        echo'  
                                <script>swal("บันทึกเรียบร้อย!", "", "success"); </script>';
                                    }
                                }
                                }
                            ?>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-3"></div>
                       
                        <div class="col-sm-6" style="color: #fff;">
                            <div style="font-size: 50px;" align="center">
                           
                             </div><br>     
                           <form method="POST" action="" name="submit" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
                                  
                            <div class="form-group">
                                  <label>ชื่อสินค้า : </label>
                                  <input type="text" name="p_name" class="form-control"  style="box-shadow: 5px 5px 5px 2px;">
                             </div>
                            <div class="form-group">
                                  <label>ราคา : </label>
                                  <input type="text" name="cost" class="form-control" onkeypress="isInputNumber(event)"  style="box-shadow: 5px 5px 5px 2px;">
                            </div>
                              
                            <div class="form-group">
                                  <label>รายละเอียด : </label>
                                  <textarea type="" name="details" class="form-control" rows="5"  style="box-shadow: 5px 5px 5px 2px;"> </textarea>
                            </div><br>
                              <label>รูปสินค้า : </label>
                            <div class="form-group" align="center">

                                 <span class="btn btn-info btn-file"><span class="fileinput-new"><h4 style="color: #444;">เลือกรูปภาพ</h4></span> <input type="file" id="inputGroupFile02"  onchange="readURL(this)" name="image_product"></span><br><br>
                                  <figure class="figure">
                                    <img id="imgUpload"  src="image/55.svg" width="250"  class="figure-img img-fluid rounded" alt="" >
                                  </figure>
                            </div>
                            <div class="form-group">
                                <label>ประเภท : </label> <br>
                                 <input type="radio" name="menu" id="rdo1" value="1"> รสชาติ 
                                 <input type="radio" name="menu" id="rdo2" value="2"> ไอศครีมแบบถ้วย
                                 <input type="radio" name="menu" id="rdo3" value="3"> เพิ่มเครื่องดื่ม
                            </div><br>
                            <div class="form-group" align="center">
                                 <input type="submit"  name="ok" value="บันทึก" class="btn btn-warning" style="width: 5em;height: 50px;">
                            </div>
                           </form>
                        </div>

                </div>
            </div>


            <script >
      function fncSubmit()
        {

           if(document.submit.p_name.value == "")
           {
              swal("กรุณากรอก ชื่อสินค้า", "", "warning"); 
              document.submit.p_name.focus();
              return false;
           }   
           if(document.submit.cost.value == "")
           {
              swal('กรุณากรอก ราคา', "", "warning");
              document.submit.cost.focus();
              return false;
           }   
           if(document.submit.details.value == "")
           {
              swal('กรุณากรอก รายละเอียดสินค้า', "", "warning");
              document.submit.details.focus();
              return false;
           }   
           if(document.submit.image_product.value == "")
           {
              swal('กรุณากรอก ใส่รูปสินค้า', "", "warning");
              document.submit.image_product.focus();
              return false;
           } 
            if(document.submit.rdo1.checked == false && document.submit.rdo2.checked == false && document.submit.rdo3.checked == false)
           {
                  swal('กรุณาเลือก ประเภทสินค้า', "", "warning");
                
                  return false;
           } 
        }


                function readURL(input){
                        var reader = new FileReader();

                        reader.onload = function(e){
                            console.log(e.target.result)
                            $('#imgUpload').attr('src',e.target.result).width(300)
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
            function isInputNumber(evt){
                
                var ch = String.fromCharCode(evt.which);
                
                if(!(/[0-9]/.test(ch))){
                    evt.preventDefault();
                } 
            }
               
            </script>   
                  
                    
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
        <script src="js/jasny-bootstrap.js"></script>
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