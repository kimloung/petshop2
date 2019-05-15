<?php
    include 'accessadmin.php';
    require '../DataProvider.php';
    require '../ProductsPerPage.inc';
?>

<?php
    if (isset($_POST['unlock_id'])){
       $sql = "UPDATE taikhoan SET khoa=0 WHERE tendangnhap = '" .$_POST['unlock_id']. "'";
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
        <caption><span class="table-caption"><h1>Tài khoản đang khóa</h1></span></caption>
        <thead>
            <tr style="background-color: #222; color: #f5f5f5; text-align: center;font-size: 20px;font-weight: bold">
                <th>Tên đăng nhập</th>
                <th>Họ tên</th>
                <th>Vai trò</th>
                <th>Ngày sinh</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM taikhoan AS tk JOIN vaitro AS vt ON tk.mavt = vt.mavt WHERE tk.khoa=1";
                $sql = $sql . " LIMIT $offset, $productsPerPage";
                $result = DataProvider::executeQuery($sql);
                while ($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
					echo "  <td>" .$row["tendangnhap"]. "</td>";
                    echo "  <td>" .$row["hoten"]. "</td>";
                    echo "  <td>" .$row["vaitro"]. "</td>";
					echo "	<td>" .$row["ngaysinh"]. "</td>";
                    echo "  <td>0" .$row["dienthoai"]. "</td>";
                    echo "  <td>" .$row["email"]. "</td>";
                    echo "  <td>";
                    echo "      <form method='post' onSubmit='return mokhoa()' action=''>";
                    echo "          <input type='hidden' name='unlock_id' value='" . $row["tendangnhap"] . "'>";
                    echo "          <input type='submit' value='Mở khóa' class='xoa_user' style='width: 80px'>";
                    echo "      </form>";
                    echo "  </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    
    <?php
        $sql   = "SELECT COUNT(*) AS numproducts FROM taikhoan WHERE khoa=1";
        include 'pagination.php';
    ?>

    <div style="clear: both"></div>
</div>
</body>
</html>