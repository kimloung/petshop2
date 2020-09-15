<?php
    include 'accessadmin.php';
    require '../DataProvider.php';
?>

<?php
	if (empty($_GET['tendangnhap']))
		echo "<script language='javascript'>window.location='thongtintaikhoan.php';</script>";
?>

<?php
    if (isset($_POST['hoten']) && isset($_POST['ngaysinh'])){
        $sql = "UPDATE taikhoan SET hoten='".$_POST['hoten']."', ngaysinh='".$_POST['ngaysinh']."' WHERE tendangnhap = '" .$_GET['tendangnhap']. "'";
        DataProvider::executeQuery($sql);
        echo "<script type='text/javascript'>alert('Cập nhật thông tin cơ bản thành công!');</script>";
    }

    if (isset($_POST['vaitro'])){
        $sql = "UPDATE taikhoan SET mavt='".$_POST['vaitro']."' WHERE tendangnhap = '" .$_GET['tendangnhap']. "'";
        DataProvider::executeQuery($sql);
        echo "<script type='text/javascript'>alert('Cập nhật vai trò thành công!');</script>";
    }

    if (isset($_POST['email']) && isset($_POST['dienthoai'])){
        $sql = "UPDATE taikhoan SET email='".$_POST['email']."', dienthoai='".$_POST['dienthoai']."' WHERE tendangnhap = '" .$_GET['tendangnhap']. "'";
        DataProvider::executeQuery($sql);
        echo "<script type='text/javascript'>alert('Cập nhật thông tin liên lạc thành công!');</script>";
    }
?>

<?php
    $sql = "SELECT * FROM taikhoan WHERE tendangnhap='".$_GET['tendangnhap']."'";
    $result = DataProvider::executeQuery($sql);
    while ($row = mysqli_fetch_array($result))
    {
        $tendangnhap = $row["tendangnhap"];
        $hoten = $row["hoten"];
        $vaitro = $row["mavt"];
        $ngaysinh = $row["ngaysinh"];
        $email = $row["email"];
        $dienthoai = $row["dienthoai"];
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
    <link href='css/thongtintaikhoan.css' rel='stylesheet' type='text/css' />
    
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
                        <dd><?php echo $tendangnhap ?></dd>
                        <div class="clear"></div>
                    </dl>
                    <dl>
                        <dd>Họ tên</dd>
                        <dd><input type="text" name="hoten" value="<?php echo $hoten ?>" readonly disabled></dd>
                        <div class="clear"></div>
                    </dl>
                    <dl>
                        <dd>Ngày sinh</dd>
                        <dd><input type="date" name="ngaysinh" value="<?php echo $ngaysinh ?>" readonly disabled></dd>
                        <div class="clear"></div>
                    </dl>
                </div>
            </form>
            <form name="form2" id="thongtin2" method="post">
                <div class="title">
                    <h3>Quyền hạn</h3>
                    <a href="" class="edit" onClick="edit('thongtin2'); return false;">Sửa</a>
                    <input type="submit" value="Lưu">
                    <input type="reset" value="Hủy" onClick="cancel('thongtin2')">
                    <div class="clear"></div>
                </div>
                <div class="thongtin">
                    <dl>
                        <dd>Vai trò</dd>
                        <dd>
                            <select name="vaitro" disabled>
                                <?php
                                    if($vaitro == "customer")
                                        echo "<option value='customer' selected>khách hàng</option>";
                                    else
                                        echo "<option value='customer'>khách hàng</option>";
                                    if($vaitro == "sale")
                                        echo "<option value='sale' selected>bán hàng</option>";
                                    else
                                        echo "<option value='sale'>bán hàng</option>";
                                    if($vaitro == "admin")
                                        echo "<option value='admin' selected>quản trị viên</option>";
                                    else
                                        echo "<option value='admin'>quản trị viên</option>";
                                ?>
                            </select>
                        </dd>
                        <div class="clear"></div>
                    </dl>
                </div>
            </form>
            <form name="form3" id="thongtin3" method="post">
                <div class="title">
                    <h3>Thông tin liên lạc</h3>
                    <a href="" class="edit" onClick="edit('thongtin3'); return false;">Sửa</a>
                    <input type="submit" value="Lưu">
                    <input type="reset" value="Hủy" onClick="cancel('thongtin3')">
                    <div class="clear"></div>
                </div>
                <div class="thongtin">
                    <dl>
                        <dd>Email</dd>
                        <dd><input type="email" name="email" value="<?php echo $email ?>" readonly disabled></dd>
                        <div class="clear"></div>
                    </dl>
                    <dl>
                        <dd>Số điện thoại</dd>
                        <dd><input type="tel" name="dienthoai" value="0<?php echo $dienthoai ?>" readonly disabled></dd>
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
    }
    
    function cancel(id)
    {
        var a=document.getElementById(id).getElementsByTagName('a');
        var inputs=document.getElementById(id).getElementsByTagName('input');
        var selects=document.getElementById(id).getElementsByTagName('select');
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
    }
</script>
</body>
</html>