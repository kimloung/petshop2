<div class="header" id="Header">
    <div class="logo collapse" id="hlogo"><img src="images/logo3.png" height="100%"></div>
    <div class="menubtn"><button data-toggle="collapse" data-target="#MENU, #hlogo" onClick="changewidth()"><i class="fas fa-bars"></i></button></div>
    <div class="thongtindangnhap dropdown" data-toggle="dropdown">
        <div class="avatar"><i class='fas fa-user-tie'></i></div>
        <div class="tennv">
            Xin chào,<br>
            <strong><?php echo $_SESSION['managerusername'] ?> </strong><i class="fas fa-angle-down"></i>
        </div>
        <div class="dropdown-menu">
            <a href="thongtincanhan.php" class="dropdown-item" onClick="ttcn()" style="font-weight: bold"><i class="fa fa-id-card"></i> Thông tin cá nhân</a>
            <a href="/petshop/admin" style="cursor: pointer" class="dropdown-item" onClick="signout()">
                <form method="post" action="xulytaikhoan.php" style="color: white; font-weight: bold; padding: 0" id="dangxuat" name="dangxuat">
                    <input type="hidden" name="btnlogout" value="btnlogout">
                    <i class="fas fa-power-off"></i><input type="submit" value="Đăng xuất" style="background-color: transparent; border: none; color: white; font-weight: bold">
                </form>
            </a>
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
        document.getElementById('dangxuat').submit();
    }
</script>