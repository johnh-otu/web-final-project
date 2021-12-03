<?php
    #connect to database and retrieve product info
    #turn products into an array of product objects?

    try
    {
        define("connectionString","mysql:dbname=finalproject");
        define("userName","root");
        define("password","");

        $pdo = new PDO(connectionString, userName, password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $condition = array();
        $condition[0] = "1";

        echo "<script>console.log('yo');</script>";
        echo "<script>console.log('". isset($_GET['c']) ."');</script>";

        if(count($_GET) >= 1) //for filtering
        {

            if(isset($_GET['g']))
            {
                $gender = $_GET['g'];
                $condition[1] = " AND gender = " . $pdo->quote($gender) . " OR 'Unisex'";
            }
            if(isset($_GET['c']))
            {
                $colour = $_GET['c'];
                $condition[2] = " AND color = " . $pdo->quote($colour);
            }
            if(isset($_GET['t']))
            {
                $type = $_GET['t'];
                $condition[3] = " AND type = " . $pdo->quote($type);
            }
        }
        
        $sql = "SELECT * FROM products WHERE ". $condition[0] . (isset($condition[1])?$condition[1]:""). (isset($condition[2])?$condition[2]:""). (isset($condition[3])?$condition[3]:"") .";";
        echo '<script>console.log("sql value: '. $sql .'");</script>';
        $products = $pdo->query($sql)->fetchAll(); //returns as a 2-D array

        $pdo = null; //disconnect
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Album example · Bootstrap v5.1</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">

        
        <!-- Bootstrap core CSS -->
        <link href="/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" >



        <style>
            .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            }

            @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
            }
        </style>

        
        <!-- Custom styles for this template -->
        <link href="/bootstrap-5.1.3-dist/css/sidebars.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">
                <a href="/search-page" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg>
                </a>
                <span class="navbar-brand mx-auto">
                    <h2 id="dfjj">DFJJ</h2>
                </span>
                <a href="/purchase-page" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                    </svg>
                </a>
            </div>
        </nav>

        <!--main-->
        
        <div class="row">

            <!---Divider-->

            <div class="row">
                <!--<form method="get" action="search-page.php">-->
                    <div class="flex-shrink-0 p-3 bg-white col-2" style="width: 280px;">
                        <ul class="list-unstyled ps-0">
                            <li class="mb-1">
                            <!--<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#gender-collapse" aria-expanded="false">
                                Gender
                            </button>-->
                            <div class="ms-4"><h5>Gender</h5></div>
                            <div class="col" id="gender-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><input type="radio" name="g" value="Men" id="g-m" class="ms-4 me-3"><label for="g-m">Men</label></li>
                                <li><input type="radio" name="g" value="Women" id="g-w" class="ms-4 me-3"><label for="g-w">Women</label></li>
                                <li><input type="radio" name="g" value="Unisex" id="g-u" class="ms-4 me-3"><label for="g-u">Unisex</label></li>
                                </ul>
                            </div>
                            </li>
                            <li class="mb-1">
                            <!--<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#colour-collapse" aria-expanded="false">
                                Colour
                            </button>-->
                            <div class="ms-4"><h5>Colour</h5></div>
                            <div class="" id="colour-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><input type="radio" name="c" value="Red" id="c-r" class="ms-4 me-3"><label for="c-r">Red</label></li>
                                <li><input type="radio" name="c" value="Blue" id="c-b" class="ms-4 me-3"><label for="c-b">Blue</label></li>
                                <li><input type="radio" name="c" value="Black" id="c-k" class="ms-4 me-3"><label for="c-k">Black</label></li>
                                <li><input type="radio" name="c" value="Gray" id="c-a" class="ms-4 me-3"><label for="c-a">Gray</label></li>
                                <li><input type="radio" name="c" value="Green" id="c-g" class="ms-4 me-3"><label for="c-g">Green</label></li>
                                <li><input type="radio" name="c" value="White" id="c-w" class="ms-4 me-3"><label for="c-w">White</label></li>
                                <li><input type="radio" name="c" value="Purple" id="c-p" class="ms-4 me-3"><label for="c-p">Purple</label></li>
                                <li><input type="radio" name="c" value="Pink" id="c-n" class="ms-4 me-3"><label for="c-n">Pink</label></li>
                                </ul>
                            </div>
                            </li>
                            <li class="mb-1">
                            <!--<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#style-collapse" aria-expanded="false">
                                Style
                            </button>-->
                            <div class="ms-4"><h5>Style</h5></div>
                            <div class="" id="style-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><input type="radio" name="t" value="Top" id="t-t" class="ms-4 me-3"><label for="t-t">Tops</label></li>
                                <li><input type="radio" name="t" value="Bottom" id="t-b" class="ms-4 me-3"><label for="t-b">Bottoms</label></li>
                                <li><input type="radio" name="t" value="Accessories" id="t-a" class="ms-4 me-3"><label for="t-a">Accessories</label></li>
                                </ul>
                            </div>
                            </li>
                            <li class="border-top my-3"></li>
                            <li class="mb-1">
                            <!--<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#filter-collapse" aria-expanded="false">
                                Filter
                            </button>-->
                            <div class="ms-4"><h5>Order</h5></div>
                            <div class="" id="filter-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><input type="radio" name="f" value="AZ" id="f-a" class="ms-4 me-3"><label for="f-a">A-Z</label></li>
                                <li><input type="radio" name="f" value="ZA" id="f-z" class="ms-4 me-3"><label for="f-z">Z-A</label></li>
                                <li><input type="radio" name="f" value="HL" id="f-h" class="ms-4 me-3"><label for="f-h">High-Low Price</label></li>
                                <li><input type="radio" name="f" value="LH" id="f-l" class="ms-4 me-3"><label for="f-l">Low-High Price</label></li>
                                </ul>
                            </div>
                            </li>
                            <li>
                                <button type="submit" class="w-100 btn btn-primary mt-3" onclick="yandevCode()">Search <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg></button>
                            </li>
                        </ul>
                        <script>
                            function yandevCode()
                            {
                                gender = "";
                                colour = "";
                                type = "";
                                filter = "";

                                //gender
                                if(document.getElementById("g-m").checked)
                                {
                                    gender="g=Men";
                                }
                                else if (document.getElementById("g-w").checked)
                                {
                                    gender="g=Women";
                                }
                                else if (document.getElementById("g-u").checked)
                                {
                                    gender="g=Unisex";
                                }

                                //colour
                                if(document.getElementById("c-r").checked)
                                {
                                    colour="c=Red";
                                }
                                else if (document.getElementById("c-b").checked)
                                {
                                    colour="c=Blue";
                                }
                                else if (document.getElementById("c-k").checked)
                                {
                                    colour="c=Black";
                                }
                                else if (document.getElementById("c-a").checked)
                                {
                                    colour="c=Gray";
                                }
                                else if (document.getElementById("c-g").checked)
                                {
                                    colour="c=Green";
                                }
                                else if (document.getElementById("c-w").checked)
                                {
                                    colour="c=White";
                                }
                                else if (document.getElementById("c-p").checked)
                                {
                                    colour="c=Purple";
                                }
                                else if (document.getElementById("c-n").checked)
                                {
                                    colour="c=Pink";
                                }

                                //type
                                if(document.getElementById("t-t").checked)
                                {
                                    type="t=Top";
                                }
                                else if (document.getElementById("t-b").checked)
                                {
                                    type="t=Bottom";
                                }
                                else if (document.getElementById("t-a").checked)
                                {
                                    type="t=Accessories";
                                }

                                //filter/order
                                if(document.getElementById("f-a").checked)
                                {
                                    filter="f=AZ";
                                }
                                else if (document.getElementById("f-z").checked)
                                {
                                    filter="f=ZA";
                                }
                                else if (document.getElementById("f-h").checked)
                                {
                                    filter="f=HL";
                                }
                                else if (document.getElementById("f-l").checked)
                                {
                                    filter="f=LH";
                                }

                                url = "/search-page?" + gender + "&" + colour + "&" + type + "&" + filter;
                                location.replace(url);
                            }
                        </script>
                    </div>
                <!--</form>-->
            <div class="b-example-divider"></div> 

            <!---Pictures-->

            <div class="album py-5 bg-light col">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        
                        <?php

                            for($i = 0; $i < count($products); $i++)
                            {
                                $pname = $products[$i]['product_name'];
                                $pprice = $products[$i]['price'];
                                $pimg = $products[$i]['image'];
                                $pid = $products[$i]['product_id'];

                                #<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="'. $pimg .'" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                                echo '
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <img src="data:image/jpeg;base64,'.base64_encode($pimg).'" width=200 height=200 class="mx-auto"/> 
                                        <div class="card-body">
                                            <p style="text-align:center;">
                                                <a href="/product-page?pid='. $pid .'">
                                                <span>'. $pname .'</span>
                                                </a>
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small style="text-align:center;" class="text-muted">$'. $pprice .'</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>


        <footer class="text-muted py-5">
            <div class="container">
                <p class="mx-4">
                    <a href="#">Back to top</a>
                </p>
            </div>
        </footer>


        <script src="/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js" int></script>

        <script src="/bootstrap-5.1.3-dist/js/sidebars.js"></script>
        
    </body>
</html>