<?php
    require '../DataProvider.php';
    require '../ProductsPerPage.inc';
?>

<div class="them-sp" align="center"><button onclick="popup_themsp()">Thêm Sản Phẩm</button></div>
<table id="table-sp" cellpadding="10px" cellspacing="0">
    <caption><span class="table-caption"><h1>Quản lí sản phẩm</h1></span></caption>

    <thead>
        <tr style="background-color: #222; color: #f5f5f5; text-align: center;font-size: 20px;font-weight: bold">
            <th>Hình ảnh</th>
            <th>Mã</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM sanpham";
            $sql = $sql . " LIMIT $offset, $productsPerPage";
            $result = DataProvider::executeQuery($sql);
            $color=0;
            while ($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
				echo "  <td><img src='../images/sanpham/". $row["hinhanh"] ."' width='110px'></td>";
                echo "  <td>" .$row["masp"]. "</td>";
                echo "  <td>" .$row["tensp"]. "</td>";
                echo "  <td>" .$row["giatien"]. "</td>";
                echo "  <td>" .$row["mota"]. "</td>";
                echo "  <td>";
                echo "      <button class='xoa_sp'>Xóa</button><br>";
                echo "      <button class='sua_sp'>Sửa</button>";
                echo "  </td>";
                echo "<tr>";
            }
        ?>
    </tbody>
</table>

<div style="clear: both"></div>
<!-- popup thêm sp -->
<div class="popup-themsp">
    <div class="popup-themsp__content">
        <div class="popup-themsp__title">Thêm Sản Phẩm</div>
        <div class="popup-themsp-left">
            <div class="popup-themsp-left__label">Nhập Mã sản phẩm</div>
            <div class="popup-themsp-left__label">Nhập tên sản phẩm</div>
            <div class="popup-themsp-left__label">Nhập giá</div>
            <div class="popup-themsp-left__label">Chọn Hình</div>
            <div class="popup-themsp-left__label">Hiển Thị</div>
        </div>
        <div class="popup-themsp-right">
            <div class="popup-themsp-left__input"><input class="them-thu-tu them-mot-sp" type="text" placeholder="Mã sản phẩm"></div>
            <div class="popup-themsp-left__input"><input class="them-ten them-mot-sp" type="text" placeholder="Tên sản phẩm"></div>
            <div class="popup-themsp-left__input"><input class="them-gia them-mot-sp" type="text" placeholder="Giá"></div>
            <div class="popup-themsp-left__input"><input class="them-hinh them-mot-sp" type="file"></div>
            <div class="popup-themsp-left__input">
                <select  width="30" class="them-mot-sp">
                    <option>on</option>
                    <option>off</option>
                </select>
            </div>
        </div>
        <button class="popup-themsp__btn" onclick="them_mot_sp()">Thêm</button>
        <span class="back" onclick="close_popup_themsp()">&times;</span>
    </div>
</div>
<!-- popup sửa sp -->
 <div class="popup-themsp">
    <div class="popup-themsp__content">
        <div class="popup-themsp__title">Sửa Sản Phẩm</div>
        <div class="popup-themsp-left">
            <div class="popup-themsp-left__label">STT</div>
             <div class="popup-themsp-left__label">Mã sản phẩm</div>
            <div class="popup-themsp-left__label">Tên sản phẩm</div>
            <div class="popup-themsp-left__label">Giá</div>

            <div class="popup-themsp-left__label">Hình ảnh</div>
            <div class="popup-themsp-left__label">Hiển thị</div>
        </div>
        <div class="popup-themsp-right">
             <div class="popup-themsp-left__input"><input class="them-thu-tu sua-sp" type="text" placeholder="Thứ tự"></div>
            <div class="popup-themsp-left__input"><input class="them-stt sua-sp" type="text" placeholder="Mã sản phẩm"></div>
            <div class="popup-themsp-left__input"><input class="them-ten sua-sp" type="text" placeholder="Tên sản phẩm"></div>
            <div class="popup-themsp-left__input"><input class="them-gia sua-sp" type="text" placeholder="Giá sản phẩm"></div>

            <div class="popup-themsp-left__input"><input class="them-hinh sua-sp" type="file"></div>
            <div class="popup-themsp-left__input">
                <select  width="30" class="sua-sp">
                    <option>on</option>
                    <option>off</option>
                </select>
            </div>
        </div>
        <button class="popup-themsp__btn" onclick="sua_thong_tin_sp()">Sửa</button>
        <span class="back" onclick="close_popup_themsp()">&times;</span>
        <img src="images/avata.jpg" class="sua-hinh" style="width: 100px; height: 75px; margin-top: 12px">
    </div>
</div>

<script>window.onload=them_xoa_sp()</script>