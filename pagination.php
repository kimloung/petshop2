<?php
    $sql   = "SELECT COUNT(*) AS numproducts FROM sanpham as sp JOIN sp_dv_tl as sdt ON sp.masp = sdt.masp";
    if(isset($_GET['site']))
    {
        $site = $_GET['site'];
        if($site == "cho")
            $sql = $sql . " WHERE madv='dog'";
        if($site == "meo")
            $sql = $sql . " WHERE madv='cat'";
        if($site == "chim")
            $sql = $sql . " WHERE madv='bird'";
        if($site == "ca")
            $sql = $sql . " WHERE madv='fish'";
        if($site == "hamster")
            $sql = $sql . " WHERE madv='hamster'";
    }
    if (isset($_GET['menu']))
    {
        if($_GET['menu'] == 0)
            $sql = $sql;
        if($_GET['menu'] == 1)
            $sql = $sql . " AND matl='food'";
        if($_GET['menu'] == 2)
            $sql = $sql . " AND matl='stuff'";
        if($_GET['menu'] == 3)
            $sql = $sql . " AND matl='bed'";
    }
    if(isset($_GET['key'])) //Phần tìm kiếm
    {
        $key = $_GET['key'];
        $sql = "SELECT COUNT(*) AS numproducts FROM (SELECT sp.*, GROUP_CONCAT(sdt.madv) AS madv, sdt.matl, km.giakhuyenmai FROM sanpham as sp JOIN sp_dv_tl as sdt ON sp.masp = sdt.masp LEFT JOIN spkhuyenmai AS km ON sp.masp = km.masp WHERE BINARY UPPER(sp.masp) LIKE UPPER('%".$key."%') OR BINARY UPPER(sp.tensp) LIKE UPPER('%".$key."%') OR BINARY UPPER(sp.mota) LIKE UPPER('%".$key."%') GROUP BY sp.masp) AS c";
        if(isset($_GET['thucung']) || isset($_GET['theloai']) || isset($_GET['giatu']) || isset($_GET['giaden'])){
            $where = " WHERE ";
            $testwhere=1;
            if($_GET['thucung'] != "all"){
                $where = $where."madv LIKE '%".$_GET['thucung']."%'";
                $testwhere=0;
            }
            if($_GET['theloai'] != "all" && $testwhere == 1){
                $where = $where."matl LIKE '%".$_GET['theloai']."%'";
                $testwhere=0;
            }
            else if($_GET['theloai'] != "all" && $testwhere == 0){
                $where = $where." AND matl LIKE '%".$_GET['theloai']."%'";
            }
            if($testwhere == 1){
                $where = $where."giatien BETWEEN ".$_GET['giatu']." AND ".$_GET['giaden'];
                $testwhere=0;
            }
            else if($testwhere == 0){
                $where = $where."AND giatien BETWEEN ".$_GET['giatu']." AND ".$_GET['giaden'];
            }
            $sql = $sql.$where;
        }
    }
    $result = DataProvider::executeQuery($sql);
    $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $numproducts = $product['numproducts'];
    $maxPage = ceil($numproducts/$productsPerPage);
    $link=$_SERVER['REQUEST_URI'];
    $nav  = '';
    $LessPages = 0;
    $MorePages = 0;
    for($page = 1; $page <= $maxPage; $page++)
    {
        if($pageNum == 1 || $pageNum == $maxPage) //pageNum: trang hiện tại
            $showpages=7;                         //showpages: số lượng nút phân trang cần hiện
        else if($pageNum == 2 || $pageNum == ($maxPage-1))
            $showpages=6;
        else if($pageNum == 3 || $pageNum == ($maxPage-2))
            $showpages=5;
        else
            $showpages=4;
        
       if ($page == $pageNum)
       {
            $nav .= "<a><div class='so currentpage'>".$page."</div></a>"; // khong can tao link cho trang hien hanh
       }
       else if (($page < $pageNum)&& ($pageNum-$page >= $showpages) && $LessPages == 0)
       {
            $nav .= "<a><div class='so'>...</div></a>";
            $LessPages = 1;
       }
       else if (($page > $pageNum) && ($page-$pageNum >= $showpages) && $MorePages == 0)
       {
            $nav .= "<a><div class='so'>...</div></a>";
            $MorePages = 1;
       }
       else if ((($page < $pageNum) && ($pageNum-$page < $showpages)) || (($page > $pageNum) && ($page-$pageNum < $showpages)))
       {
                $nav .= "<a href='".$link."&page=".$page."'><div class='so'>".$page."</div></a>";
       }
    }

    // tao lien ket den trang truoc & trang sau, trang dau, trang cuoi
    if ($pageNum > 1)
    {
        $page  = $pageNum - 1;
        $prev  = "<a title='Trang trước' href='".$link."&page=".$page."'><div class='so'>&lsaquo;</div></a>";
        $first = "<a title='Trang đầu' href='".$link."&page=1'><div class='so'>&laquo;</div></a>";
    }
    else
    {
       $prev  = ""; // dang o trang 1, khong can in lien ket trang truoc
       $first = ""; // va lien ket trang dau
    }

    if ($pageNum < $maxPage)
    {
        $page = $pageNum + 1;
        $next  = "<a title='Trang kế' href='".$link."&page=".$page."'><div class='so'>&rsaquo;</div></a>";
        $last = "<a title='Trang cuối' href='".$link."&page=".$maxPage."'><div class='so'>&raquo;</div></a>";
    }
    else
    {
       $next = ""; // dang o trang cuoi, khong can in lien ket trang ke
       $last = ""; // va lien ket trang cuoi
    }

    if($numproducts > $productsPerPage){
        echo "<div class='sotrang'>";
        echo $first . $prev . $nav . $next . $last;
        echo "</div>";
    }
 ?>