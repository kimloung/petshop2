<?php
    session_start();
    if(!isset($_SESSION['managerIsLogin']) && !isset($_SESSION['managervaitro']))
        echo "<script language='javascript'>window.location='index.php';</script>";
    else if(isset($_SESSION['managerIsLogin']) && isset($_SESSION['managervaitro']))
    {
        if($_SESSION['managerIsLogin'] == 1 && $_SESSION['managervaitro'] == "admin")
            ;
        else if($_SESSION['managerIsLogin'] == 1 && $_SESSION['managervaitro'] == "sale")
            echo "<script language='javascript'>window.location='thongtinsanpham.php';</script>";
        else
            echo "<script language='javascript'>window.location='index.php';</script>";
    }
    else
        echo "<script language='javascript'>window.location='index.php';</script>";
?>