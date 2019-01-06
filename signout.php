<?php
    //session_start();
    include_once('general.php');
    $loginStatus = 0;
    $username = "Please Sign-In";
    session_destroy();
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
    <link rel="stylesheet" href="./helper.css">

    <title>Default template</title>

</head>

<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a href="./Login.php" class="navbar-brand">ALMOE SERVICE CENTRE<small>Part Order Management <?php echo $verStatus ?></small></a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <?php if ($loginStatus === 0) {
                # code...
                echo $username;
            } else {
                echo "Hello " . $username . "!";
            }
             ?>
        </li>
    </ul> 
</nav>

<hr>
<hr>

<div class="row">
    <div class="col-sm-4">
        <!-- this place is blank -->
    </div>
        <div class="col-sm-4">
            <div class="alert alert-success text-center" role="alert">
                You are succesfully signout from the system!
            </div>
            <div class="text-center">
                <a href="signin.php" class="btn btn-secondary btn-block">Click here to Sign-In...</a>
            </div>
        </div>
    <div class="col-sm-4">
        <!-- this place is blank -->
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