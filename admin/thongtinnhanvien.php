<?php
    require '../DataProvider.php';
    require '../ProductsPerPage.inc';
?>

<?php
    if (isset($_POST['masp']) && isset($_POST['tensp']) && isset($_POST['giatien']) && isset($_POST['hinhanh']) && isset($_POST['mota'])){
        $sql = "INSERT INTO sanpham(masp, tensp, hinhanh, soluong, giatien, mota, xoa) VALUES ('".$_POST['masp']."', '".$_POST['tensp']."', '".$_POST['hinhanh']."', 100, ".$_POST['giatien'].", '".$_POST['mota']."', 0)";
        DataProvider::executeQuery($sql);
    }

    if (isset($_POST['del_id'])){
       $sql = "UPDATE sanpham SET xoa=1 WHERE masp = '" .$_POST['del_id']. "'";
       DataProvider::executeQuery($sql);
    }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/logo/petshop.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/ScrollOnTop.css" rel="stylesheet" type="text/css" />
    <link href="css/Menu.css" rel="stylesheet" type="text/css" />
    <link href="css/header.css" rel="stylesheet" type="text/css" />
    <link href='css/users.css' rel='stylesheet' type='text/css' />
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../js/Scroll_on_Top.js"></script>
    <script src="js/sp.js"></script>
    <script src="js/users.js"></script>
    <script src="js/donhang.js"></script>
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
    background-color: #ebebeb;
}

html, body { 
    cursor:url('http://www.snazzyspace.com/cursorsfolder/dog-paw.png'), auto; 
}
    
@media only screen and (max-width: 476px){
    .admin-logo{
        width: 476px;
    }
    
    .main{
        width: 476px;
    }
}    
</style>
</head>

<body>
<?php
    include('../ScrollOnTop.php');
?>
    
<?php
    include("menu.php");
?>

<?php
    include("header.php");
?>

<div class="main" id="Main">
    <table id="table-user" cellpadding="10px" cellspacing="0">
        <caption>
            <span class="table-caption"><h1>Thông tin nhân viên</h1></span>
            <div class="them-nv"><button onclick="popup_themsp()"><i class="fas fa-edit"></i><strong> Thêm</strong></button></div>
        </caption>
        
        <thead>
            <tr style="background-color: #222; color: #f5f5f5;text-align: center;font-size: 20px;font-weight: bold">
                <th>Tên đăng nhập</th>
                <th>Họ tên</th>
                <th>Vai trò</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <tr></tr>
        </tbody>
    </table>

    <div style="clear: both"></div>

    <div class="popup-themuser">
        <div class="popup-themuser__content">
            <div class="popup-themuser__title">Sửa User</div>
            <div class="popup-themuser-left">
                <div class="popup-themuser-left__label">STT</div>
                <div class="popup-themuser-left__label">Tên đăng nhập</div>
                <div class="popup-themuser-left__label">Họ và tên</div>
                <div class="popup-themuser-left__label">Giới Tính</div>
                <div class="popup-themuser-left__label">Ngày Sinh</div>
                <div class="popup-themuser-left__label">SĐT</div>
            </div>
            <div class="popup-themsp-right">
                <div class="popup-themuser-left__input"><input class="sua-user" type="text" readonly="" style="cursor: default"></div>
                <div class="popup-themuser-left__input"><input class="sua-user" type="text"></div>
                <div class="popup-themuser-left__input"><input class="sua-user" type="text"></div>
                <div class="popup-themuser-left__input"><input class="sua-user" type="text"></div>
                <div class="popup-themuser-left__input"><input class="sua-user" type="text"></div>
                <div class="popup-themuser-left__input"><input class="sua-user" type="text"></div>
            </div>
            <button class="popup-themuser__btn" onclick="sua_thong_tin_user()">Sửa</button>
            <span class="back" onclick="close_popup_themuser()">&times;</span>
        </div>
    </div>

    <script>window.onload=load_quan_ly_user(); xoa_user()</script>
</div>
</body>
</html>