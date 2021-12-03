<?php
    $expiryTime = time()+60*60*24;
    $cname = "cart";
    $cvalue = "";
    if(!isset($_COOKIE['cart']))
    {
        setcookie($cname, $cvalue, $expiryTime, '/');
    }

    $new_size = $_POST['size'];
    $new_string = "";
    $new_quantity = $_POST['items'];
    $pid = $_POST['pid'];
    $whereto = $_POST['submit'];

    if(isset($_COOKIE['cart']))
    {
        $old_string = $_COOKIE['cart'];

        for($i = 0; $i > $items; $i++)
        {
            $new_string = "," . $pid . ":" . $new_size;
            $old_string .= $new_string;
        }

        setcookie('cart', $old_string, time()+60*60*24, '/');
        
    }

    switch($whereto)
    {
        case "Add To Bag":
            location.replace("/product-page?pid=" . $pid);
            break;
        case "Purchase" :
            location.replace("/purchase-page");
            break;
        default:
            location.replace("/search-page");
            break;
    }
?>