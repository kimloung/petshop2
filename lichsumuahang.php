<?php
    require 'DataProvider.php';
    require 'ProductsPerPage.inc';
?>

<?php
    if(isset($_POST['suatinhtrang']))
    {
        $sql = "UPDATE hoadon SET trangthai='".$_POST['suatinhtrang']."' WHERE mahd = '" .$_POST['suamahd']. "'";
        DataProvider::executeQuery($sql);
        echo "<script language='javascript'> ;alert('Cập nhật tình trạng hóa đơn thành công!!!');</script>";
    }

    if (isset($_POST['del_id'])){
        
        $sql1="SELECT * FROM chitiethoadon WHERE mahd = '" .$_POST['del_id']. "'";
        $ktspmoi=DataProvider::executeQuery($sql1);
        if(mysqli_num_rows($ktspmoi) >= 1)
        {
            $sql = "DELETE FROM chitiethoadon WHERE mahd = '" .$_POST['del_id']. "'";
            DataProvider::executeQuery($sql);
        }
       $sql = "DELETE FROM hoadon WHERE mahd = '" .$_POST['del_id']. "'";
       DataProvider::executeQuery($sql);
    }
?>

<table id="table-dh" cellpadding="10px" cellspacing="0">
    <caption><span class="table-caption"><h1>Quản lý đơn hàng</h1></span></caption>
    <thead>
        <tr style="background-color: #222; color: #f5f5f5; text-align: center;font-size: 20px;font-weight: bold">
            <th>Mã hóa đơn</th>
            <th>Tên đăng nhập</th>
            <th>Thời gian đặt hàng</th>
            <th>Tổng tiền</th>
            <th>Tình trạng</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM hoadon";
            $sql = $sql . " LIMIT $offset, $productsPerPage";
            $result = DataProvider::executeQuery($sql);
            while ($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "  <td>" .$row["mahd"]. "</td>";
                echo "  <td>" .$row["tendangnhap"]. "</td>";
                echo "  <td>" .$row["ngaydathang"]. "</td>";
                echo "  <td>" .$row["tongtien"]. "</td>";
                echo "  <td>" .$row["trangthai"]. "</td>";
                echo "  <td>";
                echo "  <button class='xem_dh' value='".$row["mahd"]."' onClick='goto(this.value)'>Chi tiết</button>";
                echo "  </td>";
                echo "<tr>";
            }
        ?>
    </tbody>
</table>
<script>
    function goto(mahd)
    {
        location.href = 'index.php?site=chitietdonhang&mahd='+mahd;
    }
</script>
<div style="clear:both"></div>