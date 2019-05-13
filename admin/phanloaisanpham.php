<?php
    require '../DataProvider.php';
    require '../ProductsPerPage.inc';
?>

<?php
    if (isset($_POST['masp']) && isset($_POST['madv']) && isset($_POST['matl'])){
        $sql = "INSERT INTO sp_dv_tl(masp, madv, matl) VALUES ('".$_POST['masp']."', '".$_POST['madv']."', '".$_POST['matl']."')";
        DataProvider::executeQuery($sql);
        echo "<script type='text/javascript'>alert('Thêm phân loại sản phẩm thành công!');</script>";
    }

    if (isset($_POST['suamadv']) && isset($_POST['suamatl'])){
       $sql = "UPDATE sp_dv_tl SET madv='".$_POST['suamadv']."', matl='".$_POST['suamatl']."' WHERE masp='".$_POST['suamasp']."' AND madv='".$_POST['madvcu']."' AND matl='".$_POST['matlcu']."'";
       DataProvider::executeQuery($sql);
        echo "<script type='text/javascript'>alert('Cập nhật phân loại sản phẩm thành công!');</script>";
    }

    if (isset($_POST['xoamasp']) && isset($_POST['xoamadv']) && isset($_POST['xoamatl'])){
       $sql = "DELETE FROM sp_dv_tl WHERE masp='".$_POST['xoamasp']."' AND madv='".$_POST['xoamadv']."' AND  matl='".$_POST['xoamatl']."'";
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
    <table id="table-sp" cellpadding="10px" cellspacing="0">
        <caption>
            <span class="table-caption"><h1>Phân loại sản phẩm</h1></span>
            <div class="them-sp"><button onclick="popup_themsp()"><i class="fas fa-edit"></i><strong> Thêm</strong></button></div>
        </caption>

        <thead>
            <tr style="background-color: #222; color: #f5f5f5; text-align: center;font-size: 20px;font-weight: bold">
                <th>Hình ảnh</th>
                <th>Mã</th>
                <th>Tên</th>
                <th>Thú cưng</th>
                <th>Thể loại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT sp.tensp, sp.hinhanh, sdt.*, dv.tendv, tl.theloai FROM sanpham AS sp JOIN sp_dv_tl AS sdt ON sp.masp = sdt.masp JOIN dongvat AS dv ON sdt.madv = dv.madv JOIN theloai AS tl ON sdt.matl = tl.matl";
                if(isset($_GET['masp']))
                {
                    $sql = $sql . " WHERE sp.masp ='" .$_GET['masp']. "'";
                }
                $sql = $sql . " LIMIT $offset, $productsPerPage";
                $result = DataProvider::executeQuery($sql);
                $color=0;
                while ($row = mysqli_fetch_array($result))
                {
                    echo "<tr id='".$row["masp"]."'>";
                    echo "  <td><img src='../images/sanpham/". $row["hinhanh"] ."' width='110px'></td>";
                    echo "  <td>" .$row["masp"]. "</td>";
                    echo "  <td>" .$row["tensp"]. "</td>";
                    echo "  <td>" .$row["tendv"]. "</td>";
                    echo "  <td>" .$row["theloai"]. "</td>";
                    echo "  <td>";
                    echo "  <button class='sua_sp' onClick=\"edit('".$row["masp"]."','".$row["madv"]."','".$row["matl"]."')\">Sửa</button>";
                    echo "  <form method='post' onSubmit='return xoavinhvien_sp()' action=''>";
                    echo "      <input type='hidden' name='xoamasp' value='".$row["masp"]."'>";
                    echo "      <input type='hidden' name='xoamadv' value='".$row["madv"]."'>";
                    echo "      <input type='hidden' name='xoamatl' value='".$row["matl"]."'>";
                    echo "      <input type='submit' value='Xóa' class='xoa_sp'>";
                    echo "  </form>";
                    echo "  </td>";
                    echo "<tr>";
                }
            ?>
        </tbody>
    </table>

    <?php
        $sql   = "SELECT COUNT(*) AS numproducts FROM sp_dv_tl";
        if(isset($_GET['masp']))
        {
            $sql = $sql . " WHERE masp ='" .$_GET['masp']. "'";
        }
        include 'pagination.php';
    ?>

    <div style="clear: both"></div>
    <!-- popup thêm sp -->
    <div class="popup-themsp">
        <div class="popup-themsp__content">
            <div class="popup-themsp__title">THÊM PHÂN LOẠI SẢN PHẨM</div>
            <form method="post" action="">
                <div class="popup-themsp-left">
                    <div class="popup-themsp-left__label">Nhập mã sản phẩm</div>
                    <div class="popup-themsp-left__label">Chọn thú cưng</div>
                    <div class="popup-themsp-left__label">Chọn danh mục</div>
                </div>
                <div class="popup-themsp-right">
                    <div class="popup-themsp-left__input"><input class="them-thu-tu them-mot-sp" name="masp" type="text" placeholder="Mã sản phẩm"></div>
                    <div class="popup-themsp-left__input">
                        <select name="madv">
                            <option value="dog">Chó</option>
                            <option value="cat">Mèo</option>
                            <option value="bird">Chim</option>
                            <option value="fish">Cá</option>
                            <option value="hamster">Hamster</option>
                        </select>
                    </div>
                    <div class="popup-themsp-left__input">
                        <select name="matl">
                            <option value="food">Thức ăn</option>
                            <option value="stuff">Vật dụng</option>
                            <option value="bed">Chuồng, giường</option>
                        </select>
                    </div>
                </div>
                <input type="submit" class="popup-themsp__btn" value="Thêm">
                <span class="back" onclick="close_popup_themsp()">&times;</span>
            </form>
        </div>
    </div>
    <!-- popup sửa sp -->
     <div class="popup-themsp">
        <div class="popup-themsp__content">
            <form method="post" action="">
                <input type="hidden" id="madvcu" name="madvcu">
                <input type="hidden" id="matlcu" name="matlcu">
                <div class="popup-themsp__title">SỬA PHÂN LOẠI SẢN PHẨM</div>
                <div class="popup-themsp-left">
                     <div class="popup-themsp-left__label">Mã sản phẩm</div>
                    <div class="popup-themsp-left__label">Chọn thú cưng</div>
                    <div class="popup-themsp-left__label">Chọn danh mục</div>
                </div>
                <div class="popup-themsp-right">
                    <div class="popup-themsp-left__input">
                        <input type="hidden" name="suamasp">
                        <input class="them-stt sua-sp" type="text" id="suamasp" name="suamasp" readonly disabled style="background-color: transparent; border: none; color: black">
                    </div>
                    <div class="popup-themsp-left__input">
                        <select name="suamadv" id="suamadv"></select>
                    </div>
                    <div class="popup-themsp-left__input">
                        <select name="suamatl" id="suamatl"></select>
                    </div>
                </div>
                <button type="submit" class="popup-themsp__btn">Sửa</button>
                <span class="back" onclick="close_popup_themsp()">&times;</span>
            </form>
        </div>
    </div>
</div>
<script>
    function edit(id,dv,tl)
    {
        document.getElementsByClassName("popup-themsp")[1].style.display = "block";
        document.getElementById("madvcu").value = dv;
        document.getElementById("matlcu").value = tl;
        document.getElementById("suamasp").value = id;
        document.getElementsByName("suamasp")[0].value = id;
        var madv = "";
        var matl = "";
        if(dv == "dog")
            madv = "<option value='dog' selected>Chó</option>";
        else
            madv = "<option value='dog'>Chó</option>";
        if(dv == "cat")
            madv += "<option value='cat' selected>Mèo</option>";
        else
            madv += "<option value='cat'>Mèo</option>";
        if(dv == "bird")
            madv += "<option value='bird' selected>Chim</option>";
        else
            madv += "<option value='bird'>Chim</option>";
        if(dv == "fish")
            madv += "<option value='fish' selected>Cá</option>";
        else
            madv += "<option value='fish'>Cá</option>";
        if(dv == "hamster")
            madv += "<option value='hamster' selected>Hamster</option>";
        else
            madv += "<option value='hamster'>Hamster</option>";
        document.getElementById("suamadv").innerHTML = madv;
        if(tl == "food")
            matl = "<option value='food' selected>Thức ăn</option>";
        else
            matl = "<option value='food'>Thức ăn</option>";
        if(tl == "stuff")
            matl += "<option value='stuff' selected>Vật dụng</option>";
        else
            matl += "<option value='stuff'>Vật dụng</option>";
        if(tl == "bed")
            matl += "<option value='bed' selected>Chuồng, giường</option>";
        else
            matl += "<option value='bed'>Chuồng, giường</option>";
        document.getElementById("suamatl").innerHTML = matl;
    }
</script>
</body>
</html>