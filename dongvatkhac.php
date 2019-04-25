<?php
    require 'DataProvider.php';
?>
<div>
    <h1 class="title-background">
        <span class="title">Sản phẩm cho chim</span>
        <a href="index.php?site=chim&menu=0&page=1" class="xemtatca"><span>Xem tất cả &rsaquo;</span></a>
    </h1>
    <div class="container" id="spchim">
        <?php
            $sql = "SELECT sp.*, sdt.madv, sdt.matl, km.giakhuyenmai FROM sanpham as sp JOIN sp_dv_tl as sdt ON sp.masp = sdt.masp LEFT JOIN spkhuyenmai AS km ON sp.masp = km.masp WHERE madv='bird' ORDER BY RAND() LIMIT 4";
            $result = DataProvider::executeQuery($sql);
            while ($row = mysqli_fetch_array($result))
            {
                echo "<div class='sanpham'>";
                echo "  <a href='index.php?site=SanPham&masp=".$row["masp"]."' class='p-img'><img src='images/sanpham/". $row["hinhanh"] ."'/></a>";
                echo "  <a href='index.php?site=SanPham&masp=".$row["masp"]."' class='p-name'>". $row["tensp"] ."</a>";
                if($row["giakhuyenmai"] === NULL){
                    echo "  <p class='gia'>". number_format($row["giatien"], 0, ',', '.') ."đ</p>";
                }
                else
                {
                    echo "  <p class='gia'>";
                    echo "  "   . number_format($row["giakhuyenmai"], 0, ',', '.') ."đ";
                    echo "      <span class='giacu'>". number_format($row["giatien"], 0, ',', '.') ."đ</span>";
                    echo "  </p>";
                }
                if($row["soluong"] == 0){
                    echo "  <p><button class='shop-item-button hethang'>Tạm hết hàng</button></p>";
                }
                else{
                    echo "  <p><button class='shop-item-button' value='". $row["masp"] ."' onClick='saveProduct(this.value)'>Đặt mua ngay</button></p>";
                }
                echo "</div>";
            }
        ?>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>
<div>
    <h1 class="title-background">
        <span class="title">Sản phẩm cho cá</span>
        <a href="index.php?site=ca&menu=0&page=1" class="xemtatca"><span>Xem tất cả &rsaquo;</span></a>
    </h1>
    <div class="container" id="spca">
        <?php
            $sql = "SELECT sp.*, sdt.madv, sdt.matl, km.giakhuyenmai FROM sanpham as sp JOIN sp_dv_tl as sdt ON sp.masp = sdt.masp LEFT JOIN spkhuyenmai AS km ON sp.masp = km.masp WHERE madv='fish' ORDER BY RAND() LIMIT 4";
            $result = DataProvider::executeQuery($sql);
            while ($row = mysqli_fetch_array($result))
            {
                echo "<div class='sanpham'>";
                echo "  <a href='index.php?site=SanPham&masp=".$row["masp"]."' class='p-img'><img src='images/sanpham/". $row["hinhanh"] ."'/></a>";
                echo "  <a href='index.php?site=SanPham&masp=".$row["masp"]."' class='p-name'>". $row["tensp"] ."</a>";
                if($row["giakhuyenmai"] === NULL){
                    echo "  <p class='gia'>". number_format($row["giatien"], 0, ',', '.') ."đ</p>";
                }
                else
                {
                    echo "  <p class='gia'>";
                    echo "  "   . number_format($row["giakhuyenmai"], 0, ',', '.') ."đ";
                    echo "      <span class='giacu'>". number_format($row["giatien"], 0, ',', '.') ."đ</span>";
                    echo "  </p>";
                }
                if($row["soluong"] == 0){
                    echo "  <p><button class='shop-item-button hethang'>Tạm hết hàng</button></p>";
                }
                else{
                    echo "  <p><button class='shop-item-button' value='". $row["masp"] ."' onClick='saveProduct(this.value)'>Đặt mua ngay</button></p>";
                }
                echo "</div>";
            }
        ?>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>
<div>
    <h1 class="title-background">
        <span class="title">Sản phẩm cho hamster</span>
        <a href="index.php?site=hamster&menu=0&page=1" class="xemtatca"><span>Xem tất cả &rsaquo;</span></a>
    </h1>
    <div class="container" id="sphamster">
        <?php
            $sql = "SELECT sp.*, sdt.madv, sdt.matl, km.giakhuyenmai FROM sanpham as sp JOIN sp_dv_tl as sdt ON sp.masp = sdt.masp LEFT JOIN spkhuyenmai AS km ON sp.masp = km.masp WHERE madv='hamster' ORDER BY RAND() LIMIT 4";
            $result = DataProvider::executeQuery($sql);
            while ($row = mysqli_fetch_array($result))
            {
                echo "<div class='sanpham'>";
                echo "  <a href='index.php?site=SanPham&masp=".$row["masp"]."' class='p-img'><img src='images/sanpham/". $row["hinhanh"] ."'/></a>";
                echo "  <a href='index.php?site=SanPham&masp=".$row["masp"]."' class='p-name'>". $row["tensp"] ."</a>";
                if($row["giakhuyenmai"] === NULL){
                    echo "  <p class='gia'>". number_format($row["giatien"], 0, ',', '.') ."đ</p>";
                }
                else
                {
                    echo "  <p class='gia'>";
                    echo "  "   . number_format($row["giakhuyenmai"], 0, ',', '.') ."đ";
                    echo "      <span class='giacu'>". number_format($row["giatien"], 0, ',', '.') ."đ</span>";
                    echo "  </p>";
                }
                if($row["soluong"] == 0){
                    echo "  <p><button class='shop-item-button hethang'>Tạm hết hàng</button></p>";
                }
                else{
                    echo "  <p><button class='shop-item-button' value='". $row["masp"] ."' onClick='saveProduct(this.value)'>Đặt mua ngay</button></p>";
                }
                echo "</div>";
            }
        ?>
        <div class="clear"></div>
    </div>
</div>