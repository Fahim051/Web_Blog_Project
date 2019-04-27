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
    <title>Contact Us</title>
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
                <li class="nav-item ">
                    <a href="About.php" class="nav-link">About Us</a>
                </li>


                <li class="nav-item active">
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


<section id="contact" class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Get In Touch</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aspernatur ducimus est harum itaque modi necessitatibus nesciunt nisi quod voluptate? Autem doloribus eligendi libero maiores nihil pariatur sequi voluptates! Accusamus autem facilis sint temporibus. Aliquid cupiditate hic illo maxime sunt!</p>
                        <h4>Address</h4>
                        <p>Bangladesh Army University of Science and Technology <br> Saidpur, Bangladesh</p>
                        <h4>Email</h4>
                        <p class="e">fahimshahriar@gmail.com <br><br> shameharahmatullah@gmai.com <br><br> tithidebnath@gmail.com <br><br> mumtahinamouly@yahoo.com</p>
                        <h4>Phone</h4>
                        <p>(+880)1231645659 <br><br> (+880)12316584 <br><br> (+880)1231646957 <br><br> (+880)12315555 </p>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<br><br><br>

<section id="staff" class="py-5 text-center bg-light text-dark">
    <div class="container">
        <h1>Our Staff</h1>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <img src="images/fahim.jpg" alt="" class="img-fluid rounded-circle mb-2">
                <h4>Fahim Shahriar</h4>
            </div>
            <div class="col-md-3">
                <img src="images/s.jpg" alt="" class="img-fluid rounded-circle mb-2">
                <h4>Shameha Rahmatullah</h4>
            </div>
            <div class="col-md-3">
                <img src="images/c.jpg" alt="" class="img-fluid rounded-circle mb-2">
                <h4>Tithi Debnath</h4>
            </div>
            <div class="col-md-3">
                <img src="images/m.png" alt="" class="img-fluid rounded-circle mb-2">
                <h4>Mumtahina Mouly</h4>
            </div>
        </div>

    </div>
</section>

<div id="Footer">
    <hr><p> Explore Bangladesh | &copy;2019-2020 --- All right reserved</p>
    <a class="footer" target="_blank">
        <p>
            &trade;Explore Bangladesh &trade;</p>
    </a>

</div>

</body>
</html>