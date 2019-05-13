<?php
    $result = DataProvider::executeQuery($sql);
    $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $numproducts = $product['numproducts'];
    $maxPage = ceil($numproducts/$productsPerPage);
    $link=$_SERVER['REQUEST_URI'];
    if(isset($_GET['page']))
        $link = explode("?page=", $link)[0];
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
                $nav .= "<a href='".$link."?page=".$page."'><div class='so'>".$page."</div></a>";
       }
    }

    // tao lien ket den trang truoc & trang sau, trang dau, trang cuoi
    if ($pageNum > 1 && $pageNum < 5)
    {
        $page  = $pageNum - 1;
        $prev  = "<a title='Trang trước' href='".$link."?page=".$page."'><div class='so'>&lsaquo;</div></a>";
        $first = "";
    }
    else if ($pageNum > 1 && $pageNum >= 5)
    {
        $page  = $pageNum - 1;
        $prev  = "<a title='Trang trước' href='".$link."?page=".$page."'><div class='so'>&lsaquo;</div></a>";
        $first = "<a title='Trang đầu' href='".$link."?page=1'><div class='so'>1</div></a>";
    }
    else
    {
       $prev  = ""; // dang o trang 1, khong can in lien ket trang truoc
       $first = ""; // va lien ket trang dau
    }

    if ($pageNum < $maxPage && $maxPage-$pageNum <= 3)
    {
        $page = $pageNum + 1;
        $next  = "<a title='Trang kế' href='".$link."?page=".$page."'><div class='so'>&rsaquo;</div></a>";
        $last = "";
    }
    else if ($pageNum < $maxPage && $maxPage-$pageNum > 3)
    {
        $page = $pageNum + 1;
        $next  = "<a title='Trang kế' href='".$link."?page=".$page."'><div class='so'>&rsaquo;</div></a>";
        $last = "<a title='Trang cuối' href='".$link."?page=".$maxPage."'><div class='so'>" .$maxPage. "</div></a>";
    }
    else
    {
       $next = ""; // dang o trang cuoi, khong can in lien ket trang ke
       $last = ""; // va lien ket trang cuoi
    }

    if($numproducts > $productsPerPage){
        echo "<div class='sotrang'>";
        echo $prev . $first . $nav . $last . $next;
        echo "</div>";
    }
 ?>