<?php
    $productsPerPage = 8;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
        $pageNum = $_GET['page'];
    }
    $offset = ($pageNum - 1) * $productsPerPage;
?>