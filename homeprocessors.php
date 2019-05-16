<?php
session_start();
include_once 'general.php';
include_once 'dbconnect.php';
include_once 'orderstatus.php';

//initSessionVars();

if (!isset($_SESSION['username'])) {
    $_SESSION['loginStatus'] = 0;
    header('Location: signin.php');
}

if ($_SESSION['loginStatus'] === 0) {
    header('Location: signin.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Other CSS -->
    <link rel="stylesheet" href="css/helper.css">
    <link rel="stylesheet" href="css/multistep.css">    
    
    <title>Parts Orders</title>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="./Login.php" class="navbar-brand">ALMOE SERVICE CENTRE<small>Part Order Management
                <?php echo $verStatus ?></small></a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <!-- <a href="./newrequest.php" id="signout">New Order Request&nbsp;|&nbsp;</a> -->
            </li>
            <li class="nav-item">
                <?php
                    returnLoginStatuswithSignOut();
                ?>
            </li>
        </ul>
    </nav>



</body>
</html>