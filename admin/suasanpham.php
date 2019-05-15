<?php
    include 'accesssale.php';
    require '../DataProvider.php';
?>

<?php
    if (isset($_FILES['hinhanh']))
    {
        $errors= array();
        $file_name = $_FILES['hinhanh']['name'];
        $file_size =$_FILES['hinhanh']['size'];
        $file_tmp =$_FILES['hinhanh']['tmp_name'];
        $file_type=$_FILES['hinhanh']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['hinhanh']['name'])));

        $expensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$expensions)=== false){
            $errors[]="Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
        }

        if($file_size > 5242880){
            $errors[]='Kích cỡ file nên dưới 5 MB';
        }

        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"../images/sanpham/".$file_name);
            $sql = "UPDATE sanpham SET hinhanh='".$_FILES['hinhanh']['name']."' WHERE masp = '".$_GET['masp']."'";
            DataProvider::executeQuery($sql);
            echo "<script type='text/javascript'>alert('Cập nhật hình ảnh thành công!');</script>";
        }
        else{
            print_r($errors);
        }
        
    }

    if (isset($_POST['masp']) && isset($_POST['tensp']) && isset($_POST['giatien']) && isset($_POST['mota'])){
        $sql = "UPDATE sanpham SET masp='".$_POST['masp']."', tensp='".$_POST['tensp']."', giatien=".$_POST['giatien'].", soluong=".$_POST['soluong'].", mota='".$_POST['mota']."' WHERE masp = '".$_GET['masp']."'";
        DataProvider::executeQuery($sql);
        echo "<script type='text/javascript'>alert('Cập nhật chi tiết sản phẩm thành công!');</script>";
    }
?>

<?php
    if(isset($_GET['masp']))
    {
        $sql3="SELECT * FROM spkhuyenmai WHERE masp = '" .$_GET['masp']. "'";
        $ktphanloaisp=DataProvider::executeQuery($sql3);

        if(mysqli_num_rows($ktphanloaisp) == 0)
        {
            $sql = "SELECT sp.*, GROUP_CONCAT(DISTINCT(dv.tendv)) AS tendv, GROUP_CONCAT(DISTINCT(tl.theloai)) AS theloai FROM sanpham as sp JOIN sp_dv_tl as sdt ON sp.masp = sdt.masp JOIN dongvat AS dv ON dv.madv = sdt.madv JOIN theloai AS tl ON tl.matl = sdt.matl WHERE sp.masp = '".$_GET['masp']."' GROUP BY sp.masp";
            $result = DataProvider::executeQuery($sql);
            while ($row = mysqli_fetch_array($result))
            {
                $masp = $row['masp'];
                $tensp = $row['tensp'];
                $hinhanh = $row['hinhanh'];
                $giatien = $row['giatien'];
                $soluong = $row['soluong'];
                $mota = $row["mota"];
                $tendv = $row['tendv'];
                $theloai = $row['theloai'];
            }
        }
        /*else
        {
            $sql = "SELECT * FROM sanpham";
            $result = DataProvider::executeQuery($sql);
            while ($row = mysqli_fetch_array($result))
            {
                $masp = $row['masp'];
                $tensp = $row['tensp'];
                $hinhanh = $row['hinhanh'];
                $giatien = $row['giatien'];
                $soluong = $row['soluong'];
                $mota = $row["mota"];
                $tendv = "";
                $theloai = "";
            }
        }*/
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
    <link href='css/thongtinsanpham.css' rel='stylesheet' type='text/css' />
    
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
            <form name="form1" id="thongtin1" method="post" style="float: left; width: 50%">
                <div class="title">
                    <h3>Phân loại</h3>
                    <a href="phanloaisanpham.php?masp=<?php echo $_GET['masp'] ?>" class="edit">Sửa</a>
                    <input type="submit" value="Lưu">
                    <input type="reset" value="Hủy" onClick="cancel('thongtin1')">
                    <div class="clear"></div>
                </div>
                <div class="thongtin">
                    <dl>
                        <dd>Thú cưng</dd>
                        <dd><?php echo $tendv ?></dd>
                        <div class="clear"></div>
                    </dl>
                    <dl>
                        <dd>Danh mục</dd>
                        <dd><?php echo $theloai ?></dd>
                        <div class="clear"></div>
                    </dl>
                </div>
            </form>
            <form method="post" enctype="multipart/form-data" style="float: left; width: 40%; margin-left: 5%">
                <div class="hinhanh">
                    <img src="../images/sanpham/<?php echo $hinhanh ?>" onerror="this.src='../images/sanpham/No_image_available.png'" >
                    <div class="icon" onClick="chonhinh();"><i class="fas fa-pen"></i></div>
                    <!-- popup sửa sp -->
                     <div class="popup-themsp">
                        <div class="popup-themsp__content">
                            <div class="popup-themsp__title">CHỌN HÌNH</div>
                                <div class="popup-themsp-middle"><input class="them-hinh sua-sp" name="hinhanh" type="file" accept=".jpeg,.jpg,.png" style="margin-left: 50px"></div>
                            <button type="submit" class="popup-themsp__btn" style="left: 10px">Lưu</button>
                            <span class="back" onclick="close_popup_themsp()">&times;</span>
                        </div>
                    </div>
                </div>
            </form>
            <div class="clear"></div>
            <form name="form2" id="thongtin2" method="post">
                <div class="title">
                    <h3>Chi tiết sản phẩm</h3>
                    <a href="" class="edit" onClick="edit('thongtin2'); return false;">Sửa</a>
                    <input type="submit" value="Lưu">
                    <input type="reset" value="Hủy" onClick="cancel('thongtin2')">
                    <div class="clear"></div>
                </div>
                <div class="thongtin">
                    <dl>
                        <dd>Mã sản phẩm</dd>
                        <dd><input type="text" name="masp" value="<?php echo $masp ?>" readonly disabled></dd>
                        <div class="clear"></div>
                    </dl>
                    <dl>
                        <dd>Tên sản phẩm</dd>
                        <dd><input type="text" name="tensp" value="<?php echo $tensp ?>" readonly disabled></dd>
                        <div class="clear"></div>
                    </dl>
                    <dl>
                        <dd>Giá tiền</dd>
                        <dd><input type="number" name="giatien" value="<?php echo $giatien ?>"  min="0" oninput="validity.valid||(value='');" readonly disabled></dd>
                        <div class="clear"></div>
                    </dl>
                    <dl>
                        <dd>Tồn kho</dd>
                        <dd><input type="number" name="soluong" value="<?php echo $soluong ?>"  min="0" oninput="validity.valid||(value='');" readonly disabled></dd>
                        <div class="clear"></div>
                    </dl>
                    <dl>
                        <dd>Mô tả</dd>
                        <dd><textarea name="mota" cols="60" rows="10" readonly disabled style="width: 500px"><?php echo $mota ?></textarea></dd>
                        <div class="clear"></div>
                    </dl>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function chonhinh()
    {
        document.getElementsByClassName('popup-themsp')[0].style.display = "block";
    }
    
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
        for(i=3;i<inputs.length;i++){
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