<?php
    require 'DataProvider.php';
    require 'ProductsPerPage.inc';
?>

<div>
    <h1 class="title-background">
        <span class="title">
            <?php
            $title = "Sản phẩm cho chó";
            if(isset($_GET['menu']))
            {
                if($_GET['menu'] == 1)
                    $title = "Thức ăn cho chó";
                if($_GET['menu'] == 2)
                    $title = "Vật dụng cho chó";
                if($_GET['menu'] == 3)
                    $title = "Chuồng, giường cho chó";
            }
            echo $title;
            ?>
        </span>
    </h1>
     <div class="container">
         <div id="sp">
             <?php
                $sql = "SELECT sp.*, sdt.madv, sdt.matl, km.giakhuyenmai FROM sanpham as sp JOIN sp_dv_tl as sdt ON sp.masp = sdt.masp LEFT JOIN spkhuyenmai AS km ON sp.masp = km.masp WHERE madv='dog'";
                if (isset($_GET['menu']))
                {
                    if($_GET['menu'] == 0)
                        $sql = $sql;
                    if($_GET['menu'] == 1)
                        $sql = $sql . " AND matl='food'";
                    if($_GET['menu'] == 2)
                        $sql = $sql . " AND matl='stuff'";
                    if($_GET['menu'] == 3)
                        $sql = $sql . " AND matl='bed'";
                }
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