<?php

require_once ("Include/DB.php");
require_once ("Include/Sessions.php");
require_once ("Include/Functions.php");


if(isset($_POST["Submit"])){
//    $Title=mysqli_real_escape_string($_POST["Title"]);
//    $Post=mysqli_real_escape_string($_POST["Post"]);
//
    $Title= mysqli_real_escape_string($ConnectingDB, $_POST["Title"]);
    $Category=$_POST["Category"];
   $Post= mysqli_real_escape_string($ConnectingDB, $_POST["Post"]);

    date_default_timezone_set("Asia/Dhaka");
    $CurrentTime=time();
    $DateTime=strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);

    $Admin="Explore Bangladesh";
    $Image= $_FILES ["Image"] ["name"];
    $Target="Upload/".basename($_FILES ["Image"] ["name"]);

    if (empty($Title)){
        $_SESSION["ErrorMessage"] ="Title can't be empty";
        Redirect_to("AddNewPost.php");
    }elseif (strlen($Title)<2){
        $_SESSION["ErrorMessage"] ="Title can't be empty";
        Redirect_to("AddNewPost.php");

    }
    else{
        global $ConnectingDB;
        $Query="INSERT INTO admin_panel(datetime,title, category, author, image, post) VALUES ('$DateTime', '$Title', '$Category', '$Admin', '$Image', '$Post')";
        $Execute=mysqli_query($ConnectingDB,$Query);
        move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);

        if($Execute){
            $_SESSION["SuccessMessage"]="Post Added Successfully";
            Redirect_to("AddNewPost.php");


        }else{
            $_SESSION["ErrorMessage"] ="Something Went Wrong, Try Again! $Query";
            Redirect_to("AddNewPost.php");
        }
    }
}

/* login varify */

$userprofile=$_SESSION['user_name'];


if ($userprofile==true){
    echo "Welcome".$_SESSION['user_name'];
}
else{
    header('location:Login.php');
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Post</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/adminstyles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

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
                <li class="active"><a href="AddNewPost.php"> <i class="fas fa-pencil-alt"></i> &nbsp; Add New Post</a></li>
                <br><br>
                <li><a href="Categories.php"> <i class="fas fa-align-left"></i> &nbsp; Categories</a></li>
                <br><br>
                <li><a href="Logout.php"> <i class="fas fa-sign-out-alt"></i> &nbsp; Logout</a></li>
                <br><br>

            </ul>




        </div> <!--Ending of side area-->
        <div class="col-sm-10">
            <br> <br> <br>
            <h4>Add New Post</h4>
            <?php echo Message();
            echo SuccessMessage();
            ?>

            <div>

                <form action="AddNewPost.php" method="post" enctype="multipart/form-data">

                    <fieldset>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input class="form-control" type="text" name="Title" id="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="categoryselect">Category:</label>
                            <select class="form-control" id="categoryselect" name="Category">

                                <?php

                                global  $ConnectingDB;
                                $ViewQuery = "SELECT * FROM category ORDER BY datetime desc ";
                                $Execute=mysqli_query($ConnectingDB, $ViewQuery);


                                while($DataRows=mysqli_fetch_array($Execute)){
                                $Id=$DataRows["id"];

                                $CategoryName=$DataRows["name"];

                                ?>

                                <option><?php echo $CategoryName ?> </option>
                                <?php } ?>

                            </select>
                        </div>
                        <br>

                    </fieldset>
                    <br>
                    <div class="form-group">
                        <label for="imageselect">Select Image:</label>
                        <input type="File" class="form-control" name="Image" id="imageselect">
                    </div>
                    <div class="form-group">
                        <label for="postarea">Post:</label>
                        <textarea class="form-control" name="Post" id="postarea"></textarea>
                    <br>
                        <input class="btn btn-dark btn-block" type="Submit" name="Submit" value="Add New Post">
                    

                </form>

            </div>


</div> <!-- ending of main area -->
</div> <!-- ending row -->


</div> <!-- ending of container -->

<div id="Footer">
    <hr><p> Explore Bangladesh | &copy;2019-2020 --- All right reserved</p>
    <a class="footer" target="_blank">
        <p>
            &trade;Explore Bangladesh &trade;</p>
    </a>

</div>



</body>
</html>