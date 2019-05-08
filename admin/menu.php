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
            if($site == "users"){
                echo "<div class='submenu'>";
                echo "    <i class='fa fa-users'> Quản lý tài khoản</i>";
                echo "    <div id='MENU1'>";
                if($menu == "khachhang"){
                    echo "        <a href='quantri.php?site=users&menu=khachhang' class='current'><i class='fas fa-user'> Thông tin khách hàng</i></a>";
                }
                else{
                    echo "        <a href='quantri.php?site=users&menu=khachhang'><i class='fas fa-user'> Thông tin khách hàng</i></a>";
                }
                if($menu == "nhanvien"){
                    echo "        <a href='quantri.php?site=users&menu=nhanvien' class='current'><i class='fas fa-user-tie'> Thông tin nhân viên</i></a>";
                }
                else{
                    echo "        <a href='quantri.php?site=users&menu=nhanvien'><i class='fas fa-user-tie'> Thông tin nhân viên</i></a>";
                }
                if($menu == "khoa"){
                echo "        <a href='quantri.php?site=users&menu=khoa' class='current'><i class='fas fa-user-lock'> Tài khoản đang khóa</i></a>";
                }
                else{
                    echo "        <a href='quantri.php?site=users&menu=khoa'><i class='fas fa-user-lock'> Tài khoản đang khóa</i></a>";
                }
                echo "    </div>";
                echo "</div>";
            }
        ?>
        
        <?php
            if($site == "sanpham" || $site == "donhang" || $site == "thongke"){
                echo "<div class='submenu'>";
                echo "    <i class='fas fa-box-open'> Quản lý sản phẩm</i>";
                echo "    <div id='MENU2'>";
                if($menu == "thongtin"){
                    echo "        <a href='quantri.php?site=sanpham&menu=thongtin' class='current'><i class='fas fa-tags'></i> Thông tin sản phẩm</a>";
                }
                else{
                    echo "        <a href='quantri.php?site=sanpham&menu=thongtin'><i class='fas fa-tags'></i> Thông tin sản phẩm</a>";
                }
                if($menu == "phanloai"){
                    echo "        <a href='quantri.php?site=sanpham&menu=phanloai' class='current'><i class='fas fa-layer-group'></i> Phân loại sản phẩm</a>";
                }
                else{
                    echo "        <a href='quantri.php?site=sanpham&menu=phanloai'><i class='fas fa-layer-group'></i> Phân loại sản phẩm</a>";
                }
                if($menu == "khuyenmai"){
                    echo "        <a href='quantri.php?site=sanpham&menu=khuyenmai' class='current'><i class='fas fa-cart-arrow-down'></i> Sản phẩm giảm giá</a>";
                }
                else{
                    echo "        <a href='quantri.php?site=sanpham&menu=khuyenmai'><i class='fas fa-cart-arrow-down'></i> Sản phẩm giảm giá</a>";
                }
                if($menu == "xoa"){
                    echo "        <a href='quantri.php?site=sanpham&menu=xoa' class='current'><i class='fas fa-trash-alt'></i> Sản phẩm đã xóa</a>";
                }
                else{
                    echo "        <a href='quantri.php?site=sanpham&menu=xoa'><i class='fas fa-trash-alt'></i> Sản phẩm đã xóa</a>";
                }
                echo "    </div>";
                echo "</div>";
            }
        ?>
        
        <?php
            if($site == "sanpham" || $site == "donhang" || $site == "thongke"){
                echo "<div class='submenu'>";
                echo "    <i class='fas fa-shipping-fast'> Quản lý đơn hàng</i>";
                echo "    <div id='MENU3'>";
                if($menu == "tinhtrang"){
                    echo "        <a href='quantri.php?site=donhang&menu=tinhtrang' class='current'><i class='fa fa-paper-plane'></i> Tình trạng đơn hàng</a>";
                }
                else{
                    echo "        <a href='quantri.php?site=donhang&menu=tinhtrang'><i class='fa fa-paper-plane'></i> Tình trạng đơn hàng</a>";
                }
                if($menu == "thongke"){
                    echo "        <a href='quantri.php?site=thongke' class='current'><i class='fa fa-chart-bar'></i> Thống kê đơn hàng</a>";
                }
                else{
                    echo "        <a href='quantri.php?site=thongke'><i class='fa fa-chart-bar'></i> Thống kê đơn hàng</a>";
                }
                echo "    </div>";
                echo "</div>";
            }
        ?>
        <!Thống kê đơn hàng theo thú cưng>
        <!Thống kê đơn hàng theo danh mục>
        <!Thống kê đơn hàng theo giá tiền>
    </div>
</div>