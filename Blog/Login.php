<?php
require_once ("Include/DB.php");
require_once ("Include/Sessions.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src = "js/script.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>
<form name="loginform" action="Login.php" method="post" onsubmit="return loginValidation()" >
<div class="login-box">
    <h1>Login</h1>
    <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Username" name="username" value="">
    </div>

    <div class="textbox">
        <i class="fas fa-unlock-alt"></i>
        <input type="password" placeholder="Password" name="password" value="">

    </div>
    <input class="btn btn-dark" type="submit" name="submit" value="Login">
</div>
</form>

<?php


if (isset($_POST["submit"])){

    $user=$_POST['username'];
    $pwd=$_POST['password'];

    global  $ConnectingDB;

    $query= "SELECT * FROM reg WHERE username='$user' && password='$pwd'";
    $data=mysqli_query($ConnectingDB,$query);
    $total=mysqli_num_rows($data);

    if ($total==1){
        $_SESSION['user_name']=$user;
        header('location:Categories.php');
    }
    else{
        echo "login failed";
    }

}




?>


</body>
</html>
