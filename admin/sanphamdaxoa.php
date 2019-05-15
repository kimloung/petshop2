<?php
    include 'accesssale.php';
    require '../DataProvider.php';
    require '../ProductsPerPage.inc';
?>

<?php
    if (isset($_POST['restore_id'])){
       $sql = "UPDATE sanpham SET xoa=0 WHERE masp = '" .$_POST['restore_id']. "'";
       DataProvider::executeQuery($sql);
    }

    if (isset($_POST['delete_id'])){
        
        $sql1="SELECT * FROM spmoi WHERE masp = '" .$_POST['delete_id']. "'";
        $ktspmoi=DataProvider::executeQuery($sql1);
        if(mysqli_num_rows($ktspmoi) >= 1)
        {
            $sql = "DELETE FROM spmoi WHERE masp = '" .$_POST['delete_id']. "'";
            DataProvider::executeQuery($sql);
        }
        $sql2="SELECT * FROM spkhuyenmai WHERE masp = '" .$_POST['delete_id']. "'";
        $ktspkhuyenmai=DataProvider::executeQuery($sql2);

        if(mysqli_num_rows($ktspkhuyenmai) >= 1)
        {
            $sql = "DELETE FROM spkhuyenmai WHERE masp = '" .$_POST['delete_id']. "'";
            DataProvider::executeQuery($sql);
        }
        $sql3="SELECT * FROM spkhuyenmai WHERE masp = '" .$_POST['delete_id']. "'";
        $ktphanloaisp=DataProvider::executeQuery($sql3);

        if(mysqli_num_rows($ktphanloaisp) >= 1)
        {
            $sql = "DELETE FROM sp_dv_tl WHERE masp = '" .$_POST['delete_id']. "'";
            DataProvider::executeQuery($sql);
        }
       $sql = "DELETE FROM sanpham WHERE masp = '" .$_POST['delete_id']. "'";
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
    
.xoa_sp, .sua_sp{
    width: 110px;
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
            <span class="table-caption"><h1>Sản phẩm đã xóa</h1></span>
        </caption>

        <thead>
            <tr style="background-color: #222; color: #f5f5f5; text-align: center;font-size: 20px;font-weight: bold">
                <th>Hình ảnh</th>
                <th>Mã</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM sanpham WHERE xoa=1";
                $sql = $sql . " LIMIT $offset, $productsPerPage";
                $result = DataProvider::executeQuery($sql);
                while ($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "  <td><img src='../images/sanpham/". $row["hinhanh"] ."' onerror=\"this.src='../images/sanpham/No_image_available.png'\" width='110px'></td>";
                    echo "  <td>" .$row["masp"]. "</td>";
                    echo "  <td>" .$row["tensp"]. "</td>";
                    echo "  <td>" .$row["giatien"]. "</td>";
                    echo "  <td>" .$row["mota"]. "</td>";
                    echo "  <td>";
                    echo "  <form method='post' onSubmit='return khoiphuc_sp()' action=''>";
                    echo "      <input type='hidden' name='restore_id' value='" . $row["masp"] . "'>";
                    echo "      <input type='submit' value='Khôi phục' class='sua_sp'>";
                    echo "  </form>";
                    echo "  <form method='post' onSubmit='return xoavinhvien_sp()' action=''>";
                    echo "      <input type='hidden' name='delete_id' value='" . $row["masp"] . "'>";
                    echo "      <input type='submit' value='Xóa vĩnh viễn' class='xoa_sp'>";
                    echo "  </form>";
                    echo "  </td>";
                    echo "<tr>";
                }
            ?>
        </tbody>
    </table>
    <?php
        $sql   = "SELECT COUNT(*) AS numproducts FROM sanpham WHERE xoa=1";
        include 'pagination.php';
    ?>
    <div style="clear: both"></div>
</div>
</body>
</html>