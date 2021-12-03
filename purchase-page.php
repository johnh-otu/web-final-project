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
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>DFJJ - Checkout</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">

    

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


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
    <link href="/bootstrap-5.1.3-dist/css/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">

    <!-- Main Header-->
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light mb-4">
            <div class="container-fluid">
                <a href="/search-page">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg>
                </a>
                <span class="navbar-brand mx-auto">
                    <h2 id="dfjj">DFJJ</h2>
                </span>
                <!--<a href="/purchase-page" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                    </svg>
                </a>-->
            </div>
        </nav>
    </header>
    
    <div class="container">
      <main>
        <div class="py-5 text-center">
          <h2>Checkout form</h2>
          <p class="lead">Fill in your information BELOW!</p>
        </div>

        <hr class="my-4">

        <!--Cart-->
        <div class="row g-5">
          <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-primary">Your cart</span>
              <span class="badge bg-primary rounded-pill"><?php echo count($cartArr); ?></span>
            </h4>
            <ul class="list-group mb-3">

                <?php

                    $total = 0;

                    define("connectionString","mysql:dbname=finalproject");
                    define("userName","root");
                    define("password","");

                    $pdo = new PDO(connectionString, userName, password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    for($i = 0; $i < count($cartArr); $i++)
                    {
                        $pid = $cartArr[$i][0];
                        $psize = $cartArr[$i][1];
                        $pprices = $pdo->query("SELECT price FROM products WHERE product_id = " . $pid . ";")->fetchAll()[0];
                        $pprice = $pprices[0];
                        $pnames = $pdo->query("SELECT product_name FROM products WHERE product_id = " . $pid . ";")->fetchAll()[0];
                        $pname = $pnames[0];
                        $total += $pprice;

                        echo '
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">' . $pname . '</h6>
                                    <small class="text-muted">Size: ' . $psize . '</small>
                                </div>
                                <span class="text-muted">$' . $pprice . '</span>
                            </li>';
                    }

                    echo '
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (CAD)</span>
                            <strong>$' . $total . '</strong>
                        </li>';
                ?>
              
            </ul>
          </div>

          <!--Billing information-->
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Billing address</h4>
            <form action="process-purchase.php" method="post" class="needs-validation" novalidate>
              <div class="row g-3">

                <div class="col-sm-6">
                  <label for="firstName" class="form-label">First name</label>
                  <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>

                <div class="col-sm-6">
                  <label for="lastName" class="form-label">Last name</label>
                  <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid last name is required.
                  </div>
                </div>

                <div class="col-12">
                  <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                  <input type="email" class="form-control" id="email" placeholder="you@example.com">
                  <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                  </div>
                </div>

                <div class="col-12">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                  <div class="invalid-feedback">
                    Please enter your shipping address.
                  </div>
                </div>

                <div class="col-12">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control" id="city" placeholder="Exampleville" required>
                  <div class="invalid-feedback">
                    Please enter a valid city.
                  </div>
                </div>

                <div class="col-md-5">
                  <label for="country" class="form-label">Country</label>
                  <select class="form-select" id="country" required>
                    <option value="">Choose...</option>
                    <option>Canada</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>
                </div>

                <div class="col-md-4">
                  <label for="province" class="form-label">Province</label>
                  <select class="form-select" id="province" required>
                    <option value="">Choose...</option>
                    <option>Alberta</option>
                    <option>British Columbia</option>
                    <option>Manitoba</option>
                    <option>New Brunswick</option>
                    <option>Newfoundland and Labrador</option>
                    <option>Northwest Territories</option>
                    <option>Nova Scotia</option>
                    <option>Nunavut</option>
                    <option>Ontario</option>
                    <option>Prince Edward Island</option>
                    <option>Quebec</option>
                    <option>Saskatchewan</option>
                    <option>Yukon</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid province.
                  </div>
                </div>

                <div class="col-md-3">
                  <label for="postal" class="form-label">Postal Code</label>
                  <input type="text" class="form-control" id="postal" placeholder="" required>
                  <div class="invalid-feedback">
                    Postal code required.
                  </div>
                </div>
              </div>

              <hr class="my-4">


              <button class="w-100 btn btn-primary btn-lg" type="submit">Complete Purchase</button>
            </form>
          </div>
        </div>
      </main>

      <!--Footer-->

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017–2021 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>


    <script src="/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>

      <script src="/bootstrap-5.1.3-dist/js/form-validation.js"></script>
  </body>
</html>

