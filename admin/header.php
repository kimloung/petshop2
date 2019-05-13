<div class="header" id="Header">
    <div class="logo collapse" id="hlogo"><img src="images/logo3.png" height="100%"></div>
    <div class="menubtn"><button data-toggle="collapse" data-target="#MENU, #hlogo" onClick="changewidth()"><i class="fas fa-bars"></i></button></div>
    <div class="thongtindangnhap dropdown" data-toggle="dropdown">
        <div class="avatar"><img src="images/anhdaidien/no-avatar.png" width="45px" height="45px"></div>
        <div class="tennv">
            Xin chào,<br>
            <strong>Đỗ Tường Đại </strong><i class="fas fa-angle-down"></i>
        </div>
        <div class="dropdown-menu">
            <a href="thongtincanhan.php" class="dropdown-item" onClick="ttcn()"><i class="fa fa-id-card"></i> Thông tin cá nhân</a>
            <a href="/petshop/admin" class="dropdown-item" onClick="signout()"><i class="fas fa-power-off"></i> Đăng xuất</a>
        </div>
    </div>
</div>
<script>
    function changewidth(){
        var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        if(document.getElementById("Header").style.left === "0px" && width >= 600){
            document.getElementById("Header").style.left = "250px";
            document.getElementById("Main").style.marginLeft = "250px";
        }
        else{
            document.getElementById("Header").style.left = 0;
            document.getElementById("Main").style.marginLeft = 0;
        }
    }
    
    function ttcn(){
        location.href = 'thongtincanhan.php';
    }
    
    function signout(){
        location.href = 'index.php';
    }
</script>