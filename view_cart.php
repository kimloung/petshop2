<div class="section-container content-section">
    <div class="section-header">
        <span class="section-header-title">GIỎ HÀNG</span>
        <button class="continue-button" onClick="window.history.back()">Tiếp tục mua hàng?</button>
    </div>

    <div style="clear:both"></div>

<?php
    if (isset($_SESSION["products"]) && count($_SESSION["products"])>0) {
?>
    <form class="form_purchase" onSubmit="return dangky()">
    <div class="cart-row">
        <span class="cart-column cart-item cart-header">SẢN PHẨM</span>
        <span class="cart-column cart-price cart-header">ĐƠN GIÁ</span>
        <span class="cart-column cart-quantity cart-header">SỐ LƯỢNG</span>
        <span class="cart-column cart-header cart-sub-total">THÀNH TIỀN</span>
    </div>

    <div class="cart-items">
    <?php
        $total = 0;
        foreach ($_SESSION['products'] as $product) {
            $tensp = $product["tensp"];
            $giatien = $product["giatien"];
            $masp = $product["masp"];
            $soluong = $product["soluong"];
            $hinhanh = $product["hinhanh"];
            $thanhtien = ($giatien * $soluong);
            $total = ($total + $thanhtien);
        
    ?>
        <div class="cart-row">
            <div class="cart-item cart-column">
                <img class="cart-item-image" src="images/sanpham/<?php echo $hinhanh ?>" width="100" height="100"  onerror=\"this.src='../images/sanpham/No_image_available.png'\">
                <span class="cart-item-title"><?php echo $tensp; ?></span>
            </div>

            <span class="cart-price cart-column"><span class="cost"><?php echo number_format($giatien, 0, ',', '.'); ?></span></span>

            <div class="cart-quantity cart-column">
                <input data-code="<?php echo $masp; ?>" class="cart-quantity-input" type="number" value="<?php echo $soluong; ?>" min="1" oninput="validity.valid||(value='')">
                <a href="#" class="btn btn-danger remove-products-cart" data-code="<?php echo $masp; ?>">XÓA</a>
            </div>

            <div class="cart-column cart-sub-total"><span class="cost"><?php echo number_format($thanhtien, 0, ',', '.'); ?><span></div>
        </div>
        
    <?php } ?>
    </div>
<?php } ?>
<?php
    if (isset($total)) {
?>
    <div class="cart-total">
        <strong class="cart-total-title">Tổng: </strong>
        <span class="cart-total-price"><?php echo number_format($total, 0, ',', '.'); ?>đ</span>
    </div>
    <input type="hidden" name="order" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>">
    <input type="hidden" name="ngaythanhtoan" value="<?php echo date('Y').'/'.date('m').'/'.date('d'); ?>">
    <input type="hidden" name="tongtien" value="<?php echo $total ?>">
    <button type="submit" class="btn btn-primary btn-purchase">THANH TOÁN</button>
    </form>
<?php } else {?>
    <center>
        <img src="images/emptycart.png" width="550px" height="400px">
    </center>
<?php }?>

</div>
        
<script>
    function dangky()
    {
        var OK = 0;
        <?php
            if(isset($_SESSION['IsLogin']))
                if($_SESSION['IsLogin'] == 1)
                    echo "OK = 1;";
        ?>
        if(OK == 0)
        {
            alert("Bạn chưa đăng nhập!!!");
            return false;
        }
        else
            return true;
    }
</script>