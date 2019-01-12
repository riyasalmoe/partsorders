<?php
//session_start();
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


function getMyRequests($thisUserName) {

    $conn = dbconn();

    $query = "CALL getMyRequests('$thisUserName')";


    if ($stmt = $conn->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($OrderID,$JobCardNo,$CustomerName,$RequestedByID,$FullName,$HeaderComment,$OrderDetailsID,
        $PartNumber,$PartName,$ReqQty,$OrdQty,$RecQty,$ServiceType,$Brand,$Requested,$RequestDate,$RequestTime,
        $Acknowledged,$AckDate,$AckTime,$Approved,$AppDate,$AppTime,$Ordered,$OrdDate,$OrdTime,$Arrived,
        $ArrDate,$ArrTime,$ReleaseRequest,$RelReqDate,$RelReqTime,$Released,$RelDate,$RelTime,$ItemComment,$ETA);
        while ($stmt->fetch()) {
            echo '<tr>';
            echo '<td class="nowrap">' . $JobCardNo . '</td>';
            echo '<td class="nowrap">' . $CustomerName . '</td>';
            echo '<td class="nowrap">' . $RequestDate . '</td>';
            echo '<td>'. $PartNumber .'</td>';
            echo '<td>' . $PartName  . '</td>';
            echo '<td>' . $Brand . '</td>';
            echo '<td class="text text-center">' . $ReqQty . '</td>';
            echo '<td class="text text-center">' . $OrdQty . '</td>';
            echo '<td class="text text-center">' . $RecQty . '</td>';
            echo '<td>';
                echo '<ul class="list-unstyled multi-steps">';
                    if($Requested === 0){
                        echo '<li class="is-active">Requested?</li>';
                        echo '<li>Ordered?</li>';
                        echo '<li>Arrived?</li>';
                    }
                    elseif($Ordered === 0){
                        echo '<li>Requested?</li>';
                        echo '<li class="is-active">Ordered?</li>';
                        echo '<li>Arrived?</li>';
                    }
                    elseif($Arrived === 0){
                        echo '<li>Requested?</li>';
                        echo '<li>Ordered?</li>';
                        echo '<li class="is-active">Arrived?</li>';
                    }
                    else{
                        echo '<li>Requested?</li>';
                        echo '<li>Ordered?</li>';
                        echo '<li>Arrived?</li>';
                    }
                echo '</ul>';
            echo '</td>';
        echo '</tr>';
        }
        $stmt->close();
    }
}




?>