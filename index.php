<?php
    session_start();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="icon" href="images/logo/petshop.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/ScrollOnTop.css" rel="stylesheet" type="text/css" />
    <link href="css/DangNhap_Ki.css" rel="stylesheet" type="text/css" />
    <link href="css/Header.css" rel="stylesheet" type="text/css" />
    <link href="css/Menu.css" rel="stylesheet" type="text/css" />
    <link href="css/Main.css" rel="stylesheet" type="text/css" />
    <link href="css/Footer.css" rel="stylesheet" type="text/css" />
    <link href="css/SlideShow.css" rel="stylesheet" type="text/css">
    <link href="css/SanPham.css" rel="stylesheet" type="text/css">
    <link href="css/SiteDangKi.css" rel="stylesheet" type="text/css">
    <link href="css/view_cart.css" rel="stylesheet" type="text/css">
    <link href="css/donhang.css" rel="stylesheet" type="text/css">

    <script src="js/Scroll_on_Top.js"></script>
    <script src="js/SP.js"></script>
    <script src="js/cart.js"></script>

    <title>
        <?php
            $titletab = "Pet Shop - Nơi mua sắm tuyệt vời cho thú cưng của bạn"; 
            if(isset($_GET['site']))
            {
                if($_GET['site'] == "DangKi")
                    $titletab = "Đăng ký tài khoản";
                else if($_GET['site'] == "GioHang")
                    $titletab = "Giỏ hàng";
                else if($_GET['site'] == "gioithieu")
                    $titletab = "Giới thiệu";
                else if($_GET['site'] == "sitemap")
                    $titletab = "Sitemap";
                else if($_GET['site'] == "chinhsachbaohanh")
                    $titletab = "Chính sách bảo hành";
                else if($_GET['site'] == "chinhsachdoitra")
                    $titletab = "Chính sách đổi trả";
                else if($_GET['site'] == "chinhsachgiaohang")
                    $titletab = "Chính sách giao hàng";
                else if($_GET['site'] == "dieukhoansudung")
                    $titletab = "Điều khoản sử dụng";
                else if($_GET['site'] == "phuongthucthanhtoan")
                    $titletab = "Phương thức thanh toán";
                else if($_GET['site'] == "tuyendung")
                    $titletab = "Tuyển dụng nhân viên";
            }
            echo $titletab;
        ?>
    </title>
<style>
* {
	box-sizing:border-box;
	-moz-box-sizing:border-box;
	-webkit-box-sizing:border-box;	
}

::-webkit-scrollbar {
    width:5px;	
}

::-webkit-scrollbar-thumb {
    background:lightpink;
    border-radius:20px;	
}
    
html {
 	scroll-behavior: smooth;
}

body {
	margin:0;
    padding: 0;
}
     
html, body { 
    cursor:url('http://www.snazzyspace.com/cursorsfolder/dog-paw.png'), auto; 
}

#Trang_gio_hang {
	display:none;
	position:fixed;
	right:8px;
	bottom:110px;
	z-index:99;
	font-size:18px;
	border:none;
	background-color:lightpink;
	cursor:pointer;
	padding:15px;
	border-radius:50%;
	outline:none;
}

.clear{
    clear: both;
}
</style>
</head>

<body>

<?php
    include('ScrollOnTop.php');
?>
<button onClick="window.location='index.php?site=GioHang'" id="Trang_gio_hang"><i class="fa fa-shopping-cart"></i></button>

<?php
    include("top.php");
    include("header.php");
?>

<div class="clear"></div>

<?php
    include("menu.php");
?>
<div class="clear"></div>
    
<?php
    if(empty($_GET))
        include("slides.php");
    else
    {
        if(isset($_GET['site']))
            if($_GET['site'] != "DangKi" && $_GET['site'] != "SanPham" && $_GET['site'] != "GioHang")
                include("slides.php");
    }
?>
    
<?php
    if(isset($_GET['site']) && $_GET['site'] == "GioHang")
            include("view_cart.php");
?>

<div class="Main">
    <?php
        if(empty($_GET))
            include("trangchu.php");
        else if(isset($_GET['site']))
        {
            if($_GET['site'] != "GioHang") {
                $site = $_GET['site'];
                switch ($site) {
                    case 'thucung':
                    case 'cho': 
                    case 'meo': 
                    case 'dongvatkhac': 
                    case 'chim': 
                    case 'ca': 
                    case 'hamster': 
                        include("timkiemnangcao.php");
                        break;
                    }
                include($_GET['site'].".php");
            }
        }
    ?>
    <div class="clear"></div>
</div>

<?php
    include("footer.php");
?>
</body>
</html>
