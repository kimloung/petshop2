<nav class="navbar navbar-expand-sm <?php if(isset($_GET['site'])){ if($_GET['site']!="GioHang"){ echo 'sticky-top';}} ?> justify-content-center">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="/petshop" class="nav-link">Trang chủ</a>
        </li>

        <li class="nav-item">
            <a href="index.php?site=gioithieu" class="nav-link">Giới thiệu</a>
        </li>

        <li class="nav-item dropdown dropdown-first">
            <a href="index.php?site=cho&menu=0&page=1" class="nav-link dropdown-toggle">Shop cho chó</a>
            <div class="dropdown-menu dropdown-menu-first">
                <a href="index.php?site=cho&menu=1&page=1" class="dropdown-item">Thức ăn</a>
                <a href="index.php?site=cho&menu=2&page=1" class="dropdown-item">Vật dụng</a>
                <a href="index.php?site=cho&menu=3&page=1" class="dropdown-item">Chuồng,giường</a>
            </div>
        </li>

        <li class="nav-item dropdown dropdown-first">
            <a href="index.php?site=meo&menu=0&page=1" class="nav-link dropdown-toggle">Shop cho mèo</a>
            <div class="dropdown-menu dropdown-menu-first">
                <a href="index.php?site=meo&menu=1&page=1" class="dropdown-item">Thức ăn</a>
                <a href="index.php?site=meo&menu=2&page=1" class="dropdown-item">Vật dụng</a>
                <a href="index.php?site=meo&menu=3&page=1" class="dropdown-item">Chuồng,giường</a>
            </div>
        </li>

        <li class="nav-item dropdown dropdown-first">
            <a href="index.php?site=dongvatkhac" class="nav-link dropdown-toggle">Shop vật nuôi khác</a>
            <div class="dropdown-menu dropdown-menu-first">
                <div class="dropdown dropdown-item-second dropright dropdown-second">
                    <a href="index.php?site=chim&menu=0&page=1" class="nav-link dropdown-toggle nav-link-second">Shop cho chim</a>
                    <div class="dropdown-menu dropdown-menu-second">
                        <a href="index.php?site=chim&menu=1&page=1" class="dropdown-item">Thức ăn</a>
                        <a href="index.php?site=chim&menu=2&page=1" class="dropdown-item">Vật dụng</a>
                        <a href="index.php?site=chim&menu=3&page=1" class="dropdown-item">Chuồng,lồng</a>
                    </div>
                </div>

                <div class="dropdown dropdown-item-second dropright dropdown-second">
                    <a href="index.php?site=ca&menu=0&page=1" class="nav-link dropdown-toggle nav-link-second">Shop cho cá</a>
                    <div class="dropdown-menu dropdown-menu-second">
                        <a href="index.php?site=ca&menu=1&page=1" class="dropdown-item">Thức ăn</a>
                        <a href="index.php?site=ca&menu=2&page=1" class="dropdown-item">Vật dụng</a>
                        <a href="index.php?site=ca&menu=3&page=1" class="dropdown-item">Bể cá</a>
                    </div>
                </div>

                <div class="dropdown dropdown-item-second dropright dropdown-second">
                    <a href="index.php?site=hamster&menu=0&page=1" class="nav-link dropdown-toggle nav-link-second">Shop cho Hamster</a>
                    <div class="dropdown-menu dropdown-menu-second">
                        <a href="index.php?site=hamster&menu=1&page=1" class="dropdown-item">Thức ăn</a>
                        <a href="index.php?site=hamster&menu=2&page=1" class="dropdown-item">Vật dụng</a>
                        <a href="index.php?site=hamster&menu=3&page=1" class="dropdown-item">Chuồng,lồng</a>
                    </div>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a href="index.php#spgiamgia" class="nav-link">Khuyến mãi</a>
        </li>
    </ul>

    <script>
        $(document).ready(function() {
            $(".dropdown-first").hover(function() {
                $(".dropdown-first:hover .dropdown-menu-first").css("display", "inline-block");
            }, function() {
                $(".dropdown-menu-first").css("display", "none");
            });

            $('.dropdown-second').hover(function() {
                $('.dropdown-second:hover .dropdown-menu-second').css("display", "inline-block");
            }, function() {
                $('.dropdown-menu-second').css("display", "none");
            });
        });
    </script>
</nav>