<?php
    $site = "";
    if(isset($_GET['site']))
    {
        $site = $_GET['site'];
    }
    $menu = "";
    if(isset($_GET['menu']))
    {
        $menu = $_GET['menu'];
    }
?>
<div id="MENU" class="menu collapse show">
    <img src="images/logo3.png" class="admin-logo">
    <div class="menu-content">
        <?php
            echo "<div class='submenu'>";
            echo "    <i class='fa fa-users'> Quản lý tài khoản</i>";
            echo "    <div id='MENU1'>";
            if($menu == "khachhang"){
                echo "        <a href='thongtinkhachhang.php' class='current'><i class='fas fa-user'> Thông tin khách hàng</i></a>";
            }
            else{
                echo "        <a href='thongtinkhachhang.php'><i class='fas fa-user'> Thông tin khách hàng</i></a>";
            }
            if($menu == "nhanvien"){
                echo "        <a href='thongtinnhanvien.php' class='current'><i class='fas fa-user-tie'> Thông tin nhân viên</i></a>";
            }
            else{
                echo "        <a href='thongtinnhanvien.php'><i class='fas fa-user-tie'> Thông tin nhân viên</i></a>";
            }
            if($menu == "khoa"){
            echo "        <a href='taikhoankhoa.php' class='current'><i class='fas fa-user-lock'> Tài khoản đang khóa</i></a>";
            }
            else{
                echo "        <a href='taikhoankhoa.php'><i class='fas fa-user-lock'> Tài khoản đang khóa</i></a>";
            }
            echo "    </div>";
            echo "</div>";
        ?>
        
        <?php
            echo "<div class='submenu'>";
            echo "    <i class='fas fa-box-open'> Quản lý sản phẩm</i>";
            echo "    <div id='MENU2'>";
            if($menu == "thongtin"){
                echo "        <a href='thongtinsanpham.php' class='current'><i class='fas fa-tags'> Thông tin sản phẩm</i></a>";
            }
            else{
                echo "        <a href='thongtinsanpham.php'><i class='fas fa-tags'> Thông tin sản phẩm</i></a>";
            }
            if($menu == "phanloai"){
                echo "        <a href='phanloaisanpham.php' class='current'><i class='fas fa-layer-group'> Phân loại sản phẩm</i></a>";
            }
            else{
                echo "        <a href='phanloaisanpham.php'><i class='fas fa-layer-group'> Phân loại sản phẩm</i></a>";
            }
            if($menu == "khuyenmai"){
                echo "        <a href='sanphamgiamgia.php' class='current'><i class='fas fa-cart-arrow-down'> Sản phẩm giảm giá</i></a>";
            }
            else{
                echo "        <a href='sanphamgiamgia.php'><i class='fas fa-cart-arrow-down'> Sản phẩm giảm giá</i></a>";
            }
            if($menu == "xoa"){
                echo "        <a href='sanphamdaxoa.php' class='current'><i class='fas fa-trash-alt'> Sản phẩm đã xóa</i></a>";
            }
            else{
                echo "        <a href='sanphamdaxoa.php'><i class='fas fa-trash-alt'> Sản phẩm đã xóa</i></a>";
            }
            echo "    </div>";
            echo "</div>";
        ?>
        
        <?php
            echo "<div class='submenu'>";
            echo "    <i class='fas fa-shipping-fast'> Quản lý đơn hàng</i>";
            echo "    <div id='MENU3'>";
            if($menu == "tinhtrang"){
                echo "        <a href='donhang.php' class='current'><i class='fa fa-paper-plane'></i> Tình trạng đơn hàng</a>";
            }
            else{
                echo "        <a href='donhang.php'><i class='fa fa-paper-plane'> Tình trạng đơn hàng</i></a>";
            }
            if($menu == "thongke"){
                echo "        <a href='thongke.php' class='current'><i class='fa fa-chart-bar'> Thống kê đơn hàng</i></a>";
            }
            else{
                echo "        <a href='thongke.php'><i class='fa fa-chart-bar'> Thống kê đơn hàng</i></a>";
            }
            echo "    </div>";
            echo "</div>";
        ?>
        <!Thống kê đơn hàng theo thú cưng>
        <!Thống kê đơn hàng theo danh mục>
        <!Thống kê đơn hàng theo giá tiền>
    </div>
</div>