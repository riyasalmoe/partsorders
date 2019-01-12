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
    <div class="h4 text-center">My Part Order Requests</div>
    <hr>

    <div class="row">
        <!--        <div class="col-sm-1">
            
        </div> -->
        <div class="col-sm-12">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th style="width: 5%;">Job#</th>
                        <th style="width: 5%;">Customer</th>
                        <th style="width: 7%;">Req. Date</th>
                        <th style="width: 7%;">Part#</th>
                        <th style="width: 15%;">Description</th>
                        <th style="width: 5%;">Vendor</th>
                        <th style="width: 6%;" class="text text-center">Req. Qty</th>
                        <th style="width: 6%;" class="text text-center">Ord. Qty</th>
                        <th style="width: 6%;" class="text text-center">Rcvd. Qty</th>
                        <th style="width: 20%;" class="text text-center">Status</th>
                    </tr>
                    <tr>
<!--                     <form action="" method="post">
                        <th style="width: 5%;">Job#</th>
                        <th style="width: 5%;">Customer</th>
                        <th style="width: 7%;">Req. Date</th>
                        <th style="width: 7%;">Part#</th>
                        <th style="width: 15%;">Description</th>
                        <th style="width: 5%;">Vendor</th>
                        <th style="width: 6%;" class="text text-center"></th>
                        <th style="width: 6%;" class="text text-center"></th>
                        <th style="width: 6%;" class="text text-center"></th>
                        <th style="width: 20%;" class="text text-center"></th>
                        </form>  -->                       
                    </tr>
                </thead>
                <tbody>
<!--                     <tr>
                        <td class="nowrap">192112</td>
                        <td class="nowrap">09-01-2019</td>
                        <td>16931811111</td>
                        <td>MAIN BOARD</td>
                        <td>Samsung</td>
                        <td class="text text-center">2</td>
                        <td class="text text-center">2</td>
                        <td class="text text-center">0</td>
                        <td>
                            <ul class="list-unstyled multi-steps">
                                <li>Requested?</li>
                                <li class="is-active">Ordered?</li>
                                <li>Arrived?</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="nowrap">192113</td>
                        <td class="nowrap">20-01-2019</td>
                        <td>16931821111</td>
                        <td>EXPANSION BOARD</td>
                        <td>Brother</td>
                        <td class="text text-center">4</td>
                        <td class="text text-center">2</td>
                        <td class="text text-center">0</td>
                        <td>
                            <ul class="list-unstyled multi-steps">
                                <li class="is-active">Requested?</li>
                                <li>Ordered?</li>
                                <li>Arrived?</li>
                            </ul>
                        </td>
                    </tr> -->

                    <?php getMyRequests($_SESSION['username']);?>
                </tbody>
            </table>
        </div>
        <!--        <div class="col-sm-1">
            
        </div> -->
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