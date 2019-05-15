<?php
    require 'DataProvider.php';
?>

<div>
    <h1 class="title-background">
        <span class="title">Sản phẩm mới</span>
    </h1>

    <div class="container" id="spmoi">
        <?php
            $sql = "SELECT sp.*, km.giakhuyenmai FROM spmoi as m JOIN sanpham as sp ON m.masp = sp.masp LEFT JOIN spkhuyenmai AS km ON sp.masp = km.masp ";
            $result = DataProvider::executeQuery($sql);
            while ($row = mysqli_fetch_array($result))
            {
                echo "<form class='form_sp'>";
                echo "<div class='sanpham'>";
                echo "  <a href='index.php?site=SanPham&masp=".$row["masp"]."' class='p-img'><img src='images/sanpham/". $row["hinhanh"] ."'  onerror=\"this.src='../images/sanpham/No_image_available.png'\" /></a>";
                echo "  <a href='index.php?site=SanPham&masp=".$row["masp"]."' class='p-name'>". $row["tensp"] ."</a>";
                if($row["giakhuyenmai"] === NULL){
                    echo "  <p class='gia'>". number_format($row["giatien"], 0, ',', '.') ."đ</p>";
                }
                else
                {
                    echo "  <span class='giacu'>". number_format($row["giatien"], 0, ',', '.') ."đ</span>";
                    echo "  <p class='gia'>". number_format($row["giakhuyenmai"], 0, ',', '.') ."đ</p>";
                }
                echo "<p><input name='masp' type='hidden' value='". $row["masp"] ."'>";
                echo "<input name='soluong' type='hidden' value='1'>";
                echo "<button type='submit' class='shop-item-button'>";
                echo        "Đặt mua ngay";
                echo "</button></p>";
                echo "</div>";
                echo "</form>";
            }
        ?>
        <div class="clear"></div>
    </div>
    
</div>
<div class="clear"></div>

<div>
    <h1 class="title-background">
        <span class="title">Sản phẩm giảm giá</span>
    </h1>

    <div class="container" id="spgiamgia">
        <?php
            $sql = "SELECT * FROM spkhuyenmai as km JOIN sanpham as sp ON km.masp = sp.masp";
            $result = DataProvider::executeQuery($sql);
            while ($row = mysqli_fetch_array($result))
            {
                echo "<form class='form_sp'>";
                echo "<div class='sanpham'>";
                echo "  <a href='index.php?site=SanPham&masp=".$row["masp"]."' class='p-img'><img src='images/sanpham/". $row["hinhanh"] ."'  onerror=\"this.src='../images/sanpham/No_image_available.png'\" /></a>";
                echo "  <a href='index.php?site=SanPham&masp=".$row["masp"]."' class='p-name'>". $row["tensp"] ."</a>";
                echo "  <p class='gia'>";
                echo "  "   . number_format($row["giakhuyenmai"], 0, ',', '.') ."đ";
                echo "      <span class='giacu'>". number_format($row["giatien"], 0, ',', '.') ."đ</span>";
                echo "  </p>";
                echo "<p><input name='masp' type='hidden' value='". $row["masp"] ."'>";
                echo "<input name='soluong' type='hidden' value='1'>";
                echo "<input name='giakhuyenmai' type='hidden' value='".$row["giakhuyenmai"]."'>";
                echo "<button type='submit' class='shop-item-button'>";
                echo        "Đặt mua ngay";
                echo "</button></p>";
                echo "</div>";
                echo "</form>";
            }
        ?>
        <div class="clear"></div>
    </div>

</div>