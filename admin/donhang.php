<?php
    include 'accesssale.php';
    require '../DataProvider.php';
    require '../ProductsPerPage.inc';
?>

<?php
    if(isset($_POST['suatinhtrang']))
    {
        $sql = "UPDATE hoadon SET trangthai='".$_POST['suatinhtrang']."' WHERE mahd = '" .$_POST['suamahd']. "'";
        DataProvider::executeQuery($sql);
        echo "<script language='javascript'> ;alert('Cập nhật tình trạng hóa đơn thành công!!!');</script>";
    }

    if (isset($_POST['del_id'])){
        
        $sql1="SELECT * FROM chitiethoadon WHERE mahd = '" .$_POST['del_id']. "'";
        $ktspmoi=DataProvider::executeQuery($sql1);
        if(mysqli_num_rows($ktspmoi) >= 1)
        {
            $sql = "DELETE FROM chitiethoadon WHERE mahd = '" .$_POST['del_id']. "'";
            DataProvider::executeQuery($sql);
        }
       $sql = "DELETE FROM hoadon WHERE mahd = '" .$_POST['del_id']. "'";
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
    <link href='css/donhang.css' rel='stylesheet' type='text/css' />
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../js/Scroll_on_Top.js"></script>
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
    <table id="table-dh" cellpadding="10px" cellspacing="0">
        <caption><span class="table-caption"><h1>Quản lý đơn hàng</h1></span></caption>
        <thead>
            <tr style="background-color: #222; color: #f5f5f5; text-align: center;font-size: 20px;font-weight: bold">
                <th>Mã hóa đơn</th>
                <th>Tên đăng nhập</th>
                <th>Thời gian đặt hàng</th>
                <th>Tổng tiền</th>
                <th>Tình trạng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM hoadon";
                $sql = $sql . " LIMIT $offset, $productsPerPage";
                $result = DataProvider::executeQuery($sql);
                while ($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "  <td>" .$row["mahd"]. "</td>";
                    echo "  <td>" .$row["tendangnhap"]. "</td>";
                    echo "  <td>" .$row["ngaydathang"]. "</td>";
                    echo "  <td>" .$row["tongtien"]. "</td>";
                    echo "  <td>" .$row["trangthai"]. "</td>";
                    echo "  <td>";
                    echo "  <button class='xem_dh' value='".$row["mahd"]."' onClick='goto(this.value)'>Chi tiết</button>";
                    echo "  <button class='sua_dh' value='".$row["mahd"]."' onClick=\"edit('".$row["mahd"]."')\">Sửa</button>";
                    echo "  <form method='post' onSubmit='return xoa_hd()' action=''>";
                    echo "      <input type='hidden' name='del_id' value='" . $row["mahd"] . "'>";
                    echo "      <input type='submit' value='Xóa' class='xoa_dh'>";
                    echo "  </form>";
                    echo "  </td>";
                    echo "<tr>";
                }
            ?>
        </tbody>
    </table>
    
    <?php
        $sql   = "SELECT COUNT(*) AS numproducts FROM hoadon";
        include 'pagination.php';
    ?>

    <div style="clear:both"></div>

    <div class="popup-dh">
        <div class="popup-dh__content" style="width: 500px;height: 500px">
            <div class="popup-dh__title">SỬA ĐƠN HÀNG</div>
            <form action="" method="post" style="margin-top: 100px;">
            <div class="popup-dh-left">
                <div class="popup-dh-left__label">Mã đơn hàng</div>
                <div class="popup-dh-left__label">Tình Trạng</div>
            </div>
            <div class="popup-dh-right">
                <div class="popup-dh-left__input">
                    <input type="hidden" name="suamahd">
                    <input class="sua-dh" type="text" name="suamahd" id="suamahd"  readonly disabled style="background-color: transparent; border: none; color: black">
                </div>
                <div class="popup-dh-left__input">
                    <select class="sua-dh" name="suatinhtrang">
                        <option value="chưa xử lý">Chưa xử lý</option>
                        <option value="đã xử lý">Đã xửa lý</option>
                    </select>
                </div>
            </div>
            <button class="popup-dh__btn" onclick="sua_thong_tin_don_hang()">Sửa</button>
            <span class="back" onclick="close_popup_dh_sua()">&times;</span>
            </form>
        </div>
    </div>
</div>
<script>
    function edit(id) {
        document.getElementsByClassName('popup-dh')[0].style.display = 'block';
        document.getElementById("suamahd").value = id;
        document.getElementsByClassName("suamahd")[0].value = id;
    }
    
    function goto(mahd)
    {
        location.href = 'chitietdonhang.php?mahd='+mahd;
    }
</script>
</body>
</html>