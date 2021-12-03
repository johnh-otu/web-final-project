<!DOCTYPE html>
<?php
    $expiryTime = time()+60*60*24;
    $cname = 'cart';
    $cvalue = "yo";

    $new_size = $_POST['size'];
    $new_string = "";
    $new_quantity = $_POST['items'];
    $pid = $_POST['pid'];
    $whereto = $_POST['submit'];

    if(!isset($_COOKIE['cart']))
    {
        $old_string = $cvalue;

        for($i = 0; $i < $new_quantity; $i++)
        {
            
            $old_string .= "," . $pid . ":" . $new_size;
            
        }

        echo "<script>console.log('hello');</script>";
        setcookie($cname, $old_string, $expiryTime, "/");
    }

?>

<html>
    <body>
        <?php

            if(isset($_COOKIE['cart']))
            {
                /*
                echo "<script>console.log('q" . $new_quantity . "');</script>";
                echo "<script>console.log('p" . $pid . "');</script>";
                echo "<script>console.log('s" . $new_size . "');</script>";
                */

                $old_string = $_COOKIE['cart'];

                for($i = 0; $i < $new_quantity; $i++)
                {
                    //echo "<script>console.log('yo again');</script>";

                    //echo "<script>console.log('raw:" . $old_string . "p" . $pid . "s" . $new_size . "');</script>";
                    
                    $old_string .= "," . $pid . ":" . $new_size;
                    
                }

                //echo $old_string;
                setcookie('cart', $old_string, $expiryTime);

                //echo "yoo";
                //echo "<p>" . $_COOKIE['cart'] . "</p>";
            }

            
            switch($whereto)
            {
                case "Add To Bag":
                    echo '<script>location.replace("/product-page?pid=' . $pid . '");</script>';
                    break;
                case "Purchase" :
                    echo '<script>location.replace("/purchase-page");</script>';
                    break;
                default:
                    echo '<script>location.replace("/search-page");</script>';
                    break;
            }
            
        ?>
    </body>
</html>