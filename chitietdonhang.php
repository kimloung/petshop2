<?php
    require 'DataProvider.php';
    require 'ProductsPerPage.inc';
?>

<table id="table-dh" cellpadding="10px" cellspacing="0">
    <caption><span class="table-caption"><h1>MÃ HÓA ĐƠN: <?php if(isset($_GET['mahd'])) echo $_GET['mahd'] ?></h1></span></caption>
    <thead>
        <tr style="background-color: #222; color: #f5f5f5; text-align: center;font-size: 20px;font-weight: bold">
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá tiền</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(isset($_GET['mahd']))
            {
                $sql = "SELECT cthd.*, sp.tensp FROM chitiethoadon AS cthd JOIN sanpham AS sp ON cthd.masp = sp.masp WHERE mahd='".$_GET['mahd']."'";
                $sql = $sql . " LIMIT $offset, $productsPerPage";
                $result = DataProvider::executeQuery($sql);
                while ($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "  <td>" .$row["masp"]. "</td>";
                    echo "  <td>" .$row["tensp"]. "</td>";
                    echo "  <td>" .$row["giatien"]. "</td>";
                    echo "  <td>" .$row["soluong"]. "</td>";
                    echo "  <td>" .$row["thanhtien"]. "</td>";
                    echo "<tr>";
                }
            }
        ?>
    </tbody>
</table>
<div style="clear:both"></div>
