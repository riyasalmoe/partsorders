<?php
session_start();
include_once 'general.php';
include_once 'dbconnect.php';
include_once 'orderstatus.php';
include_once 'dataReadFunctions.php';

//initSessionVars();

$error = ''; // Variable To Store Error Message

if (!isset($_SESSION['username'])) {
    $_SESSION['loginStatus'] = 0;
    header('Location: signin.php');
}

if ($_SESSION['loginStatus'] === 0) {
    header('Location: signin.php');
}

if( strcasecmp($_SERVER['REQUEST_METHOD'],"POST") === 0) {
    $_SESSION['postdata'] = $_POST;
    header("Location: ".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);
    exit;
}

if(isset($_SESSION['postdata'])) {
    $_POST = $_SESSION['postdata'];
    unset($_SESSION['postdata']);
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
                <a href="./homeInitiator.php" id="signout">Home&nbsp;|&nbsp;</a>
            </li>        
            <li class="nav-item">
                <?php
                    returnLoginStatuswithSignOut();
                ?>
            </li>
        </ul>
    </nav>

    <hr>
    <div class="h4 text-center">New Parts Order Request</div>
    <hr>

<div class="container">
<h4 class="form-group">Request Header</h4>
<hr>
    <form method="post" action="">
        <div class="form-group row">
            <div class="form-group col-1"></div>
            <div class="form-group col-2">
                <label for="jobcardnumber">Job Card Number</label>
                <input type="text" name="jobcardnumber" id="jobcardnumber" class="form-control" autocomplete="off" 
                value="<?php  
                if(isset($_POST['jobcardnumber'])){
                    echo $_POST['jobcardnumber'];
                }
                ?>"
                required autofocus>
            </div>
            <div class="form-group col-4">
                <label for="customername">Customer Name</label>
                <input type="text" name="customername" id="customername" class="form-control" 
                value="<?php  
                if(isset($_POST['customername'])){
                    echo $_POST['customername'];
                }
                ?>"
                 autocomplete="off" required>
            </div>
            <div class="form-group col-2">
                <label for="LpoNumber">LPO#</label>
                <input type="text" name="LpoNumber" id="LpoNumber" class="form-control" 
                value="<?php  
                if(isset($_POST['LpoNumber'])){
                    echo $_POST['LpoNumber'];
                }else {echo "NA";}
                ?>"
                autocomplete="off">
            </div>            
            <div class="form-group col-2">
                <label for="servicetype">Service Type</label>
                <select class="Custom-control form-control-sm form-control-plaintext" name="servicetype" id="servicetype">
                    <option value="0" 
                        <?php  
                        if(isset($_POST['servicetype'])){
                         if ($_POST['servicetype'] == 0){
                             echo ' Selected';
                         }   
                        }else{echo ' Selected';}
                        ?>
                    >Free-Warranty</option>
                    <option value="1"
                    <?php  
                        if(isset($_POST['servicetype'])){
                         if ($_POST['servicetype'] == 1){
                             echo ' Selected';
                         }   
                        }//else{echo 'Selected';}
                        ?>
                    >Chargeable</option>
                </select>
            </div>            
            <div class="form-group col-12">
                <div class="form-group">
                  <label for="comments">Comments</label>
                  <textarea name="comments" id="comments" cols="30" rows="2" class="form-control" maxlength="200"></textarea>
                </div>
            </div>
        </div>
        <h4 class="form-group">Request Details</h4>
        <hr>
        <div class="form-group row">
            <div class="form-group col-2">
                <label for="partnumber">Part#</label>
                <input type="text" name="partnumber" id="partnumber" class="form-control" autocomplete="off"
                    required>
            </div>
            <div class="form-group col-4">
                <label for="partname">Part Description</label>
                <input type="text" name="partname" id="partname" class="form-control" autocomplete="off"
                    required>
            </div>
            <div class="form-group col-2">
                <label for="reqqty">Request Qty</label>
                <input type="number" name="reqqty" id="reqqty" min="1" class="form-control" autocomplete="off"
                    required>
            </div>
            <div class="form-group col-2">
                <label for="vendor">Vendor</label>
                <select class="custom-select" name="vendor" id="vendor">
                    <option value="Epson" selected>Epson</option>
                    <option value="Posiflex">Posiflex</option>
                    <option value="HP">HP</option>
                    <option value="Samsung">Samsung</option>
                    <option value="BOSE">BOSE</option>
                </select>
            </div>
            <div class="form-group col-2">
                <label for="addRequest">&nbsp;</label>
                <button type="submit" id="addRequest" name="addRequest" class="form-control btn btn-secondary align-items-center">Save</button>
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Part#</th>
                    <th>Description</th>
                    <th class="text text-center">Req. Qty</th>
                    <th>Vendor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>

            <?php
            if (isset($_POST['addRequest'])) {
                //echo "yes clicked!";
                $con = dbconn();

                $query = "CALL createRequest('" .
                    $_POST['jobcardnumber'] . "','" .
                    $_POST['customername'] . "','" .
                    $_SESSION['username'] . "','" .
                    $_POST['LpoNumber'] . "','" .
                    $_POST['comments'] . "','" .
                    $_POST['partnumber'] . "','" .
                    $_POST['partname'] . "'," .
                    $_POST['reqqty'] . ",'" .
                    $_POST['servicetype'] . "','" .
                    $_POST['vendor'] . "'" .
                    ")";

                //echo $query;

                if ($stmt = $con->prepare($query)) {
                    $stmt->execute();
                    $stmt->bind_result($Outresult);
                    while ($stmt->fetch()) {
                        if ($Outresult === 1) {
                            displayMessage("Success");
                        } else {
                            displayMessage("Something went wrong!");
                        }
                    }
                    $stmt->close();
                }
                getJobNumberRequests($_POST['jobcardnumber']);
            }
        ?>
            </tbody>
        </table>
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