<?php
    #retrieve product info and store it in variables
?>

<!DOCTYPE html>
<html>
    <head>
        <title>DFJJ - </title> <!-- there might be a way to put product name here-->
        <link href="/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="site-styles.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-light mb-4">
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
                <a href="/purchase-form" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                    </svg>
                </a>
            </div>
        </nav>

        <main class="mx-auto">
            <?php

                


            ?>
            <!-- some stuff here in html and php to display product info-->

            <!--example html that can be edited later-->

            <div class="row">
                <div class="col ps-5 me-4">
                    <div id="product-pics" class="carousel slide w-100" data-bs-ride="carousel" data-bs-interval="false">

                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#product-pics" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#product-pics" data-bs-slide-to="1" class aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#product-pics" data-bs-slide-to="2" class aria-label="Slide 3"></button>
                        </div>

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false" data-interval="false">
                                    <rect width="100%" height="100%" fill="#777"></rect>
                                    <text x="50%" y="50%" fill="#555" dey=".3em">First Slide</text>
                                </svg>
                            </div>
                            <div class="carousel-item">
                                <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <rect width="100%" height="100%" fill="#777"></rect>
                                    <text x="50%" y="50%" fill="#555" dey=".3em">Second Slide</text>
                                </svg>
                            </div>
                            <div class="carousel-item">
                                <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <rect width="100%" height="100%" fill="#777"></rect>
                                    <text x="50%" y="50%" fill="#555" dey=".3em">Third Slide</text>
                                </svg>
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#product-pics" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#product-pics" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div>
                </div>
                

                <div class="col ms-3 ps-5 pe-5">
                    <h3>Name</h3>
                    <p>CA$PR.CE</p>
                    <div class="mt-auto">
                        <div class="row">
                            <h6>Colour</h6>
                            <div class="react-select-container css-2b097c-container" id="colour_select">
                                <div class="react-select__control css-1cxv431-control">
                                    <div class="react-select__value-container react-select__value-container--has-value css-1hwfws3">

                                    </div>
                                    <div class="react-select__indicators css-1wy0on6">

                                    </div>
                                    <input name="colour" type="hidden" value="value_0"
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>

        </main>

        <script src="/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>

</html>