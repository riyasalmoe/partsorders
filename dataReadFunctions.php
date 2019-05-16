<?php
include_once('dbconnect.php');

function getJobNumberRequests($thisJobNumber){

    //function getMyRequests($thisUserName) {

        $conn = dbconn();
    
        $query = "CALL getMyJobRequests('$thisJobNumber')";
    
    
        if ($stmt = $conn->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($OrderID,$JobCardNo,$CustomerName,$RequestedByID,$FullName,$HeaderComment,$OrderDetailsID,
            $PartNumber,$PartName,$ReqQty,$OrdQty,$RecQty,$ServiceType,$Brand,$Requested,$RequestDate,$RequestTime,
            $Acknowledged,$AckDate,$AckTime,$Approved,$AppDate,$AppTime,$Ordered,$OrdDate,$OrdTime,$Arrived,
            $ArrDate,$ArrTime,$ReleaseRequest,$RelReqDate,$RelReqTime,$Released,$RelDate,$RelTime,$ItemComment,$ETA);
            while ($stmt->fetch()) {
                echo '<tr>';
                echo '<td>'. $PartNumber .'</td>';
                echo '<td>' . $PartName  . '</td>';
                echo '<td class="text text-center">' . $ReqQty . '</td>';
                echo '<td>' . $Brand . '</td>';
                //echo '<td class="text text-center">' . $OrdQty . '</td>';
                //echo '<td class="text text-center">' . $RecQty . '</td>';
                echo '</tr>';
            }
            $stmt->close();
        }
}
?>