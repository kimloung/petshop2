<?php
    require '../DataProvider.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/logo/petshop.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/ScrollOnTop.css" rel="stylesheet" type="text/css" />
    <link href="css/Menu.css" rel="stylesheet" type="text/css" />
    <link href="css/header.css" rel="stylesheet" type="text/css" />
    <link href='css/thongke.css' rel='stylesheet' type='text/css' />
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../js/Scroll_on_Top.js"></script>
    <script src="js/sp.js"></script>
<title>Admin area</title>
<style>
* {
    box-sizing:border-box;
    -moz-box-sizing:border-box;
    -webkit-box-sizing:border-box;	
}

::-webkit-scrollbar {
    width:5px;	
}

::-webkit-scrollbar-thumb {
    background:lightpink;
    border-radius:20px;	
}
    
html {
 	scroll-behavior: smooth;
}

body {
	margin:0;
    padding: 0;
    background-color: #ebebeb;
}

html, body { 
    cursor:url('http://www.snazzyspace.com/cursorsfolder/dog-paw.png'), auto; 
}
    
@media only screen and (max-width: 476px){
    .admin-logo{
        width: 476px;
    }
    
    .main{
        width: 476px;
    }
}    
</style>
</head>

<body>
<?php
    include('../ScrollOnTop.php');
?>
    
<?php
    include("menu.php");
?>

<?php
    include("header.php");
?>

<div class="main" id="Main">
    <div class="row">
        <div class="muc sanpham">
            <div class="muc-soluong">
                <?php
                    $sql = "SELECT COUNT(*) AS numproducts FROM sanpham";
                    $result = DataProvider::executeQuery($sql);
                    $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $numproducts = $product['numproducts'];
                    echo $numproducts;
                ?>
            </div>
            <div class="muc-icon"><i class="fas fa-boxes"></i></div>
            <div style="clear: both"></div>
            <div class="muc-tieude">Sản phẩm đã bán</div>
        </div>
        <div class="muc khachhang">
            <div class="muc-soluong">
                <?php
                    $sql = "SELECT COUNT(*) AS numproducts FROM taikhoan WHERE mavt='customer'";
                    $result = DataProvider::executeQuery($sql);
                    $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $numproducts = $product['numproducts'];
                    echo $numproducts;
                ?>
            </div>
            <div class="muc-icon"><i class="fas fa-money-bill-wave"></i></div>
            <div style="clear: both"></div>
            <div class="muc-tieude">Tổng doanh thu</div>	
        </div>
        <div class="muc donhang">
            <div class="muc-soluong">
                <?php
                    $sql = "SELECT COUNT(*) AS numproducts FROM hoadon";
                    $result = DataProvider::executeQuery($sql);
                    $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $numproducts = $product['numproducts'];
                    echo $numproducts;
                ?>
            </div>
            <div class="muc-icon"><i class="fas fa-people-carry"></i></div>
            <div style="clear: both"></div>
            <div class="muc-tieude">Đơn đặt hàng hôm nay</div>
        </div>
    </div>
    <div style="clear: both"></div>
    
    <div id="thucung" class="bieudo left"></div>
    
    <div id="danhmuc" class="bieudo"></div>
    
    <div id="donhang" class="bieudo right"></div>

    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        <?php
            $sql = "SELECT COUNT(*) AS numproducts FROM sanpham AS sp JOIN sp_dv_tl AS sdt ON sp.masp = sdt.masp WHERE madv = 'dog'";
            $result = DataProvider::executeQuery($sql);
            $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $cho = $product['numproducts'];
            $sql = "SELECT COUNT(*) AS numproducts FROM sanpham AS sp JOIN sp_dv_tl AS sdt ON sp.masp = sdt.masp WHERE madv = 'cat'";
            $result = DataProvider::executeQuery($sql);
            $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $meo = $product['numproducts'];
            $sql = "SELECT COUNT(*) AS numproducts FROM sanpham AS sp JOIN sp_dv_tl AS sdt ON sp.masp = sdt.masp WHERE madv = 'bird'";
            $result = DataProvider::executeQuery($sql);
            $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $chim = $product['numproducts'];
            $sql = "SELECT COUNT(*) AS numproducts FROM sanpham AS sp JOIN sp_dv_tl AS sdt ON sp.masp = sdt.masp WHERE madv = 'fish'";
            $result = DataProvider::executeQuery($sql);
            $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $ca = $product['numproducts'];
            $sql = "SELECT COUNT(*) AS numproducts FROM sanpham AS sp JOIN sp_dv_tl AS sdt ON sp.masp = sdt.masp WHERE madv = 'hamster'";
            $result = DataProvider::executeQuery($sql);
            $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $hamster = $product['numproducts'];
            $sql = "SELECT COUNT(*) AS numproducts FROM sanpham AS sp JOIN sp_dv_tl AS sdt ON sp.masp = sdt.masp WHERE matl = 'food'";
            $result = DataProvider::executeQuery($sql);
            $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $food = $product['numproducts'];
            $sql = "SELECT COUNT(*) AS numproducts FROM sanpham AS sp JOIN sp_dv_tl AS sdt ON sp.masp = sdt.masp WHERE matl = 'stuff'";
            $result = DataProvider::executeQuery($sql);
            $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $stuff = $product['numproducts'];
            $sql = "SELECT COUNT(*) AS numproducts FROM sanpham AS sp JOIN sp_dv_tl AS sdt ON sp.masp = sdt.masp WHERE matl = 'bed'";
            $result = DataProvider::executeQuery($sql);
            $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $bed = $product['numproducts'];
        ?>
        function drawChart() {
            var data1 = google.visualization.arrayToDataTable([
                ['Task','Hours per Day'],
                ['Chó', <?php echo $cho?>],
                ['Mèo', <?php echo $meo?>],
                ['Chim', <?php echo $chim?>],
                ['Cá', <?php echo $ca?>],
                ['Hamster', <?php echo $hamster?>]
            ]);

            var data2 = google.visualization.arrayToDataTable([
                ['Task','Hours per Day'],
                ['Thức ăn', <?php echo $food?>],
                ['Vật dụng', <?php echo $stuff?>],
                ['Giường, chuồng', <?php echo $bed?>]
            ]);
            
            var data3 = google.visualization.arrayToDataTable([
                ['Task','Hours per Day'],
                ['Đã hủy', 35349],
                ['Đã hoàn tất', 142648],
                ['Thất bại', 35784],
                ['Đang tiến hành', 164051],
                ['Đã trả lại hàng/đã hoàn tiền', 61582]
            ]);

            // Optional; add a title and set the width and height of the chart
            var options1 = {
                title : 'Số sản phẩm bán được (theo thú cưng)',
                width : 550,
                height : 500,
                backgroundColor : '#fff',
                fontSize : 17
            };

            var options2 = {
                title : 'Số sản phẩm bán được (theo danh mục)',
                width : 550,
                height : 500,
                backgroundColor : '#fff',
                fontSize : 17
            };
            
            var options3 = {
                title : 'Tình trạng hóa đơn',
                width : 550,
                height : 500,
                backgroundColor : '#fff',
                fontSize : 17
            };
            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('thucung'));
            chart.draw(data1, options1);

            var chart = new google.visualization.PieChart(document.getElementById('danhmuc'));
            chart.draw(data2, options2);
            
            var chart = new google.visualization.PieChart(document.getElementById('donhang'));
            chart.draw(data3, options3);
        }
    </script>
</div>
</body>
</html>