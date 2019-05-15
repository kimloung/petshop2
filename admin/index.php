<?php
    session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/logo/petshop.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/dangnhap.css" rel="stylesheet" type="text/css" />
<title>Admin area</title>
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
    background: linear-gradient(135deg, #298ED7, #7100FF, #C000FF) fixed;
}
    
.clear{
    clear: both;
}
</style>
<script src="js/dangnhap.js"></script>
</head>

<body>
<div class="dangnhap">
    <div class="khungdangnhap">
        <center><img style="padding-top: 10%" src="images/logo.png"></center>
        <div class="clear"></div>
        <h1 class="quantiwebsite">Quản trị website</h1>
        <div class="clear"></div>
        <form action="xulytaikhoan.php" method="post">
            <div class="input">
                <i class="fas fa-user"></i>
                <input type="text" name="taikhoan" id="username" placeholder="Username.." autocomplete="off">
            </div>
            <div class="input">
                <i class="fas fa-key"></i>
                <input type="password" name="matkhau" id="password" placeholder="Password..." autocomplete="off">
            </div>
            <div style="margin-top: 10px;padding:10px"><input type="submit" name="btnlogin" value="Đăng nhập"></div>
        </form>
        <div class="clear"></div>
        <div class="forget" onClick="password_help()"><i class="fas fa-info-circle"></i> Bạn quên mật khẩu?</div>
        <div id="forget_pass" style="display: none">
            1. Nếu bạn là quản lý cấp cao nhất của website, vui lòng gửi email tới <a href="mailto:hotro@petshop.com"><strong>hotro@petshop.com</strong></a> với tiêu đề: <strong>Hỗ trợ đăng nhập website PetShop</strong>.<br />
            2. Nếu bạn là nhân viên, vui lòng hỏi người quản lý của bạn để cài lại mật khẩu.
        </div>
    </div>
    <div class="imageslogin">
        <img src="images/login.gif" width="100%" height="100%" style="border-radius: 0 10px 10px 0">
    </div>
</div>
</body>
</html>
