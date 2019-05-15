<?php
    session_start();
    if(!isset($_SESSION['managerIsLogin']) && !isset($_SESSION['managervaitro']))
        echo "<script language='javascript'>window.location='index.php';</script>";
    else if(isset($_SESSION['managerIsLogin']) && isset($_SESSION['managervaitro']))
    {
        if($_SESSION['managerIsLogin'] == 1 && $_SESSION['managervaitro'] == "admin")
            ;
        else if($_SESSION['managerIsLogin'] == 1 && $_SESSION['managervaitro'] == "sale")
            ;
        else
            echo "<script language='javascript'>window.location='index.php';</script>";
    }
    else
        echo "<script language='javascript'>window.location='index.php';</script>";
?>

<?php
    require '../DataProvider.php';
?>

<?php
    $sql = "SELECT * FROM taikhoan WHERE tendangnhap = '".$_SESSION['managerusername']."'";
    $result = DataProvider::executeQuery($sql);
    while ($row = mysqli_fetch_array($result))
    {
        $username = $row["tendangnhap"];
        $name = $row["hoten"];
        $mail = $row["email"];
        $birth = $row["ngaysinh"];
        $phone = $row["dienthoai"];
    }
?>

<?php
    if (isset($_POST['hoten']) && isset($_POST['ngaysinh'])){
        $sql = "UPDATE taikhoan SET hoten='".$_POST['hoten']."', ngaysinh='".$_POST['ngaysinh']."' WHERE tendangnhap = '" .$_SESSION['managerusername']. "'";
        DataProvider::executeQuery($sql);
        echo "<script type='text/javascript'>alert('Cập nhật thông tin cơ bản thành công!');</script>";
    }
    if (isset($_POST['email']) && isset($_POST['dienthoai'])){
        $sql = "UPDATE taikhoan SET email='".$_POST['email']."', dienthoai='".$_POST['dienthoai']."' WHERE tendangnhap = '" .$_SESSION['managerusername']. "'";
        DataProvider::executeQuery($sql);
        echo "<script type='text/javascript'>alert('Cập nhật thông tin liên lạc thành công!');</script>";
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
    <link href='css/thongtin.css' rel='stylesheet' type='text/css' />

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../js/Scroll_on_Top.js"></script>
    <script src="js/sp.js"></script>
    <script src="js/users.js"></script>
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
    
.clear{
    clear: both;
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
    <div id="thongtincanhan">
        <div class="content">
            <form name="form1" id="thongtin1" method="post">
                <div class="title">
                    <h3>Thông tin cơ bản</h3>
                    <a href="" class="edit" onClick="edit('thongtin1'); return false;">Sửa</a>
                    <input type="submit" value="Lưu">
                    <input type="reset" value="Hủy" onClick="cancel('thongtin1')">
                    <div class="clear"></div>
                </div>
                <div class="thongtin">
                    <dl>
                        <dd>Tên đăng nhập</dd>
                        <dd><?php echo $username ?></dd>
                        <div class="clear"></div>
                    </dl>
                    <dl>
                        <dd>Họ tên</dd>
                        <dd><input type="text" name="hoten" value="<?php echo $name ?>" readonly disabled></dd>
                        <div class="clear"></div>
                    </dl>
                    <dl>
                        <dd>Ngày sinh</dd>
                        <dd><input type="date" name="ngaysinh" value="<?php echo $birth ?>" readonly disabled></dd>
                        <div class="clear"></div>
                    </dl>
                </div>
            </form>
            <form name="form2" id="thongtin2" method="post">
                <div class="title">
                    <h3>Thông tin liên lạc</h3>
                    <a href="" class="edit" onClick="edit('thongtin2'); return false;">Sửa</a>
                    <input type="submit" value="Lưu">
                    <input type="reset" value="Hủy" onClick="cancel('thongtin2')">
                    <div class="clear"></div>
                </div>
                <div class="thongtin">
                    <dl>
                        <dd>Email</dd>
                        <dd><input type="email" name="email" value="<?php echo $mail ?>" readonly disabled></dd>
                        <div class="clear"></div>
                    </dl>
                    <dl>
                        <dd>Số điện thoại</dd>
                        <dd><input type="tel" name="dienthoai" value="0<?php echo $phone ?>" readonly disabled></dd>
                        <div class="clear"></div>
                    </dl>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function edit(id)
    {
        var a=document.getElementById(id).getElementsByTagName('a');
        var inputs=document.getElementById(id).getElementsByTagName('input');
        var selects=document.getElementById(id).getElementsByTagName('select');
        var textareas=document.getElementById(id).getElementsByTagName('textarea');
        for(i=0;i<a.length;i++){
            a[i].style.display="none";
        }
        inputs[0].style.display="block";
        inputs[1].style.display="block";
        for(i=2;i<inputs.length;i++){
            inputs[i].disabled=false;
            inputs[i].readOnly=false;
        }
        for(i=0;i<selects.length;i++){
            selects[i].disabled=false;
            selects[i].readOnly=false;
        } 
        for(i=0;i<textareas.length;i++){
            textareas[i].disabled=false;
            textareas[i].readOnly=false;
        }
    }
    
    function cancel(id)
    {
        var a=document.getElementById(id).getElementsByTagName('a');
        var inputs=document.getElementById(id).getElementsByTagName('input');
        var selects=document.getElementById(id).getElementsByTagName('select');
        var textareas=document.getElementById(id).getElementsByTagName('textarea');
        for(i=0;i<a.length;i++){
            a[i].style.display="inline-block";
        }
        inputs[0].style.display="none";
        inputs[1].style.display="none";
        for(i=2;i<inputs.length;i++){
            inputs[i].disabled=true;
            inputs[i].readOnly=true;
        }
        for(i=0;i<selects.length;i++){
            selects[i].disabled=true;
            selects[i].readOnly=true;
        } 
        for(i=0;i<textareas.length;i++){
            textareas[i].disabled=true;
            textareas[i].readOnly=true;
        }  
    }
</script>
</body>
</html>