<?php
    require 'DataProvider.php';
?>

<div class="chitietsp" id="chitietsp">
    <?php
        $sql = "SELECT sp.*, km.giakhuyenmai FROM sanpham as sp LEFT JOIN spkhuyenmai AS km ON sp.masp = km.masp WHERE sp.masp='".$_GET['masp']."'";
        $result = DataProvider::executeQuery($sql);
        $row = mysqli_fetch_array($result);
        if(mysqli_num_rows($result)== 0)
            echo "<h1 style='text-align: center;color: red'>KHÔNG CÓ THÔNG TIN SẢN PHẨM</h1>";
        else
        {
            echo "<form class='form_sp'>";
            echo "<div class='hinhanh'>";
            echo "  <img src='images/sanpham/". $row["hinhanh"] ."'>";
            echo "</div>";
            echo "<div class='overview'>";
            echo "  <h1 id='tensp'>". $row["tensp"] ."</h1>";
            echo "  <p id='masp'>Mã SP: ". $row["masp"] ."</p>";
            if($row["giakhuyenmai"] === NULL){
                echo "  <p class='gia'>". number_format($row["giatien"], 0, ',', '.') ."đ</p>";
            }
            else
            {
                echo "  <span class='giacu'>". number_format($row["giatien"], 0, ',', '.') ."đ</span>";
                echo "  <p class='gia'>". number_format($row["giakhuyenmai"], 0, ',', '.') ."đ</p>";
            }
            if($row["soluong"] == 0){
                echo "  <p><button class='shop-item-button hethang' disabled>Tạm hết hàng</button></p>";
            }
            else{
                echo "<p><input name='masp' type='hidden' value='". $row["masp"] ."'>";
                echo "<input name='soluong' type='hidden' value='1'>";
                echo "<button type='submit' class='shop-item-button'>";
                echo        "Đặt mua ngay";
                echo "</button></p>";
            }
            echo "  <div class='thongtin'>". nl2br($row["mota"]) ."</div>";
            echo "</div>";
            echo "</form>";
            echo "<div class='clear'></div>";
        }
    ?>
</div>