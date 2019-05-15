<?php
    session_start();
    if (isset($_POST["masp"])) {
        require 'DataProvider.php';

        foreach($_POST as $key => $value) {
            $product[$key] = filter_var($value,FILTER_SANITIZE_STRING);
        }

        if (! isset($_POST["giakhuyenmai"])) {
            $sql = "SELECT tensp, giatien, hinhanh FROM sanpham WHERE masp='". $product['masp'] ."' LIMIT 1";
            $result = DataProvider::executeQuery($sql);

            while ($row = mysqli_fetch_array($result)) {
                $product["tensp"] = $row['tensp'];
                $product["giatien"] = $row['giatien'];
                $product["hinhanh"] = $row['hinhanh'];
                if (isset($_SESSION["products"])) {
                    if (isset($_SESSION["products"][$product['masp']])) {
                        $_SESSION["products"][$product['masp']]["soluong"] = $_SESSION["products"][$product['masp']]["soluong"] + $_POST["soluong"];
                    }
                    else {
                        $_SESSION["products"][$product['masp']] = $product;
                    }
                }
                else {
                    $_SESSION["products"][$product['masp']] = $product;
                }
            }
        }
        else {
            $sql = "SELECT tensp, giakhuyenmai, hinhanh FROM spkhuyenmai as km JOIN sanpham as sp WHERE sp.masp='". $product['masp'] ."' AND km.masp=sp.masp LIMIT 1";
            $result = DataProvider::executeQuery($sql);

            while ($row = mysqli_fetch_array($result)) {
                $product["tensp"] = $row['tensp'];
                $product["giatien"] = $row['giakhuyenmai'];
                $product["hinhanh"] = $row['hinhanh'];
                if (isset($_SESSION["products"])) {
                    if (isset($_SESSION["products"][$product['masp']])) {
                        $_SESSION["products"][$product['masp']]["soluong"] = $_SESSION["products"][$product['masp']]["soluong"] + $_POST["soluong"];
                    }
                    else {
                        $_SESSION["products"][$product['masp']] = $product;
                    }
                }
                else {
                    $_SESSION["products"][$product['masp']] = $product;
                }
            }
        }

        $total_product = count($_SESSION["products"]);
        die(json_encode(array('products'=>$total_product)));
    }

    # Update cart product quantity
    if(isset($_GET["update_quantity"]) && isset($_SESSION["products"])) {	
        if(isset($_GET["quantity"]) && $_GET["quantity"]>0) {		
            $_SESSION["products"][$_GET["update_quantity"]]["soluong"] = $_GET["quantity"];	
        }
        $total_product = count($_SESSION["products"]);
        die(json_encode(array('products'=>$total_product)));
    }	

    # Remove products from cart
    if(isset($_GET["remove_code"]) && isset($_SESSION["products"])) {
        $product_code  = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING);
        if(isset($_SESSION["products"][$product_code]))	{
            unset($_SESSION["products"][$product_code]);
        }	
        $total_product = count($_SESSION["products"]);
        die(json_encode(array('products'=>$total_product)));
    }
?>