<?php
    session_start();

    if(isset($_POST['order'])) {
        
        include('db.inc');
        $conn = mysqli_connect($hostName,$username,$password,$databaseName);
        mysqli_query($conn, "set names 'utf8'");

        $username = $_POST['order'];
        $date = $_POST['ngaythanhtoan'];
        $total = $_POST['tongtien'];
        $address = $_POST['diachi'];

        $sql = 'INSERT INTO hoadon(tendangnhap,ngaydathang,tongtien,trangthai) VALUES ("'.$username.'","'.$date.'","'.$total.'","chưa xử lý")';
        mysqli_query($conn,$sql);

        $mahd = mysqli_insert_id($conn);

        foreach ($_SESSION['products'] as $product) {
            $masp = $product['masp'];
            $giatien = $product["giatien"];
            $soluong = $product["soluong"];
            $thanhtien = ($giatien * $soluong);
            $sql = 'INSERT INTO chitiethoadon(mahd,masp,giatien,soluong,thanhtien) VALUES ("'.$mahd.'","'.$masp.'","'.$giatien.'","'.$soluong.'","'.$thanhtien.'")';
            mysqli_query($conn,$sql);
        }

        unset($_SESSION['products']);
    }
?>