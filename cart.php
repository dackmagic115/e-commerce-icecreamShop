<?php
    session_start();
    require './connect.php';
    if(isset($_POST["add_to_cart"]))
    {
        if(isset($_SESSION['id']))
        {
        if(isset($_SESSION["shopping_cart"]))
        {
           $item_array_id= array_column($_SESSION["shopping_cart"],"item_id");
            if(!in_array($_GET["id"],$item_array_id))
            {
                //$count = count($_SESSION["shopping_cart"]);
                $item_array=array(

                        'item_id' => $_GET["id"],
                        'item_image'=>$_POST["hidden_image"],
                        'item_name'=>$_POST["hidden_name"],
                        'item_price'=>$_POST["hidden_price"],
                        'item_quantity'=>$_POST["quantity"] 
                );
               // $_SESSION["shopping_cart"][$count] = $item_array;
                $itemid = $_GET["id"];
                $_SESSION["shopping_cart"][$itemid] = $item_array;
               // var_dump( $_SESSION["shopping_cart"]);
                
            }
            else
            {
                //$count = count($_SESSION["shopping_cart"]);

               /* $item_array=array(

                        'item_id' => $_GET["id"],
                        'item_image'=>$_POST["hidden_image"],
                        'item_name'=>$_POST["hidden_name"],
                        'item_price'=>$_POST["hidden_price"],
                        'item_quantity'=>$_POST["quantity"] 
                );*/
               // $_SESSION["shopping_cart"][$count] = $item_array; 
             
             $itemid = $_GET["id"];
             $_SESSION["shopping_cart"][$itemid]['item_quantity']
              = 
             $_POST["quantity"] ;
                //var_dump($_SESSION["shopping_cart"]);

            }
        }
        else
        {
            $item_array= array(

                'item_id' => $_GET["id"],
                'item_image'=>$_POST["hidden_image"],
                'item_name'=>$_POST["hidden_name"],
                'item_price'=>$_POST["hidden_price"],
                'item_quantity'=>$_POST["quantity"]
            );
             $itemid = $_GET["id"];
            $_SESSION["shopping_cart"][$itemid]=$item_array;
            //var_dump($_SESSION["shopping_cart"]);

        }
        }
        else
        {
            echo '<script>alert("กรุณาเข้าสู่ระบบก่อนใช้งาน")</script>';
            echo '<script>window.location="login.php"</script>';
        }
    }
    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "delete")
        {

            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                if($values["item_id"] == $_GET["id"])
                {
                    unset($_SESSION["shopping_cart"][$keys]);
                    
                    echo '<script>window.location="cart.php"</script>';
                }
            }
            $_SESSION['shopping_cart'] = $_SESSION['shopping_cart'];
        }
    }
    if(isset($_POST["confirm"])){
        if($_SESSION["shopping_cart"] == $_SESSION["shopping_cart"][0] ){
             echo '<script>alert ("กรุณาเลือกสินค้า")</script>';
             echo '<script>window.location="menu.php"</script>';
        }else
            echo '<script>window.location="confirmcart.php"</script>';

    }
    if(isset($_POST["update"])){
        $newqty = $_POST['quantity'];
        $itemid = $_POST['idhidden'];
         foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                if($values["item_id"] == $itemid)
                {
                $_SESSION["shopping_cart"][$itemid]['item_quantity'] = $newqty;
             }
    }
}
   

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
        th{
            text-align: center;
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
                            <a href="#" class=""  aria-haspopup="true" style=" color: #fff;">ยินดีต้อนรับคุณ <?php echo $_SESSION['fname']; ?>  </a>
                              <ul class="dropdown-menu">
                                <li><a href="adminMenu.php">เมนูผู้ดูแล</a></li>
                                <li><a href="logout.php">ออกจากระบบ</a></li>
                              </ul>
                            </li>
                          </ul>
                       </div>
                          
                     <?php }else{?>
                   <div style="padding-top: 5px; color: #fff;">
                        <ul class="nav navbar-nav navbar-right" >
                            <li class="dropdown" style="margin-bottom: 0px;">
                            <a href="#" class=""  aria-haspopup="true" style=" color: #FFF;">ยินดีต้อนรับคุณ <?php echo $_SESSION['fname']; ?>  <i class="caret"></i></a>
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
	
    <section id="feature" style="background: #444; padding-top: 150px; height: 1000px 100%;">
        <div style="padding-left: 20%; padding-right: 20%;">
           <div class="center wow fadeInDown">
                <h2 style="text-shadow: 4px 4px 2px 0px black;">&nbsp;รายการสั่งสินค้า</h2>
            </div>
              <div class="row">
                <div class="col-sm-12 wow fadeInDown"><br>
                   <h3>รายละเอียด การสั่งสินค้า</h3>
        <div class="table-responsive">
            <table class="table " style="color: #fff;text-align:center; ">
                <tr>
                    <th >ชื่อสินค้า</th>
                    <th >รูปสินค้า</th>
                    <th >จำนวน</th>
                    <th >ราคา</th>
                    <th >ราคารวม</th>
                    <th ></th>
                </tr>
                 <form method="POST" >
                <?php
                if(!empty($_SESSION["shopping_cart"]))
                {
                    $total =  0;
                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                    {
                ?>
                <tr>
                    <td><?php echo $values["item_name"]; ?></td>
                    <td><img src="upload/<?php echo $values["item_image"];?>" width="150" height="130" ></td>
                    <td><?php echo $values["item_quantity"];?></td>
                    <input type="hidden" name="idhidden" value="<?php echo $values['item_id'];?>">
                    <td><?php echo $values["item_price"]; ?> บาท</td>
                    <td><?php echo number_format($values["item_quantity"] * $values["item_price"],2); ?></td>
                    <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"];?>" onclick="return confirm('คุณต้องการยกเลิกรายการสินค้านี้หรือไม่?')"><span class="">ยกเลิก</span></a></td>
                </tr>
                <?php
                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                    }
                ?>
                <tr>
                    <td colspan="4" align="right">ราคาทั้งหมด</td>
                    <td align="right">$ <?php echo number_format($total, 2);?></td>
                    <td></td>
                </tr>
                <?php
                }

                ?>
            </table>
            

           
            
             <button type="button" name="Submit2"  onclick="window.location='menu.php';" class="btn btn-danger" style="font-size: 20px;"> 
                 เลือกสินค้าเพิ่ม </button>
                
                 <div align="right">
              
                 <input type="submit" name="confirm"   class="btn btn-info" value="สั่งสินค้า" style="font-size: 20px;">
             </div>
             </form> 
            
           
                    </div>
                    </a>
                     <div class="row">
                    <div class="col-sm-12" style="height: 1000px;"></div>
                </div>
                </div> 


                   
                  <script >
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