<?php

    if(!isset($_COOKIE['cart']))
    {
        echo '<script>location.replace("/search-page");</script>';
    }
    else
    {
        $cart = explode(",", $_COOKIE['cart']);
        $cartArr = Array();
        for($i = 1; $i < count($cart); $i++)
        {
            $cartArr[$i-1] = explode(":", $cart[$i]);
        }
    }

    if(count($_POST) > 0)
    {
        $first = $_POST['firstName'];
        $last = $_POST['lastName'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $country = $_POST['country'];
        $postal = $_POST['postal'];
    }
    else
    {
        echo '<script>location.replace("/search-page");</script>';
    }
?>