<?php //session_start();
include_once 'dbconnect.php';
    //Set the table with the below data for a new database setup
    //ID    Description
    // 1    Administrators
    // 2    Approvers
    // 3    Initiators
    // 4    Executers
    // 5    Viewers

$verStatus = "(Alpha)";

function initSessionVars()
{
    if (!isset($_SESSION['loginStatus'])) {
        $_SESSION['loginStatus'] = 0;
    }

    if (!isset($_SESSION['username'])) {
        $_SESSION['username'] = "";
    }

    if (!isset($_SESSION['fullName'])) {
        $_SESSION['fullName'] = "Please Login...";
    }

    //below session variables are used for user authorizations
    if (!isset($_SESSION['Administrators'])) {
        $_SESSION['Administrators'] = 0;
    }
    if (!isset($_SESSION['Approvers'])) {
        $_SESSION['Approvers'] = 0;
    }
    if (!isset($_SESSION['Initiators'])) {
        $_SESSION['Initiators'] = 0;
    }
    if (!isset($_SESSION['Executers'])) {
        $_SESSION['Executers'] = 0;
    }
    if (!isset($_SESSION['Viewers'])) {
        $_SESSION['Viewers'] = 0;
    }
}

function setAuthParams($thisUser) {
    //ID    Description
    // 1    Administrators
    // 2    Approvers
    // 3    Initiators
    // 4    Executers
    // 5    Viewers

    $con = dbconn();

    $query = "CALL getUserRights('" . $thisUser . "')";


    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($RoleID, $RoleName);
        while ($stmt->fetch()) {
            
            switch ($RoleID) {
                case 1:
                $_SESSION['Administrators'] = 1;
                    break;
                case 2:
                    $_SESSION['Approvers'] = 1;                
                    break;
                case 3:
                    $_SESSION['Initiators'] = 1;
                    break;
                case 4:
                    $_SESSION['Executers'] = 1;
                    break;
                case 5:
                    $_SESSION['Viewers'] = 1;
                    break;            
                // default:
                //     # code...
                //     break;
            }
            
        }
        $stmt->close();
    }
}

function clearSessionVars()
{
    if (isset($_SESSION['loginStatus'])) {
        $_SESSION['loginStatus'] = 0;
    }

    if (isset($_SESSION['username'])) {
        $_SESSION['username'] = "";
    }

    if (isset($_SESSION['fullName'])) {
        $_SESSION['fullName'] = "Please Login...";
    }

    //below session variables are used for user authorizations
    if (isset($_SESSION['Administrators'])) {
        $_SESSION['Administrators'] = 0;
    }
    if (isset($_SESSION['Approvers'])) {
        $_SESSION['Approvers'] = 0;
    }
    if (isset($_SESSION['Initiators'])) {
        $_SESSION['Initiators'] = 0;
    }
    if (isset($_SESSION['Executers'])) {
        $_SESSION['Executers'] = 0;
    }
    if (isset($_SESSION['Viewers'])) {
        $_SESSION['Viewers'] = 0;
    }
}

function displayMessage($thisMessage)
{
    $message = $thisMessage;
    echo "<script type='text/javascript'>alert('$message');</script>";
}

//below class is not implimented yet.
class userAuthStatus
{
    //Set the table with the below data for a new database setup
    //ID    Description
    // 1    Administrators
    // 2    Approvers
    // 3    Initiators
    // 4    Executers
    // 5    Viewers
    public $Administrators;
    public $Approvers;
    public $Initiators;
    public $Executers;
    public $Viewers;
}

function returnLoginStatus()
{
    if ($_SESSION['loginStatus'] === 0) {
        # code...
        if (isset($_SESSION['fullName'])) {
            echo $_SESSION['fullName'];} else {echo "Please Login...";}
    } else {
        echo "Hello " . $_SESSION['fullName'] . "!";
    }
}

function returnLoginStatuswithSignOut()
{
    // if ($_SESSION['loginStatus'] === 0) {
    //     # code...
    //     if(isset($_SESSION['fullName'])){
    //     echo $_SESSION['fullName'];}
    //     else{echo "Please Login...";}
    // } else {
    //     echo "Hello " . $_SESSION['fullName'] . "!";
    // }
    if ($_SESSION['loginStatus'] === 0) {
        # code...
        echo "Please Login...";
    } else {
        echo "Hello " . $_SESSION['fullName'] . "!";
        //echo '<span><button type="submit" class="btn btn-secondary btn-sm btn-block"><span class="badge badge-secondary">Logout</span></button></span>';
        echo '<small><a id="signout" href="signout.php">&nbsp;(SignOut)</a></small>';
    }
}
