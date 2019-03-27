<?php
     require './connect.php';
     session_start();
     error_reporting(0);
     $uid = $_GET['id'];
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
         <?php 
            if(isset($_POST["delete_order"])){

                $idorder=$_GET['id'];

                $sql="DELETE FROM tb_order LEFT JOIN tb_order_detail WHERE ID_order = $idorder";
                $result =  mysqli_query($conn,$sql);
                if($result){
                        echo "<script>alert('ลบแล้วเรียบร้อย');</script>";
                        echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=http://localhost/ProjectNewV.7/c_checkorder.php'>";
                }
            }
         ?>
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
    <section id="feature" style="background: #444; padding-top: 150px; height: 100%;">
        <div style="padding-left: 0; padding-right: 0;" align="center">
           <div class="center wow fadeInDown">
                <h2 style="text-shadow: 4px 4px 2px 0px black;">ประวัติการสั่งซื้อ</h2>
            </div>
              <div class="row">
                <div class="col-sm-12 wow fadeInDown">
                    <h2 >กำลังดำเนินการ</h2>
                    <div class="row">
                <Q class="col-sm-12 wow fadeInDown" style=""><br>
                    <table border="0" cellpadding="4" cellspacing="1" width="100%" style="text-align: center; box-shadow: 1px 2px 2px 1px rgba(0, 0, 0, 0.07) " >
                        <tr bgcolor="#ffccff" >
                            <th>รหัสใบสั่ง</th>
                            <th>รหัสลูกค้า</th>
                            <th>วันที่จะมารับ</th>
                            <th>เวลาที่จะมารับ</th>
                            <th>เวลาที่ทำการสั่งซื้อ</th>
                            <th>จำนวนเงินทั้งหมด</th>
                            <th>สถานะ</th>
                            <th></th>
                        </tr>
            <?php
                    $sql="SELECT count(*) as total from tb_order ";
                        $result = mysqli_query($conn, $sql);
                        $count=0;
                        $row = mysqli_fetch_assoc($result);
                        //
                        $N = $row["total"] ;
                        $RPP=5;
                        $MAX=ceil($N/$RPP); // จำนวนหน้าทั้งหมด
                        if(isset($_GET["P"]))
                            $P=$_GET["P"]; // หน้าที่ P
                        else $P=1;
                        $start=($P-1)*$RPP;
                        $sql="SELECT  *  FROM tb_order WHERE uid = $uid and status = 1  limit  $start, $RPP";
                        $result = mysqli_query($conn, $sql);
                        $count=0;
        while( $row = mysqli_fetch_assoc($result))
            {
            $bg=(++$count%2==0)?"#66ffff": "#3399ff";
        ?>
        <tr bgcolor="<?=$bg?>">
            <td><?=$row["ID_order"]?></td>
            <td><?=$row["uid"]?></td>
            <td><?=$row["date_take"]?></td>
            <td><?=$row["time_take"]?></td>
            <td><?=$row["order_date"]?></td>
            <td><?=$row["total"]?> บาท</td>
            <td><?php if($row["status"] == 1 ){
                echo "กำลังดำเนินการ";}else{
                    echo "เสร็จิส้น";}?></td>
          
            <td> 
                <form method="POST" action="?id=<?=$row["ID_order"]?>">
                <input type="button" name="see_details" class="btn btn-secondary" value="ดูรายละเอียด" onclick="window.location='c_showdeatils.php?id=<?=$row["ID_order"]?>'">
               
                <a href="c_cancalorder.php?id=<?=$row["ID_order"]?>"  name="delete_order" class="btn btn-warning" onclick="return confirm('คุณจะยกเลิกการสั่งสินค้าหรือไม่?')" >ยกเลิก</a>
                </form>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
    
    <div align="center" style="color: #FFF;">
    หน้าที่ : 
    <?php
        for($i=1;$i<=$MAX ; $i++)
            echo "<a href='?P=$i'>$i</a> ";
    ?>

                    
        </div><!--/.container-->
         <div class="row" style="padding-top: 300px">
                <div class="col-sm-12 wow fadeInDown">
                    <h2 >ประวัติย้อนหลัง</h2>
                    <div class="row">
                <Q class="col-sm-12 wow fadeInDown" style=""><br>
                    <table border="0" cellpadding="4" cellspacing="1" width="100%" style="text-align: center; box-shadow: 1px 2px 2px 1px rgba(0, 0, 0, 0.07) " >
                        <tr bgcolor="#ffccff" >
                            <th>รหัสใบสั่ง</th>
                            <th>รหัสลูกค้า</th>
                            <th>วันที่จะมารับ</th>
                            <th>เวลาที่จะมารับ</th>
                            <th>เวลาที่ทำการสั่งซื้อ</th>
                            <th>จำนวนเงินทั้งหมด</th>
                            <th>สถานะ</th>
                           
                        </tr>
            <?php
                    $sql="SELECT count(*) as total from tb_order ";
                        $result = mysqli_query($conn, $sql);
                        $count=0;
                        $row = mysqli_fetch_assoc($result);
                        //
                        $N = $row["total"] ;
                        $RPP=5;
                        $MAX=ceil($N/$RPP); // จำนวนหน้าทั้งหมด
                        if(isset($_GET["P2"]))
                            $P2=$_GET["P2"]; // หน้าที่ P
                        else $P2=1;
                        $start=($P2-1)*$RPP;
                        $sql="SELECT  *  FROM tb_order WHERE uid = $uid and status = 0  limit  $start, $RPP";
                        $result = mysqli_query($conn, $sql);
                        $count=0;
        while( $row = mysqli_fetch_assoc($result))
            {
            $bg=(++$count%2==0)?"#66ffff": "#3399ff";
        ?>
        <tr bgcolor="<?=$bg?>">
            <td><?=$row["ID_order"]?></td>
            <td><?=$row["uid"]?></td>
            <td><?=$row["date_take"]?></td>
            <td><?=$row["time_take"]?></td>
            <td><?=$row["order_date"]?></td>
            <td><?=$row["total"]?> บาท</td>
            <td><?php if($row["status"] == 1 ){
                echo "กำลังดำเนินการ";}else{
                    echo "เสร็จสิ้น";}?></td>
          
           
        </tr>
        <?php
            }
        ?>
    </table>
    
    <div align="center" style="color: #FFF;">
    หน้าที่ : 
    <?php
        for($i=1;$i<=$MAX ; $i++)
            echo "<a href='?P2=$i'>$i</a> ";
    ?>

                    
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