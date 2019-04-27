<?php

require_once ("Include/DB.php");
require_once ("Include/Sessions.php");
require_once ("Include/Functions.php");


if(isset($_POST["Submit"])){
//   $Category=mysqli_real_escape_string($_POST["Category"]);
   $Category=$_POST["Category"];
   echo 'C: $Category';

    date_default_timezone_set("Asia/Dhaka");
    $CurrentTime=time();
    $DateTime=strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);

    $Admin="Explore Bangladesh";

    if (empty($Category)){
        $_SESSION["ErrorMessage"] ="All Fields must be filled out";
        Redirect_to("Categories.php");
    } elseif (strlen('$Category')>30){
        $_SESSION["ErrorMessage"] ="Too long Name for Category";
        Redirect_to("Categories.php");

    } else{
        global $ConnectingDB;
        $Query="INSERT INTO category(datetime, name, creatorname) VALUES ('$DateTime', '$Category', '$Admin')";
        echo '<h1>'.$Query.'</h1>';
        $Execute=mysqli_query($ConnectingDB, $Query);

        if($Execute){
            $_SESSION["SuccessMessage"]="Category Added Successfully";
        Redirect_to("Categories.php");


        }else{
            $_SESSION["ErrorMessage"] ="Category faield to Add";
        Redirect_to("Categories.php");
        }
    }
}


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
    <title>Categories</title>
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

                <li><a href="AddNewPost.php"> <i class="fas fa-pencil-alt"></i> &nbsp; Add New Post</a></li>
                <br><br>
                <li class="active"><a href="Categories.php"> <i class="fas fa-align-left"></i> &nbsp; Categories</a></li>
                <br><br>
                <li><a href="Logout.php"> <i class="fas fa-sign-out-alt"></i> &nbsp; Logout</a></li>
                <br><br>

            </ul>




        </div> <!--Ending of side area-->
        <div class="col-sm-10">
            <br> <br> <br>
            <h4>Manage Categories</h4>
            <?php echo Message();
                  echo SuccessMessage();
                  ?>

            <div>

                <form action="Categories.php" method="post">

                    <fieldset>
                        <div class="form-group">
                        <label for="categoryname">Name:</label>
                        <input class="form-control" type="text" name="Category" id="categoryname" placeholder="Name">
                        </div>
                        <br>
                        <input class="btn btn-dark btn-block" type="Submit" name="Submit" value="Add New Category">
                    </fieldset>
                    <br>

                </form>
                
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">

                    <tr>
                        <th>Sr No.</th>
                        <th>Date & Time</th>
                        <th>Category Name</th>
                        <th>Creator Name</th>
                    </tr>

                    <?php

                    global  $ConnectingDB;
                    $ViewQuery = "SELECT * FROM category ORDER BY datetime desc ";
                    $Execute=mysqli_query($ConnectingDB, $ViewQuery);
                    $SrNo=0;

                    while($DataRows=mysqli_fetch_array($Execute)){
                        $Id=$DataRows["id"];
                        $DateTime=$DataRows["datetime"];
                        $CategoryName=$DataRows["name"];
                        $CreatorName=$DataRows["creatorname"];
                        $SrNo++;




                    ?>
                    <tr>
                        <td><?php echo $SrNo; ?></td>
                        <td><?php echo $DateTime; ?></td>
                        <td><?php echo $CategoryName; ?></td>
                        <td><?php echo $CreatorName; ?></td>
                    </tr>
                    <?php } ?>

                </table>
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