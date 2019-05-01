<?php
    require 'DataProvider.php';
    require 'ProductsPerPage.inc';
?>

<div>
    <h1 class="title-background">
        <span class="title">
            <?php
            $title = "Sản phẩm cho thú cưng";
            if(isset($_GET['menu']))
            {
                if($_GET['menu'] == 1)
                    $title = "Thức ăn cho thú cưng";
                if($_GET['menu'] == 2)
                    $title = "Vật dụng cho thú cưng";
                if($_GET['menu'] == 3)
                    $title = "Chuồng, giường cho thú cưng";
            }
            echo $title;
            ?>
        </span>
        <?php
            if (isset($_GET['pricefrom']) && isset($_GET['priceto'])) {
                echo '<span class="title-price">';
                $titleprice = "";
                $giatu = $_GET['pricefrom'];
                $giaden = $_GET['priceto'];

                $format_giatu = number_format(floatval($giatu), 0, ',', '.');
                $format_giaden = number_format(floatval($giaden), 0, ',', '.');

                if ($giatu != "" && $giaden == "") {
                    $titleprice = " | Giá từ " . $format_giatu . " đ";
                }
                if ($giaden != "" && $giatu == "") {
                    $titleprice = " | Giá đến " . $format_giaden . " đ";
                }
                if ($giatu != "" && $giaden != "") {
                    $titleprice = " | Giá từ " . $format_giatu . 'đ <i class="fas fa-arrow-right"></i> ' . $format_giaden . "đ";
                }
                echo $titleprice . "</span>";
            }
        ?>
    </h1>
    <div class="container">
        <div id="sp">
            <?php
                $sql = "SELECT sp.*, GROUP_CONCAT(sdt.madv) AS madv, sdt.matl, km.giakhuyenmai FROM sanpham as sp JOIN sp_dv_tl as sdt ON sp.masp = sdt.masp LEFT JOIN spkhuyenmai AS km ON sp.masp = km.masp";
                if (isset($_GET['menu']))
                {
                    if($_GET['menu'] == 1)
                        $sql = $sql . " WHERE sdt.matl='food'";
                    if($_GET['menu'] == 2)
                        $sql = $sql . " WHERE sdt.matl='stuff'";
                    if($_GET['menu'] == 3)
                        $sql = $sql . " WHERE sdt.matl='bed'";
                }

                if (isset($_GET['pricefrom']) && isset($_GET['priceto'])) {
                    $giatu = $_GET['pricefrom'];
                    $giaden = $_GET['priceto'];
                    if($giatu != "" || $giaden != ""){
                        if (strpos($sql,"WHERE") === false)
                            $sql = $sql . " WHERE";
                        else
                            $sql = $sql . " AND";
                        if ($giatu != "" && $giaden == "")
                            $sql = $sql . " sp.giatien >= " . $giatu;
                        if ($giaden != "" && $giatu == "")
                            $sql = $sql . " sp.giatien <= " . $giaden;
                        if ($giatu != "" && $giaden != "")
                            $sql = $sql . " (sp.giatien BETWEEN " . $giatu . " AND " . $giaden . ")";
                    }
                }
                $sql = $sql . " GROUP BY sp.masp";
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