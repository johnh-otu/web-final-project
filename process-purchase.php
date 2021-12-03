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

    define("connectionString","mysql:dbname=finalproject");
    define("userName","root");
    define("password","");

    $pdo = new PDO(connectionString, userName, password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 

    $price = 0;
    for($i = 0; $i < count($cartArr); $i++)
    {
        $pid = $cartArr[$i][0];
        $pprices = $pdo->query("SELECT price FROM products WHERE product_id = " . $pid . ";")->fetchAll()[0];
        $price += $pprices[0];
    }

    $sql = "INSERT INTO `information` (`first_name`, `last_name`, `street_address`, `city`, `postal`, `email`, `total_price`, `province`, `country`) 
        VALUES (". $first .",". $last .",". $address .",". $city .",". $postal .",". $email .",". $price .",". $province .",". $country .");";

    $pdo->prepare($sql)->execute(); //insert

    $sql = "SELECT purchase_id FROM information WHERE email=" . $pdo->quote($email) . " AND price=" . $price . ";";
    $purchase_id = $pdo->query($)->fetch();

    
    for ($i=0; $i < count($cartArr); $i++) 
    {
        $pid = $cartArr[$i][0];
        $size = $cartArr[$i][1]; 
        $sql = "INSERT INTO `purchases` (`purchase_id`, `product_id`, `size`) VALUES (" . $purchase_id . ", " . $pid . ", " . $size . ");";
        $pdo->prepare($sql)->execute(); //insert
    }

    $pdo = null;

    setcookie('cart', "", time()-3600);
    echo '<script>location.replace("/thankyou-page");</script>';
?>