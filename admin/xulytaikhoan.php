<?php
	// Nếu ko phải là sự kiện xử lý đăng ký thì ko chạy
	require '../DataProvider.php';
	session_start();

	// xử lý đăng nhập
	if(isset($_POST["btnlogin"])){
		$username = addslashes($_POST["taikhoan"]);
		$password = addslashes($_POST["matkhau"]);
		
		$password=md5($password);
		
		// KT tai khoan ton tai chua
		$qry="SELECT * FROM taikhoan WHERE tendangnhap='$username'";
		$rs=DataProvider::executeQuery($qry);
		$row=mysqli_num_rows($rs);
		$thanhvien=mysqli_fetch_array($rs);
		// status la tinh trang cua account do, status = 0 thi dc dang nhap
		$status=$thanhvien["khoa"];		
        $vaitro=$thanhvien["mavt"];
		//echo "<script language='javascript'> alert($thanhvien['hoten']);</script>";
		if(($row == 0) || ($status != 0) || ($password != $thanhvien['matkhau']) || ($vaitro == "customer"))
		{
			echo "<script language='javascript'> alert('Email hoặc mật khẩu sai!');history.go(-1); </script>";
		}
		// so sanh mat khau co trung ko 
		else
		{
			$_SESSION['managerusername'] = $thanhvien['tendangnhap'];
            $_SESSION['managervaitro']   = $thanhvien['mavt'];
			$_SESSION['managername']     = $thanhvien['hoten'];
			$_SESSION['manageremail']    = $thanhvien['email'];
            $_SESSION['managerngaysinh'] = $thanhvien['ngaysinh'];
			$_SESSION['managersdt']      = $thanhvien['dienthoai'];
			$_SESSION['managerstatus']   = $thanhvien['khoa'];
			$_SESSION['managerIsLogin']  = 1;
			echo "<script language='javascript'> alert('Đăng nhập thành công');</script>";
            if($_SESSION['managervaitro'] == "sale")
                echo "<script language='javascript'>window.location='thongtinsanpham.php';</script>";
            if($_SESSION['managervaitro'] == "admin")
                echo "<script language='javascript'>window.location='thongtintaikhoan.php';</script>";
		}
	}
	//xử lý đăng xuất
    if(isset($_POST["btnlogout"]))
    {
        $_SESSION['managerIsLogin'] = 0;
        unset($_SESSION['managervaitro']);
        unset($_SESSION['managerusername']);
        unset($_SESSION['managerpassword']);
        unset($_SESSION['managername']);
        unset($_SESSION['manageremail']);
        unset($_SESSION['managerngaysinh']);
        unset($_SESSION['managersdt']);
        unset($_SESSION['managerstatus']);
        session_destroy();
        echo "<script language='javascript'>window.location='index.php';</script>";
    }
?>
