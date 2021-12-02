
<!doctype html>
<html lang="en">
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
  <link href="sidebars.css" rel="stylesheet">
</head>
<body>
  
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
            <a href="/purchase-form" >
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                </svg>
            </a>
        </div>
    </nav>
</header>

<main>
    <div class="row">

<!---Divider-->

<div class="flex-shrink-0 p-3 bg-white col-2" style="width: 280px;">
    
  <ul class="list-unstyled ps-0">
    <li class="mb-1">
      <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
        Home
      </button>
      <div class="collapse show col" id="home-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="#" class="link-dark rounded">Overview</a></li>
          <li><a href="#" class="link-dark rounded">Updates</a></li>
          <li><a href="#" class="link-dark rounded">Reports</a></li>
        </ul>
      </div>
    </li>
    <li class="mb-1">
      <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
        Dashboard
      </button>
      <div class="collapse" id="dashboard-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="#" class="link-dark rounded">Overview</a></li>
          <li><a href="#" class="link-dark rounded">Weekly</a></li>
          <li><a href="#" class="link-dark rounded">Monthly</a></li>
          <li><a href="#" class="link-dark rounded">Annually</a></li>
        </ul>
      </div>
    </li>
    <li class="mb-1">
      <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
        Orders
      </button>
      <div class="collapse" id="orders-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="#" class="link-dark rounded">New</a></li>
          <li><a href="#" class="link-dark rounded">Processed</a></li>
          <li><a href="#" class="link-dark rounded">Shipped</a></li>
          <li><a href="#" class="link-dark rounded">Returned</a></li>
        </ul>
      </div>
    </li>
    <li class="border-top my-3"></li>
    <li class="mb-1">
      <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
        Account
      </button>
      <div class="collapse" id="account-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="#" class="link-dark rounded">New...</a></li>
          <li><a href="#" class="link-dark rounded">Profile</a></li>
          <li><a href="#" class="link-dark rounded">Settings</a></li>
          <li><a href="#" class="link-dark rounded">Sign out</a></li>
        </ul>
      </div>
    </li>
  </ul>
</div>



<!--<div class="b-example-divider"></div> --> 

<!---Pictures-->


<div class="album py-5 bg-light col">
  <div class="container">
    <?php

      define("connectionString","mysql:dbname=finalproject");
      define("userName","root");
      define("password","");
      $conn = new PDO(connectionString,userName,password);

      $sql = "SELECT * FROM products";
      $statement = $conn->prepare($sql);
      $statement->execute();

      while($result = $statement->fetch(PDO::FETCH_ASSOC))
      {
        $pid = $result['product_id'];
        echo '<div class="caption"><h3>
                <a href="http://localhost/product-page.php?product_id='.$pid.'">
                <img src="data:image/jpeg;base64,'.base64_encode($result['image']).'" width=200 height=200/> 
                </a>'."</br>" .$result['product_name']. '  
                </h3></div>';    
      }
    ?>
    
</div>
</div>


</main>

<footer class="text-muted py-5">
<div class="container">
  <p class="float-end mb-1">
    <a href="#">Back to top</a>
  </p>
  <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
  <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
</div>
</footer>


    <script src="/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js" int></script>

    <script src="sidebars.js"></script>

      
  </body>
</html>




