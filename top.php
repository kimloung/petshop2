<div class="Top_dau">
    <div class="container">
    	<span id="signup"><a href="index.php?site=DangKi"><button><i class="fa fa-user-plus"></i> Đăng ký</button></a></span>
        <span id="login"><button onclick="document.getElementById('Phan_dang_nhap').style.display='block'"><i class="fa fa-sign-in-alt"></i> Đăng nhập</button></span>
        <div id="Phan_dang_nhap" class="Khung_dang_nhap">
            <form class="Noi_dung_khung Hoat_canh">
                <div class="Cach_khung">
                    <span class="close" onClick="tatdangnhap()">&times;</span>
                    <img src="images/logo/logo.png" height="75px">
                    <div style="padding-bottom:10px; padding-top: 10px">
                    	<input type="text" placeholder="Tên đăng nhập" id="Ten_dang_nhap" onBlur="KtTen()"/>
                        <div id="Check_Name" style="text-align:left;font-weight:bold;color:red"></div>
                    </div>
                    <div>
                    	<input type="password" placeholder="Mật khẩu" id="Mat_khau" onBlur="KtMK()"/>
                        <div id="Check_Password" style="text-align:left;font-weight:bold;color:red"></div>
                    </div>
                    <span style="float:left;padding:10px">
                        <label><input type="checkbox" id="Nho_mk" checked  />Nhớ mật khẩu</label>
                    </span>
                    <div class="Quen_mat_khau"><a href="#">Quên mật khẩu?</a></div>
                    <button type="submit" onClick="SignIn()"><strong>Đăng nhập</strong></button>
                    <div class="form-separator">
                        <span>hoặc</span>
                    </div>
                    <span class="gotodangky">Chưa có tài khoản? <strong><a href="index.php?site=DangKi">Đăng ký</a></strong></span>
                </div>
            </form>
            
            <script>
				function KtTen() {
					var ten = document.getElementById("Ten_dang_nhap").value;
					if (ten=="")
						document.getElementById("Check_Name").innerHTML="Tên đăng nhập đang trống";
					else
						document.getElementById("Check_Name").innerHTML="";
				}
				
				function KtMK() {
					var mk = document.getElementById("Mat_khau").value;
					if (mk=="")
						document.getElementById("Check_Password").innerHTML="Mật khẩu đang trống";	
					else
						document.getElementById("Check_Password").innerHTML="";	
				}
                
                function tatdangnhap(){
                    document.getElementById('Phan_dang_nhap').style.display = "none";
                    document.getElementById('Ten_dang_nhap').value="";
                    document.getElementById('Mat_khau').value="";
                }
				
                //Khi người dùng click bên ngoài khung đăng nhập thì khung đăng nhập sẽ tắt
                window.onclick = function(event) {
                	if(event.target == document.getElementById('Phan_dang_nhap')) {
                    	document.getElementById('Phan_dang_nhap').style.display = "none";
						document.getElementById('Ten_dang_nhap').value="";
						document.getElementById('Mat_khau').value="";
					}
                }
            </script>
        </div>
		<div id="Phan_thong_tin" class="Khung_thong_tin">
			<div class="Noi_dung_khung Hoat_canh">
				<caption><h1 style="color: darkblue">Thông tin người dùng</h1></caption>
				<table class="Bang_thong_tin" cellspacing="20px">
					<tr>
						<td style="font-weight: bold">Họ và tên</td>
						<td id="Ten-NguoiDung"></td>
					</tr>
					<tr>
						<td style="font-weight: bold">Giới tính</td>
						<td id="Sex-NguoiDung"></td>
					</tr>
					<tr>
						<td style="font-weight: bold">Ngày sinh</td>
						<td id="Birth-NguoiDung"></td>
					</tr>
					<tr>
						<td style="font-weight: bold">Số điện thoại</td>
						<td id="Phone-NguoiDung"></td>
					</tr>
				</table>
			</div>
			<script>
				var tk = JSON.parse(localStorage.getItem('Tài khoản'));
				document.getElementById('Ten-NguoiDung').innerHTML = '<td>'+tk.Ten_NguoiDung+'</td>';
				document.getElementById('Sex-NguoiDung').innerHTML = '<td>'+tk.Gioi_Tinh+'</td>';
				document.getElementById('Birth-NguoiDung').innerHTML = '<td>'+tk.Ngay_Sinh+'</td>';
				document.getElementById('Phone-NguoiDung').innerHTML = '<td>'+tk.Sdt+'</td>';
				window.onclick = function(event) {
                	if(event.target == document.getElementById('Phan_thong_tin')) {
                    	document.getElementById('Phan_thong_tin').style.display = "none";
					}
                }
			</script>
		</div>
    </div>
</div>
<hr style="margin-top:0;border:1.5px solid #e6e6e6">