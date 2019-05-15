<?php
    require 'DataProvider.php';
?>

<?php
    if (isset($_POST['hoten']) && isset($_POST['ngaysinh'])){
        $sql = "UPDATE taikhoan SET hoten='".$_POST['hoten']."', ngaysinh='".$_POST['ngaysinh']."' WHERE tendangnhap = '" .$_SESSION['username']. "'";
        DataProvider::executeQuery($sql);
        echo "<script type='text/javascript'>alert('Cập nhật thông tin cơ bản thành công!');</script>";
    }
    if (isset($_POST['email']) && isset($_POST['dienthoai'])){
        $sql = "UPDATE taikhoan SET email='".$_POST['email']."', dienthoai='".$_POST['dienthoai']."' WHERE tendangnhap = '" .$_SESSION['username']. "'";
        DataProvider::executeQuery($sql);
        echo "<script type='text/javascript'>alert('Cập nhật thông tin liên lạc thành công!');</script>";
    }
?>

<head><link href="css/thongtin.css" rel="stylesheet" type="text/css"></head>

<div id="thongtincanhan">
    <div class="content">
        <form name="form1" id="thongtin1" method="post">
            <div class="title">
                <h3>Thông tin cơ bản</h3>
                <input type="submit" value="Lưu">
                <input type="reset" value="Hủy" onClick="cancel('thongtin1')">
                <div class="clear"></div>
            </div>
            <div class="thongtin">
                <dl>
                    <dd>Tên đăng nhập</dd>
                    <dd><?php echo $_SESSION['username']?></dd>
                    <div class="clear"></div>
                </dl>
                <dl>
                    <dd>Họ tên</dd>
                    <dd><input type="text" name="hoten" value="<?php echo $_SESSION['name']?>" readonly disabled></dd>
                    <div class="clear"></div>
                </dl>
                <dl>
                    <dd>Ngày sinh</dd>
                    <dd><input type="date" name="ngaysinh" value="<?php echo $_SESSION['ngaysinh']?>" readonly disabled></dd>
                    <div class="clear"></div>
                </dl>
            </div>
        </form>
        <form name="form2" id="thongtin2" method="post">
            <div class="title">
                <h3>Thông tin liên lạc</h3>
                <input type="submit" value="Lưu">
                <input type="reset" value="Hủy" onClick="cancel('thongtin2')">
                <div class="clear"></div>
            </div>
            <div class="thongtin">
                <dl>
                    <dd>Email</dd>
                    <dd><input type="email" name="email" value="<?php echo $_SESSION['email']?>" readonly disabled></dd>
                    <div class="clear"></div>
                </dl>
                <dl>
                    <dd>Số điện thoại</dd>
                    <dd><input type="tel" name="dienthoai" value="0<?php echo $_SESSION['sdt']?>" readonly disabled></dd>
                    <div class="clear"></div>
                </dl>
            </div>
        </form>
        <div class="title" style="margin-left: 30%">
            <h3>Lịch sử mua hàng</h3>
            <a href="index.php?site=lichsumuahang" class="edit">Chi tiết</a>
        </div>
    </div>
</div>

<script>
    function edit(id)
    {
        var a=document.getElementById(id).getElementsByTagName('a');
        var inputs=document.getElementById(id).getElementsByTagName('input');
        var selects=document.getElementById(id).getElementsByTagName('select');
        var textareas=document.getElementById(id).getElementsByTagName('textarea');
        for(i=0;i<a.length;i++){
            a[i].style.display="none";
        }
        inputs[0].style.display="block";
        inputs[1].style.display="block";
        for(i=2;i<inputs.length;i++){
            inputs[i].disabled=false;
            inputs[i].readOnly=false;
        }
        for(i=0;i<selects.length;i++){
            selects[i].disabled=false;
            selects[i].readOnly=false;
        } 
        for(i=0;i<textareas.length;i++){
            textareas[i].disabled=false;
            textareas[i].readOnly=false;
        }
    }
    
    function cancel(id)
    {
        var a=document.getElementById(id).getElementsByTagName('a');
        var inputs=document.getElementById(id).getElementsByTagName('input');
        var selects=document.getElementById(id).getElementsByTagName('select');
        var textareas=document.getElementById(id).getElementsByTagName('textarea');
        for(i=0;i<a.length;i++){
            a[i].style.display="inline-block";
        }
        inputs[0].style.display="none";
        inputs[1].style.display="none";
        for(i=2;i<inputs.length;i++){
            inputs[i].disabled=true;
            inputs[i].readOnly=true;
        }
        for(i=0;i<selects.length;i++){
            selects[i].disabled=true;
            selects[i].readOnly=true;
        } 
        for(i=0;i<textareas.length;i++){
            textareas[i].disabled=true;
            textareas[i].readOnly=true;
        }  
    }
</script>