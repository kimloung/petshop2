function popup_themsp() {
    document.getElementsByClassName('popup-themsp')[0].style.display = 'block';
}

function close_popup_themsp() {
    document.getElementsByClassName('popup-themsp')[0].style.display = 'none';
	try {
        document.getElementsByClassName('popup-themsp')[1].style.display = 'none';
    } catch (e) {
        console.log("Đang ở trang Quản lý Đơn Hàng");
    }
}

function xoa_sp(){
    if (confirm('Bạn có chắc chắn muốn xoá?')) {
        if (confirm('Xác nhận xoá!!!'))
            return true;
        else
            return false;
    }
    else
        return false;
}

function khoiphuc_sp(){
    if (confirm('Bạn có chắc chắn muốn khôi phục?')) {
        return true;
    }
    else
        return false;
}

function xoavinhvien_sp(){
    if (confirm('Thao tác này sẽ xóa dữ liệu khỏi cơ sở dữ liệu. Bạn có chắc chắn muốn xoá?')) {
        if (confirm('Thao tác này sẽ xóa dữ liệu khỏi cơ sở dữ liệu. Xác nhận xoá!!!')){
            if (confirm('Thao tác này sẽ xóa dữ liệu khỏi cơ sở dữ liệu. Xác nhận xoá lần cuối!!!'))
                return true;
            else
                return false;
        }
        else
            return false;
    }
    else
        return false;
}