<?php
    $menu = $_SERVER['PHP_SELF'];
    $menu = basename($menu);
?>
<div id="MENU" class="menu collapse show">
    <img src="images/logo3.png" class="admin-logo">
    <div class="menu-content">
        <?php
            if(isset($_SESSION['managerIsLogin']) && isset($_SESSION['managervaitro']))
            {
                if($_SESSION['managerIsLogin'] == 1 && $_SESSION['managervaitro'] == "admin")
                {
                    echo "<div class='submenu'>";
                    echo "    <i class='fa fa-users'> Quản lý tài khoản</i>";
                    echo "    <div id='MENU1'>";
                    if($menu == "thongtintaikhoan.php"){
                        echo "        <a href='thongtintaikhoan.php' class='current'><i class='fas fa-user'> Thông tin tài khoản</i></a>";
                    }
                    else{
                        echo "        <a href='thongtintaikhoan.php'><i class='fas fa-user'> Thông tin tài khoản</i></a>";
                    }
                    if($menu == "taikhoankhoa.php"){
                    echo "        <a href='taikhoankhoa.php' class='current'><i class='fas fa-user-lock'> Tài khoản đang khóa</i></a>";
                    }
                    else{
                        echo "        <a href='taikhoankhoa.php'><i class='fas fa-user-lock'> Tài khoản đang khóa</i></a>";
                    }
                    echo "    </div>";
                    echo "</div>";
                }
            }
        ?>
        
        <?php
            if(isset($_SESSION['managerIsLogin']) && isset($_SESSION['managervaitro']))
            {
                if($_SESSION['managerIsLogin'] == 1 && $_SESSION['managervaitro'] == "sale")
                {
                    echo "<div class='submenu'>";
                    echo "    <i class='fas fa-box-open'> Quản lý sản phẩm</i>";
                    echo "    <div id='MENU2'>";
                    if($menu == "thongtinsanpham.php"){
                        echo "        <a href='thongtinsanpham.php' class='current'><i class='fas fa-tags'> Thông tin sản phẩm</i></a>";
                    }
                    else{
                        echo "        <a href='thongtinsanpham.php'><i class='fas fa-tags'> Thông tin sản phẩm</i></a>";
                    }
                    if($menu == "phanloaisanpham.php"){
                        echo "        <a href='phanloaisanpham.php' class='current'><i class='fas fa-layer-group'> Phân loại sản phẩm</i></a>";
                    }
                    else{
                        echo "        <a href='phanloaisanpham.php'><i class='fas fa-layer-group'> Phân loại sản phẩm</i></a>";
                    }
                    if($menu == "sanphamgiamgia.php"){
                        echo "        <a href='sanphamgiamgia.php' class='current'><i class='fas fa-cart-arrow-down'> Sản phẩm giảm giá</i></a>";
                    }
                    else{
                        echo "        <a href='sanphamgiamgia.php'><i class='fas fa-cart-arrow-down'> Sản phẩm giảm giá</i></a>";
                    }
                    if($menu == "sanphamdaxoa.php"){
                        echo "        <a href='sanphamdaxoa.php' class='current'><i class='fas fa-trash-alt'> Sản phẩm đã xóa</i></a>";
                    }
                    else{
                        echo "        <a href='sanphamdaxoa.php'><i class='fas fa-trash-alt'> Sản phẩm đã xóa</i></a>";
                    }
                    echo "    </div>";
                    echo "</div>";
                }
            }
        ?>
        
        <?php
            if(isset($_SESSION['managerIsLogin']) && isset($_SESSION['managervaitro']))
            {
                if($_SESSION['managerIsLogin'] == 1 && $_SESSION['managervaitro'] == "sale")
                {
                    echo "<div class='submenu'>";
                    echo "    <i class='fas fa-shipping-fast'> Quản lý đơn hàng</i>";
                    echo "    <div id='MENU3'>";
                    if($menu == "donhang.php"){
                        echo "        <a href='donhang.php' class='current'><i class='fa fa-paper-plane'></i> Tình trạng đơn hàng</a>";
                    }
                    else{
                        echo "        <a href='donhang.php'><i class='fa fa-paper-plane'> Tình trạng đơn hàng</i></a>";
                    }
                    if($menu == "thongke.php"){
                        echo "        <a href='thongke.php' class='current'><i class='fa fa-chart-bar'> Thống kê đơn hàng</i></a>";
                    }
                    else{
                        echo "        <a href='thongke.php'><i class='fa fa-chart-bar'> Thống kê đơn hàng</i></a>";
                    }
                    echo "    </div>";
                    echo "</div>";
                }
            }
        ?>
    </div>
</div>