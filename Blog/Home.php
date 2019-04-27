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
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/publicstyles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
                <li class="nav-item active">
                    <a href="Home.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="Blog.php" class="nav-link">Blog</a>
                </li>
                <li class="nav-item ">
                    <a href="About.php" class="nav-link">About Us</a>
                </li>


                <li class="nav-item ">
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



<section>
    <img src="images/lalakhal-sylhet-ruposhi-bangladesh.png" style="height: 500px"; width="1493px;">
    <h1 class="h">“jobs fill your pocket <br> Adventures fill your soul”</h1>
</section>

<br><br><br>


<div class="row">
<div class="offset-sm-1 col-sm-5">
<div class="card ">
    <div class="card-header  bg-danger">
        <h2 class="card-title">Recent Posts</h2>
    </div>
    <div class="card-body">

        <?php

        global $ConnectingDB;
        $ViewQuery="SELECT * FROM admin_panel ORDER BY datetime desc LIMIT 0,5";
        $Execute =mysqli_query($ConnectingDB, $ViewQuery);
        while ($DataRows=mysqli_fetch_array($Execute)){
            $Id=$DataRows["id"];
            $Title=$DataRows["title"];
            $DateTime=$DataRows["datetime"];
            $Image=$DataRows["image"];
            ?>
            
            <div>
                <img class="float-left" style="margin-top: 10px; margin-left: 10px;" src="Upload/<?php echo htmlentities($Image); ?>"width="70px"; height="70px">
                <a href="FullPost.php?id=<?php echo $Id;?>">
                <p id="heading" style="margin-left: 60px;"><?php echo htmlentities($Title); ?></p>
                </a>
                <p class="description" style="margin-left: 60px;"><?php echo htmlentities($DateTime); ?></p>
                <hr>

            </div>
            
       <?php } ?>


    </div>
    <div class="card-footer bg-danger"></div>
</div>
</div>
    <div class="offset-sm-1 col-sm-3 ctgry">
        <div class="card">
            <div class="card-header bg-danger">
                <h2 class="card-title">Category</h2>
            </div>
            <div class="card-body">

                <?php

                global $ConnectingDB;
                $ViewQuery="SELECT * FROM category ORDER BY  datetime desc ";
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
            <div class="card-footer bg-danger">

            </div>
        </div>
</div>
</div>

<br> <br> <br> <br> <br>

<h1 class="k">Beautiful Bangladesh</h1>

<br> <br>

<div class="container-fluid">
    <div class="video">

    <video controls>
        <source src="Video/2018%20Recap%20Beautiful%20Bangladesh%20Travel%20Film.mp4 " type="video/mp4">
    </video>
    </div>

</div>

<br><br><br>




<section id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3746984.5855558836!2d88.09996593838902!3d23.490578837072043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adaaed80e18ba7%3A0xf2d28e0c4e1fc6b!2sBangladesh!5e0!3m2!1sen!2sbd!4v1555885964299!5m2!1sen!2sbd" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

   </section>

<br> <br>

<div id="Footer">
    <hr><p> Explore Bangladesh | &copy;2019-2020 --- All right reserved</p>
    <a class="footer" target="_blank">
        <p>
            &trade;Explore Bangladesh &trade;</p>
    </a>

</div>

</body>
</html>