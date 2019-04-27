<?php

require_once ("Include/DB.php");
require_once ("Include/Sessions.php");
require_once ("Include/Functions.php");

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/publicstyles.css">
</head>
<body>


<nav class="navbar navbar-expand-sm navbar-light bg-outline-info">
    <div class="container">
        <a href="Blog.php" class ="navbar-brand">
            <img src="images/brands.png" width=200; height=35;>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a href="Home.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="Blog.php" class="nav-link">Blog</a>
                </li>
                <li class="nav-item active">
                    <a href="About.php" class="nav-link">About Us</a>
                </li>


                <li class="nav-item">
                    <a href="Contact.php" class="nav-link">Contact</a>
                </li>
            </ul>
            <form action="Blog.php" class="form-inline">
                <input class="form-control" type="text" placeholder="Search" name="Search">
                <button class="btn btn-danger" type="submit" name="SearchButton">Search</button>
            </form>


        </div>

    </div>

</nav>



<header id="page-header">
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto text-center">
            <h1 class="x">About Us</h1>
        </div>
    </div>
</div>
</header>

<section id="about" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="he">About Us</h1>
                <p class="p">Explore Bangladesh is a website for travelers who wants to explore this beautiful country. In todays world information is crucial, especially when travelling to a new destination. This website provides viewers with priceless, media rich information that raises awareness to destinations around Bangladesh. In this website travelers can share their extraordinary experiences and sharing the journey with other travel enthusiasts. The best activities, what/where to eat, nightlife, accommodation and much more.</p>
            </div>
            <div class="col-md-6">
                <img src="images/picture.png" alt="" class="img-fluid rounded-circle d-none d-md-block about-img">
            </div>
        </div>
    </div>
</section>

<br> <br> <br>

<div id="Footer">
    <hr><p> Explore Bangladesh | &copy;2019-2020 --- All right reserved</p>
    <a class="footer" target="_blank">
        <p>
            &trade;Explore Bangladesh &trade;</p>
    </a>

</div>

</body>
</html>