// JavaScript Document
function popup_themtk()
{
    document.getElementsByClassName("popup-themuser")[0].style.display = "block";
}

function close_popup_themuser() {
    document.getElementsByClassName('popup-themuser')[0].style.display = 'none';
}

function xoa_tk(){
    if (confirm('Bạn có chắc chắn muốn xoá tài khoản?')) {
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

function khoa_tk(){
    if (confirm('Bạn có chắc chắn muốn khóa tài khoản này?')) {
        if (confirm('Xác nhận khóa!!!'))
            return true;
        else
            return false;
    }
    else
        return false;
}

function mokhoa(){
    if (confirm('Bạn có chắc chắn muốn mở khóa tài khoản này?')) {
        return true;
    }
    else
        return false;
}