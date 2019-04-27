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
    <title>Blog</title>
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
                <li class="nav-item active">
                    <a href="Blog.php" class="nav-link">Blog</a>
                </li>
                <li class="nav-item">
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

<div class="container"> <!--Container-->
    <br> <br> <br> <br> <br>
    <div class="row"> <!--Row-->
        <div class="col-sm-7"> <!--Main Blog Area -->
        <?php
        global $ConnectingDB;
        if (isset($_GET["SearchButton"])){
            $Search= $_GET["Search"];
            $ViewQuery="SELECT * FROM admin_panel WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%'
            OR category LIKE '%$Search%' OR post LIKE '%$Search%' ";
        }
        /*category */

        elseif (isset($_GET["Category"])){
            $Category=$_GET["Category"];
            $ViewQuery="SELECT * FROM admin_panel WHERE category = '$Category' ORDER BY datetime desc ";
        }

        else{

      /*start*/  $ViewQuery="SELECT * FROM admin_panel ORDER BY datetime desc ";}
        $Execute=mysqli_query($ConnectingDB,$ViewQuery);

        while ($DataRows=mysqli_fetch_array($Execute)){

            $PostId= $DataRows["id"];
            $DateTime= $DataRows["datetime"];
            $Title= $DataRows["title"];
            $Category= $DataRows["category"];
            $Admin= $DataRows["author"];
            $Image= $DataRows["image"];
            $Post= $DataRows["post"];



        ?>
            <div class="blogpost img-thumbnail">
                <img class="img-fluid" src="Upload/<?php echo $Image; ?>">
                <div class="caption">
                    <h1 id="heading"><?php echo htmlentities($Title); ?></h1>
                    <p class="description">Category:<?php echo htmlentities($Category);?>  Publish on  <?php echo  htmlentities($DateTime); ?> </p>
                    <br>
                    <p class="post"><?php


                      if (strlen($Post)>200){
                          $Post=substr($Post, 0, 200).'...';
                      }

                        echo $Post; ?></p>
                </div>
                <a href="FullPost.php?id=<?php echo $PostId; ?>">
                    <span class="btn btn-outline-info">
                        Read More &rsaquo;
                    </span>
                </a>
            </div>
            <?php } ?>

        </div> <!--Blog Area Ending-->
        <div class="offset-sm-1 col-sm-3"> <!--Side Area -->
            <h2> About Us</h2><br>
            <img class="img-fluid rounded-circle imageicon" src="images/picture.png" alt=""><br>
            <p>Explore Bangladesh is a website for travelers who wants to explore this beautiful country. In todays world information is crucial, especially when travelling to a new destination. This website provides viewers with priceless, media rich information that raises awareness to destinations around Bangladesh. In this website travelers can share their extraordinary experiences and sharing the journey with other travel enthusiasts. The best activities, what/where to eat, nightlife, accommodation and much more.</p>

            <!--Category Side menu -->

            <div class="card ">
                <div class="card-header  bg-danger" style="color: white;">
                    <h4 class="card-title">Categories</h4>
                </div>
                <div class="card-body">
                    <?php

                    global $ConnectingDB;
                    $ViewQuery="SELECT * FROM category ORDER BY  datetime desc";
                    $Execute=mysqli_query($ConnectingDB, $ViewQuery);
                    while ($DataRows=mysqli_fetch_array($Execute)){
                        $Id=$DataRows['id'];
                        $Category=$DataRows['name'];

                        ?>
                        <a href="Blog.php?Category=<?php echo $Category; ?>">
                        <span id="heading"><?php echo $Category."<br>"; ?></span>
                        </a>
                    <?php } ?>

                </div>
                <div class="card-footer bg-danger"></div>
            </div>

        </div>  <!--Side Area Ending-->
    </div> <!--Row Ending-->
</div> <!--Container Ending-->
<br> <br>


<div id="Footer">
    <hr><p>Explore Bangladesh | &copy;2019-2020 --- All right reserved</p>
    <a class="footer" target="_blank">
        <p>
            &trade;Explore Bangladesh &trade;</p>
    </a>

</div>

</body>
</html>