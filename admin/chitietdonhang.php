<?php
    include 'accesssale.php';
    require '../DataProvider.php';
    require '../ProductsPerPage.inc';
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
        <caption><span class="table-caption"><h1>MÃ HÓA ĐƠN: <?php if(isset($_GET['mahd'])) echo $_GET['mahd'] ?></h1></span></caption>
        <thead>
            <tr style="background-color: #222; color: #f5f5f5; text-align: center;font-size: 20px;font-weight: bold">
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá tiền</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(isset($_GET['mahd']))
                {
                    $sql = "SELECT cthd.*, sp.tensp FROM chitiethoadon AS cthd JOIN sanpham AS sp ON cthd.masp = sp.masp WHERE mahd='".$_GET['mahd']."'";
                    $sql = $sql . " LIMIT $offset, $productsPerPage";
                    $result = DataProvider::executeQuery($sql);
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "  <td>" .$row["masp"]. "</td>";
                        echo "  <td>" .$row["tensp"]. "</td>";
                        echo "  <td>" .$row["giatien"]. "</td>";
                        echo "  <td>" .$row["soluong"]. "</td>";
                        echo "  <td>" .$row["thanhtien"]. "</td>";
                        echo "<tr>";
                    }
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
                <div class="popup-dh__content">
                    <div class="popup-dh__title">Chi Tiết Đơn Hàng</div>
                    <div class="popup-dh-left">
                        <div class="popup-dh-left__label">STT</div>
                        <div class="popup-dh-left__label">Khách hàng</div>
                        <div class="popup-dh-left__label">Thời điểm đặt hàng</div>
                        <div class="popup-dh-left__label">Tổng tiền</div>
                        <div class="popup-dh-left__label">Tình trạng</div>
                        <div class="popup-dh-left__label">Món hàng</div>
                    </div>
                    <div class="popup-dh-right">
                        <div class="popup-dh-left__input"></div>
                        <div class="popup-dh-left__input"></div>
                        <div class="popup-dh-left__input"></div>
                        <div class="popup-dh-left__input"></div>
                        <div class="popup-dh-left__input"></div>
                        <div class="popup-dh-left__input"></div>
                    </div>
                    <span class="back" onclick="close_popup_dh_xem()">&times;</span>
                </div>
    </div>	

    <div class="popup-dh">
        <div class="popup-dh__content" style="width: 500px;height: 500px">
            <div class="popup-dh__title">Sửa Đơn Hàng</div>
            <div class="popup-dh-left">
                <div class="popup-dh-left__label">STT</div>
                <div class="popup-dh-left__label">Khách Hàng</div>
                <div class="popup-dh-left__label">Thời Điểm Mua Hàng</div>
                <div class="popup-dh-left__label">Tổng Tiền</div>
                <div class="popup-dh-left__label">Tình Trạng</div>
            </div>
            <div class="popup-dh-right">
                <div class="popup-dh-left__input"><input class="sua-dh" type="text" readonly=""></div>
                <div class="popup-dh-left__input"><input class="sua-dh" type="text" readonly=""></div>
                <div class="popup-dh-left__input"><input class="sua-dh" type="text" readonly=""></div>
                <div class="popup-dh-left__input"><input class="sua-dh" type="text" readonly=""></div>	
                <div class="popup-dh-left__input">
                    <select class="sua-dh">
                        <option>Đã hủy</option>
                        <option>Đã hoàn tất</option>
                        <option>Thất bại</option>
                        <option>Đang tiến hành</option>
                        <option>Đã trả lại hàng/đã hoàn tiền</option>
                    </select>
                </div>
            </div>
            <button class="popup-dh__btn" onclick="sua_thong_tin_don_hang()">Sửa</button>
            <span class="back" onclick="close_popup_dh_sua()">&times;</span>
        </div>
    </div>
</div>
</body>
</html>