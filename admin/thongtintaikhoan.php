<?php
    include 'accessadmin.php';
    require '../DataProvider.php';
    require '../ProductsPerPage.inc';
?>

<?php
    if (isset($_POST['tendangnhap']) && isset($_POST['matkhau'])){
        $_POST['matkhau'] = md5($_POST['matkhau']);
        // KT username ton tai chua
		$sql1="SELECT tendangnhap FROM taikhoan WHERE tendangnhap='".$_POST['tendangnhap']."'";
		$ktusername=DataProvider::executeQuery($sql1);
        
        if(mysqli_num_rows($ktusername) >0)
		{
			echo "<script language='javascript'> ;alert('Tên đăng nhập đã tồn tại!!! Vui lòng chọn tên đăng nhập khác.'); history.go(-1);</script>";
		}
        else
        {
            $sql = "INSERT INTO taikhoan(tendangnhap, matkhau, mavt, hoten, ngaysinh, dienthoai, email, khoa) VALUES ('".$_POST['tendangnhap']."', '".$_POST['matkhau']."', '".$_POST['vaitro']."', '".$_POST['hoten']."', '".$_POST['ngaysinh']."', '".$_POST['dienthoai']."', '".$_POST['email']."', 0)";
            DataProvider::executeQuery($sql);
            echo "<script language='javascript'> ;alert('Thêm tài khoản thành công!!!'); </script>";
        }
    }

    if (isset($_POST['lock_id'])){
       $sql = "UPDATE taikhoan SET khoa=1 WHERE tendangnhap = '" .$_POST['lock_id']. "'";
       DataProvider::executeQuery($sql);
    }

    if (isset($_POST['del_id'])){
       $sql = "DELETE FROM taikhoan WHERE tendangnhap = '" .$_POST['del_id']. "'";
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
        <caption>
            <span class="table-caption"><h1>Thông tin khách hàng</h1></span>
            <div class="them-tk"><button onclick="popup_themtk()"><i class="fas fa-edit"></i><strong> Thêm</strong></button></div>
        </caption>
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
                $sql = "SELECT * FROM taikhoan AS tk JOIN vaitro AS vt ON tk.mavt = vt.mavt WHERE tk.khoa=0";
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
                    echo "      <form method='post' onSubmit='return khoa_tk()' action=''>";
                    echo "          <input type='hidden' name='lock_id' value='" . $row["tendangnhap"] . "'>";
                    echo "          <input type='submit' value='Khóa' class='xoa_user'>";
                    echo "      </form>";
                    echo "      <button class='sua_user' value='".$row["tendangnhap"]."' onClick='goto(this.value)'>Sửa</button>";
                    echo "  </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    
    <?php
        $sql   = "SELECT COUNT(*) AS numproducts FROM taikhoan WHERE khoa=0";
        include 'pagination.php';
    ?>

    <div style="clear: both"></div>
    <!-- popup thêm tk -->
    <div class="popup-themuser">
        <div class="popup-themuser__content">
            <div class="popup-themuser__title">THÊM TÀI KHOẢN</div>
            <form method="post" action="" onSubmit="return kiemtra()">
                <div class="popup-themuser-left">
                    <div class="popup-themuser-left__label">Tên đăng nhập</div>
                    <div class="popup-themuser-left__label">Mật khẩu</div>
                    <div class="popup-themuser-left__label">Nhập lại mật khẩu</div>
                    <div class="popup-themuser-left__label">Họ và tên</div>
                    <div class="popup-themuser-left__label">Vai trò</div>
                    <div class="popup-themuser-left__label">Ngày sinh</div>
                    <div class="popup-themuser-left__label">Số điện thoại</div>
                    <div class="popup-themuser-left__label">Email</div>
                </div>
                <div class="popup-themuser-right">
                    <div class="popup-themuser-left__input"><input class="sua-user" type="text" name="tendangnhap" id="tendangnhap"></div>
                    <div class="popup-themuser-left__input"><input class="sua-user" type="password" name="matkhau" id="matkhau"></div>
                    <div class="popup-themuser-left__input"><input class="sua-user" type="password" name="matkhau2" id="rematkhau"></div>
                    <div class="popup-themuser-left__input"><input class="sua-user" type="text" name="hoten" id="hoten"></div>
                    <div class="popup-themuser-left__input">
                        <select name="vaitro">
                            <option value="customer">Khách hàng</option>
                            <option value="sale">Bán hàng</option>
                            <option value="admin">Quản trị viên</option>
                        </select>
                    </div>
                    <div class="popup-themuser-left__input"><input class="sua-user" type="date" name="ngaysinh"></div>
                    <div class="popup-themuser-left__input"><input class="sua-user" type="tel" name="dienthoai" id="dienthoai"></div>
                    <div class="popup-themuser-left__input"><input class="sua-user" type="email" name="email" id="email"></div>
                </div>
                <button type="submit" class="popup-themuser__btn">Thêm</button>
                <span class="back" onclick="close_popup_themuser()">&times;</span>
            </form>
        </div>
    </div>
    <!-- popup sửa tk -->
    <div class="popup-themuser">
        <div class="popup-themuser__content">
            <div class="popup-themuser__title">SỬA TÀI KHOẢN</div>
            <form method="post" action="">
                <div class="popup-themuser-left">
                    <div class="popup-themuser-left__label">Tên đăng nhập</div>
                    <div class="popup-themuser-left__label">Họ và tên</div>
                    <div class="popup-themuser-left__label">Vai trò</div>
                    <div class="popup-themuser-left__label">Ngày sinh</div>
                    <div class="popup-themuser-left__label">Số điện thoại</div>
                    <div class="popup-themuser-left__label">Email</div>
                </div>
                <div class="popup-themuser-right">
                    <div class="popup-themuser-left__input"><input class="sua-user" type="text" name="suatendangnhap"></div>
                    <div class="popup-themuser-left__input"><input class="sua-user" type="text" name="suahoten"></div>
                    <div class="popup-themuser-left__input">
                        <select name="suavaitro">
                            <option value="customer">Khách hàng</option>
                            <option value="sale">Bán hàng</option>
                            <option value="admin">Quản trị viên</option>
                        </select>
                    </div>
                    <div class="popup-themuser-left__input"><input class="sua-user" type="date" name="suangaysinh"></div>
                    <div class="popup-themuser-left__input"><input class="sua-user" type="tel" name="suadienthoai"></div>
                    <div class="popup-themuser-left__input"><input class="sua-user" type="email" name="suaemail"></div>
                </div>
                <button type="submit" class="popup-themuser__btn" onclick="sua_thong_tin_user()">Sửa</button>
                <span class="back" onclick="close_popup_themuser()">&times;</span>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        function kiemtra()
        {
            var username= document.getElementById("tendangnhap");
            var password=document.getElementById("matkhau");
            var re_password= document.getElementById("rematkhau");
            var name=document.getElementById("hoten");
            var email= document.getElementById("email");
            var phone=document.getElementById("dienthoai");

            var usernamePatt = /^[A-Za-z0-9]{5,}$/;
            var flag1 = usernamePatt.test(username.value);

            var passwordPatt = /\S{5,}$/;
            var flag2 = passwordPatt.test(password.value);


            var namePatt = /(([^0-9!@#$%^&*()\_\-\=~`+[\]{}|<>?\\,./;/:"]{2,20})\s{0,1})$/;
            var flag3 = namePatt.test(name.value);

            var phonePatt = /^0[1-9]\d{8}$/;
            var flag4 = phonePatt.test(phone.value);

            var emailPatt = /^([a-zA-Z0-9][._]?)+[^.,_;@"':<>~? ]@([a-zA-Z0-9]+([.][a-zA-Z0-9]+)+)$/;
            var flag5 = emailPatt.test(email.value);

            if(username.value=="")
            {
                window.alert("Chưa nhập Tên đăng nhập");
                username.focus();
                return false;
            }
            if(flag1 == false)
            {
                window.alert("Tên đăng nhập không hợp lệ, vui lòng nhập lại");
                username.focus();
                return false;
            }
            if(password.value=="")
            {
                window.alert("Chưa nhập mật khẩu ");
                password.focus();
                return false;
            }
            if(password.value.length<5)
            {
                window.alert("Mật khẩu chưa đủ 5 kí tự,vui lòng nhập lại");
                password.focus();
                return false;
            }
            if(flag2 == false)
            {
                window.alert("Mật khẩu không hợp lệ, vui lòng nhập lại");
                password.focus();
                return false;
            }
            if(password.value!=re_password.value)
            {
                window.alert("Mật khẩu bạn nhập lại đã sai,vui lòng nhập lại");
                re_password.focus();
                return false;
            }
            if(name.value=="")
            {
                window.alert("Họ và tên bạn đang để trống");
                name.focus();
                return false;
            }
            if(flag3 == false)
            {
                window.alert("Họ và tên không hợp lệ, vui lòng nhập lại");
                name.focus();
                return false;
            }
            if(flag4 == false)
            {
                window.alert("Số điện thoại không hợp lệ, vui lòng nhập lại");
                phone.focus();
                return false;
            }
            if(flag5 == false)
            {
                window.alert("Email không hợp lệ, vui lòng nhập lại");
                email.focus();
                return false;

            }
            return true;
	}
        
    function goto(id)
    {
        location.href = 'suataikhoan.php?tendangnhap='+id;
    }
</script>
</div>
</body>
</html>