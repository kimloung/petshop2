<div>
    <h1 class="title-background">
        <span class="title">Tìm kiếm nâng cao</span>
    </h1>

    <div class="container" id="advsearch">
        <form action="" method="get" onSubmit="submitprice()">
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
                    <select name="site" class="luachon">
                        <option value="thucung">Tất cả</option>
                        <option value="cho">Chó</option>
                        <option value="meo">Mèo</option>
                        <option value="ca">Chim</option>
                        <option value="ca">Cá</option>
                        <option value="hamster">Hamster</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="menu" class="luachon">
                        <option value="0">Tất cả</option>
                        <option value="1">Thức ăn</option>
                        <option value="2">Vật dụng</option>
                        <option value="3">Chuồng, giường</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <input type="number" name="pricefrom" id="pricefrom" class="luachon" placeholder="Tối thiểu" min="0" oninput="validity.valid||(value='');">
                    <span class="tieude">-</span>
                    <input type="number" name="priceto" id="priceto" class="luachon" placeholder="Tối đa" min="0" oninput="validity.valid||(value='');">
                </div>
                
                <div class="col-md-2">
                    <input type="submit" value="Tìm kiếm" class="advsearch">
                </div>
            </div>
            <div class="clear"></div>
            <script>
                function submitprice(){
                    var $pricefrom = document.getElementById('pricefrom').value;
                    var $priceto = document.getElementById('priceto').value;
                    if($pricefrom != "" && $priceto != "" && parseInt($pricefrom) > parseInt($priceto))
                    {
                        document.getElementById('pricefrom').value = $priceto;
                        document.getElementById('priceto').value = $pricefrom;
                    }
                }
            </script>
        </form>
    </div>
</div>