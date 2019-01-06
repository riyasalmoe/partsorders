<?php
    //session_start();
    include_once('general.php');
    if($loginStatus === 0){
        header('Location: signin.php');
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
                echo "Please Login...";
            } else {
                echo "Hello " . $username . "!";
                //echo '<span><button type="submit" class="btn btn-secondary btn-sm btn-block"><span class="badge badge-secondary">Logout</span></button></span>';
                echo '<small><a id="signout" href="signout.php">&nbsp;(SignOut)</a></small>';
            } 
             ?>
        </li>
    </ul> 
</nav>

<hr>
<hr>


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
