<?php
session_start();
include_once 'general.php';
include_once 'dbconnect.php';
include_once 'verifyUser.php';

//initSessionVars();

$error = ''; // Variable To Store Error Message

if (!isset($_SESSION['loginStatus'])) {
    initSessionVars();
}

if(isset($_SESSION['loginStatus'])){
    if($_SESSION['loginStatus'] == 1){

        if($_SESSION['Administrators'] == 1){
            header('Location: homeinitiator.php'); //must change to some other page later.
        }elseif($_SESSION['Approvers'] == 1){
            //header('Location: homeinitiator.php');
        }elseif($_SESSION['Initiators'] == 1){
            header('Location: homeinitiator.php');
        }elseif($_SESSION['Executers'] == 1){
            header('Location: homeprocessors.php');
        }elseif($_SESSION['Viewers'] == 1){
            //header('Location: homeprocessors.php');
        }        
    
    }
}

if (isset($_POST['login'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $_SESSION['loginStatus'] = 0;
        $_SESSION['fullName'] = "Please Login...";
        $error = "Username or Password is invalid";} else {
        if (AuthenticateUser($_POST['username'], $_POST['password'])) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['fullName'] = getFullName($_POST['username']);
            $_SESSION['loginStatus'] = 1;
            
            setAuthParams($_SESSION['username']);

            if($_SESSION['Administrators'] == 1){
                header('Location: homeinitiator.php'); //must change to some other page later.
            }elseif($_SESSION['Approvers'] == 1){
                //header('Location: homeinitiator.php');
            }elseif($_SESSION['Initiators'] == 1){
                header('Location: homeinitiator.php');
            }elseif($_SESSION['Executers'] == 1){
                header('Location: homeprocessors.php');
            }elseif($_SESSION['Viewers'] == 1){
                //header('Location: homeprocessors.php');
            }
            
        } else {
            $error = "<small class=\"text-danger\">Invalid User Name or Password!</small>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Other CSS -->
    <link rel="stylesheet" href="css/helper.css">

    <title>Sign In</title>

</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="./Login.php" class="navbar-brand">ALMOE SERVICE CENTRE<small>Part Order Management
                <?php echo $verStatus ?></small></a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <?php
                    returnLoginStatus();
                ?>
            </li>
        </ul>
    </nav>

    <hr>
    <hr>

    <form action="" id="signin" method="post">
        <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" name="username" id="username" class="form-control" autocomplete="off" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" autocomplete="off" required>
        </div>
        <div class="form-group">
            <span>
                <?php echo $error; ?></span>
        </div>
        <div class="form-group">
            <button id="login" name="login" type="submit" class="btn btn-outline-secondary float-right">Login</button>
        </div>

    </form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="./node_modules/popper.js/dist/popper.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

</body>

</html>