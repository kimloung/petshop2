<html>
<head>
	<title>Shopping Cart</title>
</head>
<style type="text/css">
.content-section {
	overflow:auto;
	padding: 16px 60px;
	background-image: url("images/background/depositphotos_94498758-stock-illustration-pet-shop-background.jpg");
	background-position: top;
	background-repeat: no-repeat;
	background-size:cover;
	height: 100%;
}

.section-header {
	width: 100%;
	padding: 20px;
}

.section-header-title {
	font-size: 40px;
	font-weight: bolder;
	padding:20px 50px;
	color:yellow;
}

.continue-button {
	position: absolute;
	padding:13px;
	border-radius: 15px;
	border:none;
	cursor:pointer;
	right:100px;
	font-size: 20px;
	font-weight: bold;
	outline: none;
	background-color: lightyellow;
	color:green;
}

.btn {
	text-align: center;
	vertical-align: middle;
	padding: 25px 25px;
	cursor: pointer;
}

.btn-primary {
	color: white;
	background: #56CCF2;
	border: none;
	border-radius: 10px;
	font-weight: bold;
}

.btn-primary:hover {
	opacity: 0.8;
}

.btn-danger {
	color: white;
	background-color: #EB5757;
	border: none;
	border-radius: 4.8px;
	font-weight: bold;
	padding: 10px;
}

.btn-danger:hover {
	background-color: #CC4C4C;
}

.btn-purchase {
	display: block;
	margin: 30px 20px 80px auto;
	font-size: 28px;
	outline: none;
}

.cart-header {
	font-weight: bold;
	font-size: 20px;
}

.cart-column {
	display:flex;
	align-items: center;
	border-bottom: 1px solid black;
	margin-right: 24px;
	padding-bottom: 10px;
	margin-top:10px;
	color:deeppink;
	font-size: 30px;
}

.cart-row {
	display:flex;
}

.cart-item {
	width:40%;
}

.cart-price {
	width:20%;
}

.cart-quantity {
	width: 15%;
}
    
.cart-sub-total{
    width: 25%;
    color: red;
}

.cart-item-title {
	color:blue;
	margin-left:8px;
	font-size:24px;
}

.cart-item-image {
	width: 75px;
	height: auto;
	border-radius:10px;
}

.cart-quantity-input {
	width: 50px;
	border-radius: 5px;
	border: 1px solid #56CCF2;
	background-color: #eee;
	color: #333;
	padding:0;
	text-align:center;
	font-size:19.2px;
	margin-right:25px;
}

.cart-row:last-child .cart-column:last-child {
	border-bottom: 1px solid black;
}

.cart-row:last-child {
	border: none;
}

.cart-total {
	text-align: right;
	margin-top: 10px;
	margin-right: 25px;
	color: darkblue;
}

.cart-total-title {
	font-weight: bold;
	font-size: 28px;
	margin-right: 20px;
}

.cart-total-price {
	font-size: 22px;
}

.clear {
	clear:both;
}
    
@media only screen and (max-width: 1200px){
    .cart-header {
        font-size: 130%;
    }
    
    .btn-danger {
        padding: 5px;
    }
    
    .cart-quantity-input{
        width: 30px;
        margin-right: 10px;
    }
}

@media only screen and (max-width: 600px){
    .btn{
        padding: 10px 10px;
    }
    
    .btn-danger {
        padding: 3px;
        font-size: 10px;
    }
    
    .content-section {
        padding: 0;
    }
    
    .cart-header {
        font-size: 100%;
    }
    
    .cart-price{
        font-size: 100%;
    }
    
    .cart-quantity-input{
        width: 25px;
        margin-right: 5px;
    }
    
    .cart-sub-total{
        font-size: 100%;
    }
    
    .section-header-title{
        padding: 0;
    }
    .continue-button {
        padding: 10px;
        right: 50px;
        top: 190%;
    }
}
</style>

<script type="text/javascript">
	function purchaseClicked() {
        var taikhoan = 0;
        if (localStorage.getItem('Tài khoản')) taikhoan = 1;
        if(taikhoan == 1)
        {
            var tk = JSON.parse(localStorage.getItem('Tài khoản'));
            if(tk.Trang_Thai == 0)
            {
                alert('Vui lòng đăng nhập để thanh toán!');
                return false;
            }
            else if(tk.Trang_Thai == 1){
                var so_sp = localStorage.length;
                if (localStorage.getItem('Tài khoản')) so_sp--;
                if(confirm('Xác nhận đặt hàng!')){
                    alert('Cảm ơn quý khách đã đặt hàng');
                    var cartItems = document.getElementsByClassName('cart-items')[0];
                    for(var i = 0; i < so_sp; i++)
                    {
                        localStorage.removeItem('item'+i);
                    }
                    while(cartItems.hasChildNodes()){
                        cartItems.removeChild(cartItems.firstChild);
                    }
                    window.location.reload();
                }
            }
        }
        else if(taikhoan == 0)
        {
            alert('Vui lòng đăng nhập để thanh toán!');
            return false;
        }
	}
</script>

<body>
<div class="clear" style="padding-bottom: 30px"></div>
	
	<div class="section-container content-section">
		<div class="section-header">
			<span class="section-header-title">GIỎ HÀNG</span>
			<button class="continue-button" onClick="window.history.back()">Tiếp tục mua hàng?</button>
		</div>

		<div style="clear:both"></div>

		<div class="cart-row">
			<span class="cart-item cart-header cart-column">SẢN PHẨM</span>
			<span class="cart-price cart-header cart-column" style="color:deeppink">ĐƠN GIÁ</span>
			<span class="cart-quantity cart-header cart-column">SỐ LƯỢNG</span>
            <span class="cart-sub-total cart-header cart-column">THÀNH TIỀN</span>
		</div>

		<div class="cart-items">
            
		</div>

		<div class="cart-total">
			<strong class="cart-total-title">Tổng: </strong>
			<span class="cart-total-price">0đ</span>
		</div>
        
		<button class="btn btn-primary btn-purchase" onClick="purchaseClicked()">THANH TOÁN</button>
	</div>
	<script>window.onLoad=shopcart()</script>
</body>
</html>