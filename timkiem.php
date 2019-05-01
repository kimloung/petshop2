<?php
    require 'DataProvider.php';
    require 'ProductsPerPage.inc';
    $key = $_REQUEST["key"];
    $sql = "SELECT sp.*, GROUP_CONCAT(sdt.madv) AS madv, sdt.matl, km.giakhuyenmai FROM sanpham as sp JOIN sp_dv_tl as sdt ON sp.masp = sdt.masp LEFT JOIN spkhuyenmai AS km ON sp.masp = km.masp WHERE BINARY UPPER(sp.masp) LIKE UPPER('%".$key."%') OR BINARY UPPER(sp.tensp) LIKE UPPER('%".$key."%') OR BINARY UPPER(sp.mota) LIKE UPPER('%".$key."%') GROUP BY sp.masp";
    if(isset($_GET['thucung']) || isset($_GET['danhmuc']) || isset($_GET['giatu']) || isset($_GET['giaden'])){
        $where = " WHERE ";
        $testwhere=1;
        if($_GET['thucung'] != "all"){
            $where = $where."madv LIKE '%".$_GET['thucung']."%'";
            $testwhere=0;
        }
        if($_GET['danhmuc'] != "all" && $testwhere == 1){
            $where = $where."matl LIKE '%".$_GET['theloai']."%'";
            $testwhere=0;
        }
        else if($_GET['danhmuc'] != "all" && $testwhere == 0){
            $where = $where." AND matl LIKE '%".$_GET['theloai']."%'";
        }
        $giatu = $_GET['giatu'];
        $giaden = $_GET['giaden'];
        if($testwhere == 1){
            if($giatu != "" || $giaden != ""){
                if ($giatu != "" && $giaden == "")
                    $where = $where."giatien >= ".$giatu;
                if ($giaden != "" && $giatu == "")
                    $where = $where . " giatien <= " . $giaden;
                if ($giatu != "" && $giaden != "")
                    $where = $where . " (giatien BETWEEN " . $giatu . " AND " . $giaden . ")";
            }
            $testwhere=0;
        }
        else if($testwhere == 0){
            if($giatu != "" || $giaden != ""){
                if ($giatu != "" && $giaden == "")
                    $where = $where." AND giatien >= ".$giatu;
                if ($giaden != "" && $giatu == "")
                    $where = $where . " AND giatien <= " . $giaden;
                if ($giatu != "" && $giaden != "")
                    $where = $where . " AND (giatien BETWEEN " . $giatu . " AND " . $giaden . ")";
            }
        }
        $sql = "SELECT * FROM (".$sql.") AS f".$where;
    }
?>

<div>
    <h1 class="title-background">
        <span class="title">Tìm kiếm nâng cao</span>
    </h1>

    <div class="container" id="advsearch">
        <form action="index.php" method="get" onSubmit="submitprice()">
            <input type='hidden' name="site" value="timkiem" />
            <input type='hidden' name="key" value="<?php echo $key ?>" />
            <div class="row">
                <div class="col-md-3">
                    <span class="tieude">Thú cưng</span>
                </div>

                <div class="col-md-3">
                    <span class="tieude">Danh mục</span>
                </div>

                <div class="col-md-4">
                    <span class="tieude">Giá tiền</span>
                </div>

                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <select name="thucung" class="luachon">
                        <option value="all">Tất cả</option>
                        <option value="dog">Chó</option>
                        <option value="cat">Mèo</option>
                        <option value="bird">Chim</option>
                        <option value="fish">Cá</option>
                        <option value="hamster">Hamster</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="danhmuc" class="luachon">
                        <option value="all">Tất cả</option>
                        <option value="food">Thức ăn</option>
                        <option value="stuff">Vật dụng</option>
                        <option value="bed">Chuồng, giường</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <input type="number" name="giatu" id="giatu" class="luachon" placeholder="Tối thiểu" min="0" oninput="validity.valid||(value='');">
                    <span class="tieude">-</span>
                    <input type="number" name="giaden" id="giaden" class="luachon" placeholder="Tối đa" min="0" oninput="validity.valid||(value='');">
                </div>
                
                <div class="col-md-2">
                    <input type="submit" value="Tìm kiếm" class="advsearch">
                </div>
            </div>
            <div class="clear"></div>
            <script>
                function submitprice(){
                    var $pricefrom = document.getElementById('giatu').value;
                    var $priceto = document.getElementById('giaden').value;
                    if($pricefrom != "" && $priceto != "" && parseInt($pricefrom) > parseInt($priceto))
                    {
                        document.getElementById('giatu').value = $priceto;
                        document.getElementById('giaden').value = $pricefrom;
                    }
                }
            </script>
        </form>
    </div>
</div>

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
                $sqlcount = "SELECT COUNT(*) AS numproducts FROM (".$sql.") AS c";
                $result = DataProvider::executeQuery($sqlcount);
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