﻿$(document).ready(function() {
    $("#form_dangnhap").submit(function(e) {
	var form_data = $(this).serialize();

        $.ajax({
            url: "xulytaikhoan.php",
            method: "POST",
            data: form_data,
            success: function(result) {
                if (result == "1") {
                    alert('Đăng nhập thành công');
                    window.location = 'index.php';
                } else {
                    alert('Tài khoản hoặc mật khẩu không đúng, vui lòng kiểm tra lại !!');
                }
		alert(result);
            }
        });
        e.preventDefault();
    });

    $(".form_purchase").submit(function(e) {
        var form_data = $(this).serialize();
        $.ajax({
            url: "thanhtoan.php",
            method: "POST",
            data: form_data,
            success: function(data) {
                    alert('Cảm ơn bạn đã tin tưởng và mua hàng của PetShop');
                    window.location = 'index.php';
            }
        });
        e.preventDefault();
    });

    //Add to cart
    $(".form_sp").submit(function(e) {
        var form_data = $(this).serialize();
        var btn_content = $(this).find('button[type=submit]');
        btn_content.html('Đang thêm ...');
        $.ajax({
            url: "manage_cart.php",
            method: "POST",
            dataType: "json",
            data: form_data,
            success: function(data) {
                alert("Thêm vào giỏ hàng thành công");
                btn_content.html('Đặt mua ngay');
                /*btn_content.html('Đã thêm');
                btn_content.addClass(" hethang");
                btn_content.prop("disabled", true);*/
            }
        });
        e.preventDefault();
    });

    //Update quantity change
    $(".cart-quantity-input").change(function() {
        var element = this;
        setTimeout(function() {
            update_quantity.call(element);
        }, 1500);
    });

    function update_quantity() {
        var pcode = $(this).attr("data-code");
        var quantity = $(this).val();
        $.getJSON("manage_cart.php", { "update_quantity": pcode, "quantity": quantity }, function(data) {
            window.location.reload();
        });
    }

    //Remove product from cart
    $(".content-section").on('click', 'a.remove-products-cart', function(e) {
        e.preventDefault();
        var pcode = $(this).attr("data-code");
        $.getJSON("manage_cart.php", { "remove_code": pcode }, function(data) {
            window.location.reload();
        });
    });
});
