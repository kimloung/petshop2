<?php
    require 'DataProvider.php';
    require 'ProductsPerPage.inc';
    $key = $_REQUEST["key"];
?>

<div>
    <h1 class="title-background">
        <span class="title">
            <?php
                $title = "Kết quả tìm kiếm cho '$key'";
                echo $title;
            ?>
        </span>
        <span class="xemtatca" style="cursor: inherit">
            <?php
                if(isset($_GET['key']))
                {
                    $key = $_GET['key'];
                    $sql = "SELECT COUNT(*) AS numproducts FROM (SELECT sp.*, sdt.madv, sdt.matl, km.giakhuyenmai, GROUP_CONCAT(sdt.madv), COUNT(*) as numproducts FROM sanpham as sp JOIN sp_dv_tl as sdt ON sp.masp = sdt.masp LEFT JOIN spkhuyenmai AS km ON sp.masp = km.masp WHERE BINARY UPPER(sp.masp) LIKE UPPER('%".$key."%') OR BINARY UPPER(sp.tensp) LIKE UPPER('%".$key."%') OR BINARY UPPER(sp.mota) LIKE UPPER('%".$key."%') GROUP BY sp.masp) AS c";
                }
                $result = DataProvider::executeQuery($sql);
                $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $numproducts = $product['numproducts'];
                $kq = "$numproducts sản phẩm";
                echo $kq;
            ?>
        </span>
    </h1>
     <div class="container">
         <div id="sp">
             <?php
                if($numproducts == 0){
                    echo "<center>";
                    echo "     <img src='images/background/nofound.png'>";
                    echo "     <span>";
                    echo "         <br><strong>Ôi không!</strong><br>";
                    echo "         Có vẻ như chú chó này đã lấy mất tất cả sản phẩm bạn mà tìm kiếm.<br>";
                    echo "         Trừ khi bạn đang tìm kiếm chú chó đáng yêu này. Chúc mừng! Bạn đã tìm thấy nó.<br>";
                    echo "     </span>";
                    echo "</center>";
                }
             ?>
             <?php
                $sql = "SELECT sp.*, sdt.madv, sdt.matl, km.giakhuyenmai, GROUP_CONCAT(sdt.madv) FROM sanpham as sp JOIN sp_dv_tl as sdt ON sp.masp = sdt.masp LEFT JOIN spkhuyenmai AS km ON sp.masp = km.masp WHERE BINARY UPPER(sp.masp) LIKE UPPER('%".$key."%') OR BINARY UPPER(sp.tensp) LIKE UPPER('%".$key."%') OR BINARY UPPER(sp.mota) LIKE UPPER('%".$key."%') GROUP BY sp.masp";
                $sql = $sql . " LIMIT $offset, $productsPerPage";
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
         </div>
         <div class="clear"></div>
         
         <?php
            include('pagination.php');
         ?>
         <div class="clear"></div>
     </div>
</div>
<div class="clear"></div>