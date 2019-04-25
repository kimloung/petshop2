// JavaScript Document
function Admin(email, pass) {
    this.email = email;
    this.pass = pass;
}
var admin = new Array();
admin[0] = new Admin('tuongdai252@gmail.com', '3117410042');
admin[1] = new Admin('trieudat12347@gmail.com', '3117410043');
admin[2] = new Admin('luonglu1999@gmail.com', '3117410147');

function password_help(){
    var detail = document.getElementById('forget_pass');
    if(detail.style.display == 'none'){
        detail.style.display = 'block';
    }
    else{
        detail.style.display = 'none';
    }
}

function validateLogin(){
    var user = document.getElementById('username').value;
    var pass = document.getElementById('password').value;
    var error = "";
    for (var i = 0; i < admin.length; i++) 
    {
        if (user == admin[i].email && pass == admin[i].pass)
        {
            window.location = 'quantri.php?site=thongke';
            return true;
        }
    }
    error = "Email hoặc mật khẩu sai!";
    if(error != "") {alert(error); }
    return false;
}
