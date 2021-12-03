<?php
    define("connectionString","mysql:dbname=finalproject");
    define("userName","root");
    define("password","");


    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['email'];
    $addy = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $prov = $_POST['province'];
    $postal = $_POST['postal'];
    $totalP = 1;


    //Connect to DB
    try
    {
        $conn = new PDO(connectionString,userName,password);

        // insert user into info table
        $sql = "INSERT INTO information(first_name, last_name, street_address, city, country, province, postal, email, `date`, total_price) 
        VALUES ('" . $fname . "', '" . $lname . "', '" . $addy . "', '" . $city . "', '" . $country . "', '" . $prov . "', '" . 
        $postal . "', '" . $email . "', (SELECT CAST(CURRENT_TIMESTAMP as DATE)), " . $totalP . ");";
        $conn->exec($sql);
        echo 
        include 'purchase-confirm.html';


    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }

?>