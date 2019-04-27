<?php
session_start();
session_unset();
header('location:Login.php');
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-secondary fixed-top">
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


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <br> <br> <br>

            <ul id="Side_Menu" type="none";>
                <br>

                <li><a href="AddNewPost.php"> <i class="fas fa-pencil-alt"></i> &nbsp; Add New Post</a></li>
                <br><br>
                <li ><a href="Categories.php"> <i class="fas fa-align-left"></i> &nbsp; Categories</a></li>
                <br><br>
                <li class="active"><a href="Logout.php"> <i class="fas fa-sign-out-alt"></i> &nbsp; Logout</a></li>
                <br><br>

            </ul>




        </div>
