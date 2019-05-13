<?php
    require '../DataProvider.php';
?>

<?php
    if (isset($_POST['masp']) && isset($_POST['giakhuyenmai'])){
        $sql = "INSERT INTO spkhuyenmai(masp, giakhuyenmai) VALUES ('".$_POST['masp']."', ".$_POST['giakhuyenmai'].")";
        DataProvider::executeQuery($sql);
        echo "<script type='text/javascript'>alert('Thêm sản phẩm giảm giá thành công!');</script>";
    }

    if (isset($_POST['suamasp']) && isset($_POST['suagiakhuyenmai'])){
        $sql = "UPDATE spkhuyenmai SET giakhuyenmai=".$_POST['suagiakhuyenmai']." WHERE masp='".$_POST['suamasp']."'";
        DataProvider::executeQuery($sql);
        echo "<script type='text/javascript'>alert('Cập nhật giá khuyến mãi thành công!');</script>";
    }

    if (isset($_POST['del_id'])){
       $sql = "DELETE FROM spkhuyenmai WHERE masp = '" .$_POST['delete_id']. "'";
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
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../js/Scroll_on_Top.js"></script>
    <script src="js/sp.js"></script>
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
<script>
    function signout() {
        window.location = 'index.php';
    }
</script>
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
    <table id="table-sp" cellpadding="10px" cellspacing="0" style="margin-bottom: 50px">
        <caption>
            <span class="table-caption"><h1>Sản phẩm giảm giá</h1></span>
            <div class="them-sp"><button onclick="popup_themsp()"><i class="fas fa-edit"></i><strong> Thêm</strong></button></div>
        </caption>

        <thead>
            <tr style="background-color: #222; color: #f5f5f5; text-align: center;font-size: 20px;font-weight: bold">
                <th>Hình ảnh</th>
                <th>Mã</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Giá khuyến mãi</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT sp.*, km.giakhuyenmai FROM sanpham AS sp JOIN spkhuyenmai AS km ON sp.masp = km.masp WHERE xoa=0";
                $result = DataProvider::executeQuery($sql);
                $color=0;
                while ($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "  <td><img src='../images/sanpham/". $row["hinhanh"] ."' onerror=\"this.src='../images/sanpham/No_image_available.png'\" width='110px'></td>";
                    echo "  <td>" .$row["masp"]. "</td>";
                    echo "  <td>" .$row["tensp"]. "</td>";
                    echo "  <td>" .$row["giatien"]. "</td>";
                    echo "  <td>" .$row["giakhuyenmai"]. "</td>";
                    echo "  <td>";
                    echo "  <button class='sua_sp' onClick=\"edit('".$row["masp"]."','".$row["giatien"]."','".$row["giakhuyenmai"]."')\">Sửa</button>";
                    echo "  <form method='post' onSubmit='return xoavinhvien_sp()' action='thongtinsanpham.php'>";
                    echo "      <input type='hidden' name='del_id' value='" . $row["masp"] . "'>";
                    echo "      <input type='submit' value='Xóa' class='xoa_sp'>";
                    echo "  </form>";
                    echo "  </td>";
                    echo "<tr>";
                }
            ?>
        </tbody>
    </table>

    <div style="clear: both"></div>
    <!-- popup thêm sp -->
    <div class="popup-themsp">
        <div class="popup-themsp__content">
            <div class="popup-themsp__title">THÊM SẢN PHẨM GIẢM GIÁ</div>
            <form method="post" action="" style="margin-top: 100px">
                <div class="popup-themsp-left">
                    <div class="popup-themsp-left__label">Nhập mã sản phẩm</div>
                    <div class="popup-themsp-left__label">Nhập giá khuyến mãi</div>
                </div>
                <div class="popup-themsp-right">
                    <div class="popup-themsp-left__input"><input class="them-thu-tu them-mot-sp" name="masp" type="text" placeholder="Mã sản phẩm"></div>
                    <div class="popup-themsp-left__input"><input class="them-ten them-mot-sp" name="giakhuyenmai" type="number" placeholder="Giá khuyến mãi" min="0" oninput="validity.valid||(value='');"></div>
                </div>
                <input type="submit" class="popup-themsp__btn" value="Thêm">
                <span class="back" onclick="close_popup_themsp()">&times;</span>
            </form>
        </div>
    </div>
    <!-- popup sửa sp -->
     <div class="popup-themsp">
        <div class="popup-themsp__content">
            <div class="popup-themsp__title">SỬA GIÁ KHUYẾN MÃI</div>
            <form method="post" action="" style="margin-top: 100px">
                <div class="popup-themsp-left">
                     <div class="popup-themsp-left__label">Mã sản phẩm</div>
                    <div class="popup-themsp-left__label">Giá khuyến mãi</div>
                </div>
                <div class="popup-themsp-right">
                    <div class="popup-themsp-left__input">
                        <input type="hidden" name="suamasp">
                        <input class="them-stt sua-sp" type="text" name="suamasp" id="suamasp"  readonly disabled style="background-color: transparent; border: none; color: black">
                    </div>
                    <div class="popup-themsp-left__input">
                        <input type="hidden" name="suagia" id="suagia">
                        <input class="them-gia sua-sp" type="number" name="suagiakhuyenmai" id="suagiakhuyenmai" min="0" oninput="validity.valid||(value='');">
                    </div>
                </div>
                <button type="submit" class="popup-themsp__btn" onclick="sua_thong_tin_sp()">Sửa</button>
                <span class="back" onclick="close_popup_themsp()">&times;</span>
            </form>
        </div>
    </div>
</div>
<script>
    function edit(id,gia,giamgia)
    {
        document.getElementsByClassName("popup-themsp")[1].style.display = "block";
        document.getElementById("suamasp").value = id;
        document.getElementsByName("suamasp")[0].value = id;
        document.getElementById("suagia").value = gia;
        document.getElementById("suagiakhuyenmai").value = giamgia;
    }
</script>
</body>
</html>