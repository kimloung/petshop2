// JavaScript Document

function xoa_hd(){
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

function close_popup_dh_sua() {
    document.getElementsByClassName('popup-dh')[0].style.display = 'none';
}