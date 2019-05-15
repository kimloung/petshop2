// JavaScript Document
// Dùng để đổi css ở btn đăng nhập thành đang xuất và hiển thị thông tin người dùng
function afterLogin(name){
	dang_ki.innerHTML = `<button onClick="document.getElementById('Phan_thong_tin').style.display='block'"><i class="fas fa-user-tie"></i> ` +  name  +`</button>`;
}
/*
function User() {
	var ngay = document.getElementById("ngay").value;
	var thang = document.getElementById("thang").value;
	var nam = document.getElementById("nam").value;
	var people = {
		Ten_TK: document.getElementById("UserName").value,
		Mat_Khau: document.getElementById("MatKhau").value,
		Ten_NguoiDung: document.getElementById("Name").value,
		Gioi_Tinh: document.getElementById("sex").value,
		Ngay_Sinh: ngay + '/' + thang + '/' + nam,
		Sdt: document.getElementById("phone").value,
		Trang_Thai: 0
	};
	localStorage.setItem('Tài khoản', JSON.stringify(people));
	alert("Bạn đã đăng ký thành công");
	window.history.back();
}

function SignIn () {
	if(localStorage.getItem('Tài khoản')) {
		var n = document.getElementById("Ten_dang_nhap").value;
		var p = document.getElementById("Mat_khau").value;
		var tk = localStorage.getItem('Tài khoản');
		tk = JSON.parse(tk);
		if (n==tk.Ten_TK && p==tk.Mat_Khau) {
			tk.Trang_Thai = 1;
			localStorage.setItem('Tài khoản',JSON.stringify(tk));
			alert("Đăng nhập thành công!!!!");
			window.history.back();
		}
		else
			alert("Tài khoản không tồn tại!!!!!!!!");
	}
	else
		alert("Tài khoản không tồn tại!!!!!!!!");
}

function Check_Tai_Khoan() {
	var dang_nhap = document.getElementById('login');
	var dang_ki = document.getElementById('signup');
	if(localStorage.getItem('Tài khoản')) {
		var tk = JSON.parse(localStorage.getItem('Tài khoản'));
		if(tk.Trang_Thai==1) {
			dang_ki.innerHTML = `<button onClick="document.getElementById('Phan_thong_tin').style.display='block'"><i class="fas fa-user-tie"></i> `+ tk.Ten_NguoiDung+`</buton>`;
			dang_nhap.innerHTML = '<button>Đăng xuất</button>';
			dang_nhap.setAttribute('href','');
			dang_nhap.addEventListener('click',function(e) {
				tk.Trang_Thai=0;
				localStorage.setItem('Tài khoản',JSON.stringify(tk));
				location.reload();
			});
		}
	}
}*/