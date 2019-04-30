<?php
    require 'DataProvider.php';
    require 'ProductsPerPage.inc';
    $key = $_REQUEST["key"];
    $sql = "SELECT sp.*, GROUP_CONCAT(sdt.madv) AS madv, sdt.matl, km.giakhuyenmai FROM sanpham as sp JOIN sp_dv_tl as sdt ON sp.masp = sdt.masp LEFT JOIN spkhuyenmai AS km ON sp.masp = km.masp WHERE BINARY UPPER(sp.masp) LIKE UPPER('%".$key."%') OR BINARY UPPER(sp.tensp) LIKE UPPER('%".$key."%') OR BINARY UPPER(sp.mota) LIKE UPPER('%".$key."%') GROUP BY sp.masp";
    if(isset($_GET['thucung']) || isset($_GET['theloai']) || isset($_GET['giatu']) || isset($_GET['giaden'])){
        $where = " WHERE ";
        $testwhere=1;
        if($_GET['thucung'] != "all"){
            $where = $where."madv LIKE '%".$_GET['thucung']."%'";
            $testwhere=0;
        }
        if($_GET['theloai'] != "all" && $testwhere == 1){
            $where = $where."matl LIKE '%".$_GET['theloai']."%'";
            $testwhere=0;
        }
        else if($_GET['theloai'] != "all" && $testwhere == 0){
            $where = $where." AND matl LIKE '%".$_GET['theloai']."%'";
        }
        if($testwhere == 1){
            $where = $where."giatien BETWEEN ".$_GET['giatu']." AND ".$_GET['giaden'];
            $testwhere=0;
        }
        else if($testwhere == 0){
            $where = $where."AND giatien BETWEEN ".$_GET['giatu']." AND ".$_GET['giaden'];
        }
        $sql = "SELECT * FROM (".$sql.") AS f".$where;
    }
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
                    $sqlcount = "SELECT COUNT(*) AS numproducts FROM (".$sql.") AS c";
                }
                $result = DataProvider::executeQuery($sqlcount);
                $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $numproducts = $product['numproducts'];
                $kq = "$numproducts sản phẩm";
                echo $kq;
            ?>
        </span>
    </h1>
     <div class="container">
         <div class="timkiemnangcao">
            <form method="get" onSubmit="return submitprice()" action="index.php">
                <input type='hidden' name="site" value="timkiem" />
                <input type='hidden' name="key" value="<?php echo $key ?>" />
                <div class="luachon">
                    <span><strong>Thú cưng: </strong></span>
                    <select name="thucung">
                        <option value="all" selected>[Chọn thú cưng]</option>
                        <option value="dog">Chó</option>
                        <option value="cat">Mèo</option>
                        <option value="bird">Chim</option>
                        <option value="fish">Cá</option>
                        <option value="hamster">Hamster</option>
                    </select>
                </div>
                <div class="luachon">
                    <span><strong>Thể loại: </strong></span>
                    <select name="theloai">
                        <option value="all" selected>[Chọn thể loại]</option>
                        <option value="food">Thức ăn</option>
                        <option value="stuff">Vật dụng</option>
                        <option value="bed">Chuồng, giường</option>
                    </select>
                </div>
                <div class="luachon">
                    <?php
                        $sqlmaxprice = "SELECT MAX(giatien) as price FROM (".$sql.") AS m";
                        $result = DataProvider::executeQuery($sqlmaxprice);
                        $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $maxprice = $product['price'];
                    ?>
                    <span><strong>Giá tiền: </strong></span>
                    <input type="number" name="giatu" id="giatu" class="selectprice" placeholder="Tối thiểu" min="0" oninput="validity.valid||(value='');">
                    <span><strong>-</strong></span>
                    <input type="number" name="giaden" id="giaden" class="selectprice" placeholder="Tối đa" min="0" oninput="validity.valid||(value='');">
                </div>
                <div class="luachon">
                    <input type="submit" value="Tìm kiếm">
                </div>
            </form>
            <script>
                function submitprice(){
                    document.getElementById("giatu").defaultValue = 0;
                    document.getElementById("giaden").defaultValue = <?php echo $maxprice ?>;
                }
            </script>
            <div class="clear"></div>
         </div>
         <div id="sp">
             <?php
                if($numproducts == 0){
                    echo "<center>";
                    echo "     <img src='images/background/nofound.png'>";
                    echo "     <span>";
                    echo "         <br><strong>Ôi không!</strong><br>";
                    echo "         Có vẻ như chú chó này đã lấy mất tất cả sản phẩm bạn mà tìm kiếm.<br>";
                    echo "         Trừ khi bạn đang tìm kiếm chú chó đáng yêu này. Chúc mừng! Bạn đã tìm thấy nó.<br>";
                    echo "         <a href='#' onClick=\"Dua_len_dau(); document.getElementById('searchcontent').focus();\">Tìm kiếm với từ khóa khác &raquo;</a><br>";
                    echo "     </span>";
                    echo "</center>";
                }
             ?>
             <?php
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