<?php
    #connect to database and retrieve product info
    #turn products into an array of product objects?

    try
    {
        $connString = "mysql:host=localhost;dbname=finalproject";
        $user = "root"; //ideally we'd set up a specific user and password but that might be hard to implement
        $pass = "";
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $condition = "1";

        if(count($_GET) > 1)
        {
            $vars = array();

            if(isset($_GET['g']))
            {
                $gender = $_GET['g'];
                $condtition += " AND gender = " . $pdo->quote($gender);
            }
            if(isset($_GET['c']))
            {
                $colour = $_GET['c'];
                $condition += " AND color = " . $pdo->quote($colour);
            }
            if(isset($_GET['t']))
            {
                $type = $_GET['t'];
                $condition += " AND type = " . $pdo->quote($type);
            }
        }
        
        $sql = 'SELECT * from products WHERE '. $condition .';';
        $products = $pdo->query($sql)->fetchAll();

    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }
    


    //$products = array("p1", "p2", "p3", "p4", "p5", "p6", "p7");
    $product_id = 2;
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
        <main class="">
            <div class="row">

                <!---Divider-->

                <div class="row">
                    <div class="flex-shrink-0 p-3 bg-white col-2" style="width: 280px;">
                        
                    <ul class="list-unstyled ps-0">
                        <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                            Men
                        </button>
                        <div class="collapse show col" id="home-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">Shirt</a></li>
                            <li><a href="#" class="link-dark rounded">Pants</a></li>
                            <li><a href="#" class="link-dark rounded">Accesories</a></li>
                            </ul>
                        </div>
                        </li>
                        <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                            Women
                        </button>
                        <div class="collapse" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">Shirt</a></li>
                            <li><a href="#" class="link-dark rounded">Pants</a></li>
                            <li><a href="#" class="link-dark rounded">Accesories</a></li>
                            </ul>
                        </div>
                        </li>
                        <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                            Children
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">Shirt</a></li>
                            <li><a href="#" class="link-dark rounded">Pants</a></li>
                            <li><a href="#" class="link-dark rounded">Accesories</a></li>
                            </ul>
                        </div>
                        </li>
                        <li class="border-top my-3"></li>
                        <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                            Filter
                        </button>
                        <div class="collapse" id="account-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">A-Z</a></li>
                            <li><a href="#" class="link-dark rounded">Z-A</a></li>
                            <li><a href="#" class="link-dark rounded">High-Low Price</a></li>
                            <li><a href="#" class="link-dark rounded">Low-High Price</a></li>
                            </ul>
                        </div>
                        </li>
                    </ul>
                </div>

                <div class="b-example-divider"></div> 

                <!---Pictures-->

                <div class="album py-5 bg-light col">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            
                            <?php

                                for($i = 0; $i < count($products); $i++)
                                {
                                    #echo "<a href='/product-page?pid=" . $product_id . "'>bruh</a>";
                                    $pname = $products[$i]['product_name'];
                                    $pprice = $products[$i]['price'];
                                    $pimg = $products[$i]['image'];
                                    $pid = $products[$i]['product_id'];

                                    echo '
                                    <div class="col">
                                        <div class="card shadow-sm">
                                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="'. $pimg .'" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                                    
                                            <div class="card-body">
                                                <p>
                                                    <a href="/product-page?pid='. $pid .'">
                                                    <span>'. $pname .'</span>
                                                    </a>
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <small class="text-muted">$'. $pprice .'</small>
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


        </main>

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