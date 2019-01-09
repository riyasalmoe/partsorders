<?php
session_start();
include_once 'general.php';
include_once 'dbconnect.php';

//initSessionVars();

if (!isset($_SESSION['username'])) {
    $_SESSION['loginStatus'] = 0;
    header('Location: signin.php');
}

if ($_SESSION['loginStatus'] === 0) {
    header('Location: signin.php');
}

if (isset($_SESSION['loginStatus'])){
    if($_SESSION['loginStatus']===1){
        header('Location: homeinitiator.php'); //Should define a php function to decide the home page of the user based on rights
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
    <link rel="stylesheet" href="css/multistep.css">

    <title>Home Page</title>

</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="./Login.php" class="navbar-brand">ALMOE SERVICE CENTRE<small>Part Order Management
                <?php echo $verStatus ?></small></a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <?php
                    returnLoginStatuswithSignOut();
                ?>
            </li>
        </ul>
    </nav>

    <hr>
        <div class="h4 text-secondary text-center">My Part Order Requests</div>
    <hr>

    <div class="row">
        <div class="col-sm-2">
            
        </div>
        <div class="col-sm-8">
        
        </div>
        <div class="col-sm-2">
            
        </div>
    </div>

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