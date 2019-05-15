function xoa_dau(str) {
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
    str = str.replace(/Đ/g, "D");
    return str;
}

//Xóa khoảng trắng dư thừa
function xoa_space(str) {
    str = str.replace(/  +/g, ' ');
    return str;
}

function timkiem(){
	var txttimkiem = document.getElementById("searchcontent");
	if(txttimkiem.value == ""){
		alert("Vui lòng nhập từ khóa để tìm kiếm");
	}
	else{
		txttimkiem.value = xoa_space(xoa_dau(txttimkiem.value));
		window.location.assign("timkiem.php?key="+txttimkiem.value);
	}
    return false;
}

function loadtimkiem()
{
    var key = window.location.href.split('?key=')[1].toLowerCase();
    key = key.replace(/%20/g, " "); //Đổi %20 trên thanh địa chỉ thành kí tự khoảng trắng
    var result = document.getElementById('ketqua');
    var count = 0;
    for(var i = 0; i < sp.length; i++)
    {
        if(xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || 
           xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1 || 
           xoa_dau(sp[i].madv.toLowerCase()).indexOf(key) != -1 || 
           xoa_dau(sp[i].matl.toLowerCase()).indexOf(key) != -1)
        {
            count++;
            result.innerHTML += '<div class="sanpham">\
                                        <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                        <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                        <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                        <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                    </div>';
        }
    }
    if(count == 0)
        result.innerHTML = '<h1 style="text-align: center">KHÔNG CÓ KẾT QUẢ TÌM KIẾM</h1>';
}

function timnangcao() {
    var diachi = window.location.href;
    var key;
    if(diachi.indexOf("&") != -1)
    {
        key = diachi.split('?key=')[1].split('&pet=')[0];
    }
    else
    {
        key = diachi.split('?key=')[1];
    }
    var dv = document.getElementById('dv').value;
    var tl = document.getElementById('tl').value;
    var gia = document.getElementById('price').value;
    window.location.assign("timkiem.php?key=" +key+ "&pet=" +dv+ "&menu=" +tl+ "&price=" +gia);
}

function loadtimkiemnangcao()
{
    var diachi = window.location.href;
    var key = diachi.split('?key=')[1].split('&pet=')[0];
    key = key.replace(/%20/g, " ");
    var dv = diachi.split('&pet=')[1].split('&menu=')[0];
    var tl = diachi.split('&menu=')[1].split('&price=')[0];
    var gia = diachi.split('&price=')[1];
    var result = document.getElementById('ketqua');
    var count = 0;
    for(var i = 0; i < sp.length; i++)
    {
        //Không chọn lựa chọn nào
        if(dv == "0" && tl == "0" && gia == "0")
        {
            if(xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || 
               xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1 || 
               xoa_dau(sp[i].madv.toLowerCase()).indexOf(key) != -1 || 
               xoa_dau(sp[i].matl.toLowerCase()).indexOf(key) != -1)
            {
                count++;
                result.innerHTML += '<div class="sanpham">\
                                            <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                            <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                            <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                            <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                        </div>';
            }
        }
        //Chọn 1 lựa chọn
        //Chọn pet
        else if(dv != '0' && tl == '0' && gia == '0')
        {
            if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
               xoa_dau(sp[i].madv.toLowerCase()) == dv)
            {
                count++;
                result.innerHTML += '<div class="sanpham">\
                                            <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                            <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                            <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                            <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                        </div>';
            }
        }
        //Chọn thể loại
        else if(dv == '0' && tl != '0' && gia == '0')
        {
            if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
               xoa_dau(sp[i].matl.toLowerCase()) == tl)
            {
                count++;
                result.innerHTML += '<div class="sanpham">\
                                            <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                            <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                            <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                            <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                        </div>';
            }
        }
        //Chọn giá
        else if(dv == "0" && tl == "0" && gia != "0")
        {
            if(gia == "50"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                    (sp[i].gia >=0 && sp[i].gia<=50) )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
            else if(gia == "100"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                    (sp[i].gia >=50 && sp[i].gia<=100) )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
            else if(gia == "500"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                    (sp[i].gia >=50 && sp[i].gia<=100) )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
            else if(gia == "500plus"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                    (sp[i].gia >=500) )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
        }
        //Chọn 2 lựa chọn
        //Chọn pet + thể loại
        else if(dv != "0" && tl != "0" && gia == "0")
        {
            if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                xoa_dau(sp[i].madv.toLowerCase()) == dv && 
                xoa_dau(sp[i].matl.toLowerCase()) == tl )
            {
                count++;
                result.innerHTML += '<div class="sanpham">\
                                            <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                            <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                            <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                            <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                        </div>';
            }
        }
        //Chọn pet + giá
        else if(dv != "0" && tl == "0" && gia != "0")
        {
            if(gia == "50"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                    xoa_dau(sp[i].madv.toLowerCase()) == dv && 
                    (sp[i].gia >=0 && sp[i].gia<=50) )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
            else if(gia == "100"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                    xoa_dau(sp[i].madv.toLowerCase()) == dv && 
                    (sp[i].gia >=50 && sp[i].gia<=100) )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
            else if(gia == "500"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                    xoa_dau(sp[i].madv.toLowerCase()) == dv && 
                    (sp[i].gia >=100 && sp[i].gia<=500) )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
            else if(gia == "500plus"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                    xoa_dau(sp[i].madv.toLowerCase()) == dv && 
                    sp[i].gia >=500 )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
        }
        //Chọn thể loại + giá
        if(dv == "0" && tl != "0" && gia != "0")
        {
            if(gia == "50"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                   xoa_dau(sp[i].matl.toLowerCase()) == tl && 
                   (sp[i].gia >=0 && sp[i].gia<=50) )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
            else if(gia == "100"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                   xoa_dau(sp[i].matl.toLowerCase()) == tl && 
                   (sp[i].gia >=50 && sp[i].gia<=100) )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
            else if(gia == "500"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                   xoa_dau(sp[i].matl.toLowerCase()) == tl && 
                   (sp[i].gia >=100 && sp[i].gia<=500) )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
            else if(gia == "500plus"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                   xoa_dau(sp[i].matl.toLowerCase()) == tl && 
                   sp[i].gia >=500 )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
        }
        //Chọn cả 3 lựa chọn
        else if(dv != "0" && tl != "0" && gia != "0")
        {
            if(gia == "50"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                   xoa_dau(sp[i].madv.toLowerCase()) == dv && 
                   xoa_dau(sp[i].matl.toLowerCase()) == tl && 
                   (sp[i].gia >=0 && sp[i].gia<=50) )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
            else if(gia == "100"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                   xoa_dau(sp[i].madv.toLowerCase()) == dv && 
                   xoa_dau(sp[i].matl.toLowerCase()) == tl && 
                   (sp[i].gia >=50 && sp[i].gia<=100) )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
            else if(gia == "500"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                   xoa_dau(sp[i].madv.toLowerCase()) == dv && 
                   xoa_dau(sp[i].matl.toLowerCase()) == tl && 
                   (sp[i].gia >=100 && sp[i].gia<=500) )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
            else if(gia == "500plus"){
                if( (xoa_dau(sp[i].masp.toLowerCase()).indexOf(key) != -1 || xoa_dau(sp[i].tensp.toLowerCase()).indexOf(key) != -1) && 
                   xoa_dau(sp[i].madv.toLowerCase()) == dv && 
                   xoa_dau(sp[i].matl.toLowerCase()) == tl && 
                   sp[i].gia >=500 )
                {
                    count++;
                    result.innerHTML += '<div class="sanpham">\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-img"><img src="'+ sp[i].hinh +'"/></a>\
                                                <a href="index.php?site=SanPham&masp='+sp[i].masp+'" class="p-name">'+ sp[i].tensp +'</a>\
                                                <p class="gia">'+ sp[i].gia +'.000đ</p>\
                                                <p><button class="shop-item-button" value="'+sp[i].masp+'" onClick="saveProduct(this.value)">Thêm vào giỏ</button></p>\
                                            </div>';
                }
            }
        }
    }
    if(count == 0)
        result.innerHTML = '<h1 style="text-align: center">KHÔNG CÓ KẾT QUẢ TÌM KIẾM</h1>';
}

function loadsearch()
{
    var diachi = window.location.href;
    if(diachi.indexOf('&') != -1)
        loadtimkiemnangcao();
    else
        loadtimkiem();
}

function saveProduct(productID) {
	var Ma_sp;
	var Hinh_sp;
	var Ten_sp;
	var Gia_sp;
	var DongVat_sp;
	var TheLoai_sp;
	for(var i=0; i < sp.length; i++) {
		if(sp[i].masp == productID) {
			Ma_sp = sp[i].masp;
			Ten_sp = sp[i].tensp;
			Hinh_sp = sp[i].hinh;
			Gia_sp = sp[i].gia;
            break;
		}
    }
    for(var i = 0; i < 8; i++){
        if(spmoi[i].masp == productID) {
			Ma_sp = spmoi[i].masp;
			Ten_sp = spmoi[i].tensp;
			Hinh_sp = spmoi[i].hinh;
			Gia_sp = spmoi[i].gia;
            break;
		}
        else if(spsale[i].masp == productID) {
			Ma_sp = spsale[i].masp;
			Ten_sp = spsale[i].tensp;
			Hinh_sp = spsale[i].hinh;
			Gia_sp = spsale[i].gia;
            break;
		}
    }
    var Gio_SP = {
        Ma : Ma_sp,
        Ten : Ten_sp,
        Hinh : Hinh_sp,
        Gia : Gia_sp
    };
    var so_sp = localStorage.length;
    if (localStorage.getItem('Tài khoản')) so_sp--;
    
    for(var i = 0; i < so_sp; i ++)
    {
        if(localStorage.getItem('item'+i))
        {
            var ma = JSON.parse(localStorage.getItem('item'+i)).Ma;
            if(productID == ma)
            {
                alert('Sản phẩm đã có trong giỏ hàng!');
                return false;
            }
        }
    }
    localStorage.setItem("item"+so_sp, JSON.stringify(Gio_SP));
}

function load_gio_hang() {
    for (var j = 0; j < localStorage.length; j++) {
        var key = "item" + j;
        if (localStorage.getItem(key)) {
            var item = JSON.parse(localStorage.getItem(key))
            var list_sp = document.getElementsByClassName('cart-items')[0];
            var ma = item.Ma;
            for(var i = 0; i < sp.length; i++)
            {
                if(sp[i].masp == ma){
                    list_sp.innerHTML += '\
                        <div class="cart-row" id="' +key+ '">\
                            <div class="cart-item cart-column">\
                                <img class="cart-item-image" src="' +sp[i].hinh+ '" width="100" height="100">\
                                <span class="cart-item-title">' +sp[i].tensp+'</span>\
                            </div>\
                            <span class="cart-price cart-column"  giatien="' +sp[i].gia+ '">' +sp[i].gia+ '.000đ</span>\
                            <div class="cart-quantity cart-column">\
                                <input class="cart-quantity-input" type="number" value="1" min="1" oninput="tinhtien(' +key.split('item')[1]+ '); tongtien()">\
                                <button value="' +key+ '" class="btn btn-danger" onClick = "xoa_sp(this.value)">XÓA</button>\
                            </div>\
                            <div class="cart-sub-total cart-column">' +sp[i].gia+ '.000đ</div>\
                        </div>'
                }
            }
            for(var i = 0; i < 8; i++){
                if(spmoi[i].masp == ma){
                    list_sp.innerHTML += '\
                        <div class="cart-row" id="' +key+ '">\
                            <div class="cart-item cart-column">\
                                <img class="cart-item-image" src="' +spmoi[i].hinh+ '" width="100" height="100">\
                                <span class="cart-item-title">' +spmoi[i].tensp+'</span>\
                            </div>\
                            <span class="cart-price cart-column" giatien="' +spmoi[i].gia+ '">' +spmoi[i].gia+ '.000đ</span>\
                            <div class="cart-quantity cart-column">\
                                <input class="cart-quantity-input" type="number" value="1" min="1" oninput="tinhtien(' +key.split('item')[1]+ '); tongtien()">\
                                <button value="' +key+ '" class="btn btn-danger" onClick = "xoa_sp(this.value)">XÓA</button>\
                            </div>\
                            <div class="cart-sub-total cart-column">' +spmoi[i].gia+ '.000đ</div>\
                        </div>'
                }
                else if(spsale[i].masp == ma){
                    list_sp.innerHTML += '\
                        <div class="cart-row" id="' +key+ '">\
                            <div class="cart-item cart-column">\
                                <img class="cart-item-image" src="' +spsale[i].hinh+ '" width="100" height="100">\
                                <span class="cart-item-title">' +spsale[i].tensp+'</span>\
                            </div>\
                            <span class="cart-price cart-column" giatien="' +spsale[i].gia+ '">' +spsale[i].gia+ '.000đ</span>\
                            <div class="cart-quantity cart-column">\
                                <input class="cart-quantity-input" type="number" value="1" min="1" oninput="tinhtien(' +key.split('item')[1]+ '); tongtien()">\
                                <button value="' +key+ '" class="btn btn-danger" onClick = "xoa_sp(this.value)">XÓA</button>\
                            </div>\
                            <div class="cart-sub-total cart-column">' +spsale[i].gia+ '.000đ</div>\
                        </div>'
                }
            }
        }
    }
}

function xoa_sp(key) {
    localStorage.removeItem(key);
    document.getElementById(key).style.display = 'none';
    window.location.reload();
}

function tinhtien(i){
    var dongia = document.getElementsByClassName('cart-price');
    var soluong = document.getElementsByClassName('cart-quantity-input');
    if(soluong[i].value < 1)
        soluong[i].value = 1;
    var thanhtien = document.getElementsByClassName('cart-sub-total');
    var tien = 0;
    tien = dongia[i+1].getAttribute('giatien') * soluong[i].value;
    thanhtien[i+1].innerHTML = formatmoney(tien) + '.000đ';
}

function tongtien()
{
    var so_sp = localStorage.length;
    if (localStorage.getItem('Tài khoản')) so_sp--;
    if(so_sp > 0)
    {
        var tien = 0;
        var thanhtien = document.getElementsByClassName('cart-sub-total');
        var tongtien = document.getElementsByClassName('cart-total-price')[0];
        for(var i = 1; i < thanhtien.length; i++)
        {
            tien += parseInt(thanhtien[i].innerHTML.split('.000đ')[0].replace('.',''));
        }
        tongtien.innerHTML = formatmoney(tien) + '.000đ';
    }
}

//Cứ 3 số thì chèn dấu chấm
function formatmoney(val)
{
    var v = Number(val);
    if (isNaN(v)) { return val; }
    var sign = (v < 0) ? '-' : '';
    var res = Math.abs(v).toString().split('').reverse().join('').replace(/(\d{3}(?!$))/g, '$1.').split('').reverse().join('');
    return sign + res;
}

function shopcart()
{
    load_gio_hang();
    tongtien();
}