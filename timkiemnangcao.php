<div>
    <h1 class="title-background">
        <span class="title">Tìm kiếm nâng cao</span>
    </h1>
    <div class="container" id="advsearch">
        <form onsubmit="KTTK()" method="get">
            <div class="row">
                <div class="col-md-3">
                    <span class="tieude">Thú cưng</span>
                </div>

                <div class="col-md-3">
                    <span class="tieude">Danh mục</span>
                </div>

                <div class="col-md-4">
                    <span class="tieude">Giá</span>
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
                        <option value="3">Chuồng</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <input id="giatu" type="number" name="pricefrom" class="luachon" size="13" placeholder="Tối thiểu" min="0" oninput="validity.valid||(value='');">
                    <span class="tieude">đến</span>
                    <input id="giaden" type="number" name="priceto" class="luachon" size="13" placeholder="Tối đa" min="0" oninput="validity.valid||(value='');">
                </div>

                <div class="col-md-2">
                    <input type="submit" value="Tìm kiếm" class="advsearch">
                </div>
            </div>

            <div class="clear"></div>
        </form>
    </div>
    <script>
        function KTTK() {
            var $pricefrom = document.getElementById('giatu').value;
            var $priceto = document.getElementById('giaden').value;
            if($pricefrom != "" && $priceto != "" && parseInt($pricefrom) > parseInt($priceto))
            {
                document.getElementById('giatu').value = $priceto;
                document.getElementById('giaden').value = $pricefrom;
            }
        }
    </script>
</div>