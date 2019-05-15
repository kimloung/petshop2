<?php
    include 'accesssale.php';
    require '../DataProvider.php';
    require '../ProductsPerPage.inc';
?>

<?php
    if (isset($_POST['masp']) && isset($_POST['tensp']) && isset($_POST['giatien']) && isset($_POST['mota'])){
        $sql1="SELECT masp FROM sanpham WHERE masp='".$_POST['masp']."'";
		$ktusername=DataProvider::executeQuery($sql1);
        
        if(mysqli_num_rows($ktusername) >0)
		{
			echo "<script language='javascript'> ;alert('Mã sản phẩm đã tồn tại!!! Vui lòng chọn mã khác.'); history.go(-1);</script>";
		}
        else
        {
            $errors= array();
            $file_name = $_FILES['hinhanh']['name'];
            $file_size =$_FILES['hinhanh']['size'];
            $file_tmp =$_FILES['hinhanh']['tmp_name'];
            $file_type=$_FILES['hinhanh']['type'];
            $file_tail = explode('.',$_FILES['hinhanh']['name']);
            $file_ext=strtolower(end($file_tail));

            $expensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$expensions)=== false){
                $errors[]="Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
                echo "<script language='javascript'> ;alert('Chỉ chấp nhận file JPEG hoặc JPG hoặc PNG!!!'); history.go(-1);</script>";
            }

            if($file_size > 5242880){
                $errors[]='Kích cỡ file nên dưới 5 MB';
                echo "<script language='javascript'> ;alert('Kích cỡ file nên dưới 5 MB!!!'); history.go(-1);</script>";
            }

            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"../images/sanpham/".$file_name);
            }
            $sql2="SELECT * FROM spmoi";
            $ktspmoi=DataProvider::executeQuery($sql2);

            if(mysqli_num_rows($ktspmoi) > 8)
            {
                $sql = "DELETE FROM spmoi LIMIT 1";
                DataProvider::executeQuery($sql);
            }
            $sql = "INSERT INTO sanpham(masp, tensp, hinhanh, soluong, giatien, mota, xoa) VALUES ('".$_POST['masp']."', '".$_POST['tensp']."', '".$file_name."', ".$_POST['soluong'].", ".$_POST['giatien'].", '".$_POST['mota']."', 0)";
            DataProvider::executeQuery($sql);
            $sql = "INSERT INTO sp_dv_tl(masp, madv, matl) VALUES ('".$_POST['masp']."', '".$_POST['thucung']."', '".$_POST['danhmuc']."')";
            DataProvider::executeQuery($sql);
            $sql = "INSERT INTO spmoi(masp) VALUES('".$_POST['masp']."')";
            DataProvider::executeQuery($sql);
        }
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
    <link href='css/sanpham.css' rel='stylesheet' type='text/css' />
    <?php
        if(isset($_GET['site'])){
            if($_GET['site'] == "users")
                echo "<link href='css/users.css' rel='stylesheet' type='text/css' />";
            if($_GET['site'] == "sanpham")
                echo "";
            if($_GET['site'] == "donhang")
                echo "<link href='css/donhang.css' rel='stylesheet' type='text/css' />";
        }
    ?>
    
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
    <table id="table-sp" cellpadding="10px" cellspacing="0">
        <caption>
            <span class="table-caption"><h1>Thông tin sản phẩm</h1></span>
            <div class="them-sp"><button onclick="popup_themsp()"><i class="fas fa-edit"></i><strong> Thêm</strong></button></div>
        </caption>

        <thead>
            <tr style="background-color: #222; color: #f5f5f5; text-align: center;font-size: 20px;font-weight: bold">
                <th>Hình ảnh</th>
                <th>Mã</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Tồn kho</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM sanpham WHERE xoa=0";
                if(isset($_GET['sapxep']))
                    $sql = $sql . " ORDER BY " .$_GET['sapxep'];
                $sql = $sql . " LIMIT $offset, $productsPerPage";
                $result = DataProvider::executeQuery($sql);
                while ($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "  <td><img src='../images/sanpham/". $row["hinhanh"] ."' onerror=\"this.src='../images/sanpham/No_image_available.png'\" width='110px'></td>";
                    echo "  <td>" .$row["masp"]. "</td>";
                    echo "  <td>" .$row["tensp"]. "</td>";
                    echo "  <td>" .$row["giatien"]. "</td>";
                    echo "  <td>" .$row["soluong"]. "</td>";
                    echo "  <td>" .$row["mota"]. "</td>";
                    echo "  <td>";
                    echo "  <button class='sua_sp' value='".$row["masp"]."' onClick='goto(this.value)'>Sửa</button>";
                    echo "  <form method='post' onSubmit='return xoa_sp()' action=''>";
                    echo "      <input type='hidden' name='del_id' value='" . $row["masp"] . "'>";
                    echo "      <input type='submit' value='Xóa' class='xoa_sp'>";
                    echo "  </form>";
                    echo "  </td>";
                    echo "<tr>";
                }
            ?>
        </tbody>
    </table>

    <?php
        $sql   = "SELECT COUNT(*) AS numproducts FROM sanpham WHERE xoa=0";
        include 'pagination.php';
    ?>

    <div style="clear: both"></div>
    <!-- popup thêm sp -->
    <div class="popup-themsp">
        <div class="popup-themsp__content">
            <div class="popup-themsp__title">Thêm Sản Phẩm</div>
            <form id="themsp" method="post" enctype="multipart/form-data" action="">
                <div class="popup-themsp-left">
                    <div class="popup-themsp-left__label">Nhập mã sản phẩm</div>
                    <div class="popup-themsp-left__label">Nhập tên sản phẩm</div>
                    <div class="popup-themsp-left__label">Nhập giá</div>
                    <div class="popup-themsp-left__label">Nhập số lượng</div>
                    <div class="popup-themsp-left__label">Chọn thú cưng</div>
                    <div class="popup-themsp-left__label">Chọn danh mục</div>
                    <div class="popup-themsp-left__label">Chọn hình</div>
                    <div class="popup-themsp-left__label">Nhập mô tả</div>
                </div>
                <div class="popup-themsp-right">
                    <div class="popup-themsp-left__input"><input class="them-thu-tu them-mot-sp" name="masp" type="text" placeholder="Mã sản phẩm"></div>
                    <div class="popup-themsp-left__input"><input class="them-ten them-mot-sp" name="tensp" type="text" placeholder="Tên sản phẩm"></div>
                    <div class="popup-themsp-left__input"><input class="them-gia them-mot-sp" name="giatien" type="number" placeholder="Giá" min="0" oninput="validity.valid||(value='');"></div>
                    <div class="popup-themsp-left__input"><input class="them-gia them-mot-sp" name="soluong" type="number" placeholder="Số lượng" min="0" oninput="validity.valid||(value='');"></div>
                    <div class="popup-themsp-left__input">
                        <select name="thucung">
                            <option value="dog">Chó</option>
                            <option value="cat">Mèo</option>
                            <option value="bird">Chim</option>
                            <option value="fish">Cá</option>
                            <option value="hamster">Hamster</option>
                        </select>
                    </div>
                    <div class="popup-themsp-left__input">
                        <select name="danhmuc">
                            <option value="food">Thức ăn</option>
                            <option value="stuff">Vật dụng</option>
                            <option value="bed">Giường, chuồng</option>
                        </select>
                    </div>
                    <div class="popup-themsp-left__input"><input class="them-hinh them-mot-sp" name="hinhanh" type="file" accept=".jpeg,.jpg,.png" style="width: 200px; overflow: hidden"></div>
                    <div class="popup-themsp-left__input"><textarea class="them-mot-sp" name="mota" cols="30" rows="5" form="themsp"></textarea></div>
                </div>
                <div class="clear"></div>
                <input type="submit" class="popup-themsp__btn" value="Thêm">
                <span class="back" onclick="close_popup_themsp()">&times;</span>
            </form>
        </div>
    </div>
</div>
<script>
    function goto(masp)
    {
        location.href = 'suasanpham.php?masp='+masp;
    }
</script>
</body>
</html>