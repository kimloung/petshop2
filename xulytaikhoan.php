<?php
	// Nếu ko phải là sự kiện xử lý đăng ký thì ko chạy
	require 'DataProvider.php';
	session_start();
	// Xử lý đăng ký
	if(isset($_POST['submit'])){

		// Lấy dữ liệu từ user
		$username = addslashes($_POST["username"]);
		$password = addslashes($_POST["password"]);
		$email    = addslashes($_POST["email"]);
		$name     = addslashes($_POST["name"]);
		$ngaysinh = addslashes($_POST["ngaysinh"]);
		$sdt      = addslashes($_POST["phone"]);
		
		//encrypt pass
		$password = md5($password);
		
		// KT username ton tai chua
		$sql1="SELECT tendangnhap FROM taikhoan WHERE tendangnhap='$username'";
		$ktusername=DataProvider::executeQuery($sql1);
		// KT email ton tai chua
		$sql2="SELECT email FROM taikhoan WHERE email='$email'";
		$ktemail=DataProvider::executeQuery($sql2);
		
		$sql="INSERT INTO taikhoan(tendangnhap,matkhau,mavt,hoten,ngaysinh,dienthoai,email,khoa) VALUES ('$username', '$password', 'customer', '$name', '$ngaysinh', $sdt, '$email', 0)";
		$rs=DataProvider::executeQuery($sql);
		if(mysqli_num_rows($ktusername) >0)
		{
			echo "<script language='javascript'> ;alert('Tên đăng nhập đã tồn tại, vui lòng chọn tên đăng nhập khác.'); history.go(-1);</script>";
			
		}
		else{ if(mysqli_num_rows($ktemail) >0)
			{
				echo "<script language='javascript'> alert('Email đã tồn tại, vui lòng chọn email khác.');history.go(-1);</script>";
				
			}	
	
		else{ if($rs)	echo "<script language='javascript'> alert('Đăng ký thành công.'); window.location='index.php' </script>";	
				else	echo "<script language='javascript'> alert('Đã xảy ra lỗi khi đăng ký, vui lòng thử lại !!'); history.go(-1); </script>";
	       
		}
		}
	}
	
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
		//echo "<script language='javascript'> alert($thanhvien['hoten']);</script>";
		if(($row == 0) || ($status != 0))
		{
			echo "<script language='javascript'> alert('Tài khoản hoặc mật khẩu không đúng, vui lòng kiểm tra lại !!');history.go(-1); </script>";
		}
		// so sanh mat khau co trung ko 
		else
		{
			$_SESSION['username'] = $thanhvien['tendangnhap'];
			$_SESSION['password'] = $thanhvien['matkhau'];
			$_SESSION['name']     = $thanhvien['hoten'];
			$_SESSION['email']    = $thanhvien['email'];
            		$_SESSION['ngaysinh'] = $thanhvien['ngaysinh'];
			$_SESSION['sdt']      = $thanhvien['dienthoai'];
			$_SESSION['status']   = $thanhvien['khoa'];
			$_SESSION['IsLogin']  = 1;
			echo "<script language='javascript'> alert('Đăng nhập thành công');window.location='index.php';</script>";
		}
	}
	//xử lý đăng xuất
    if(isset($_POST["btnlogout"]))
    {
        $_SESSION['IsLogin'] = 0;
        echo "<script language='javascript'>window.location='index.php';</script>";
    }
?>
