<?php
include_once('general.php');
include_once('dbconnect.php');

function AuthenticateUser($thisUserName,$thisPassword){
    $retVal = false;
    $conn = dbconn();

    $query = "CALL verifyUser('" . $thisUserName . "', '" .
    $thisPassword . "')";
    
      //run the store proc
      $result = mysqli_query($conn,$query) or die("Query fail: " . mysqli_error($conn));

      //loop the result set
      while ($row = mysqli_fetch_array($result)){   
        $resultval = $row[0];
        if($resultval>0){
        $retVal = true;}
        break;
      }
      
      $conn = null;
      $query = "";

      return $retVal;

}

function getFullName($thisUserName){
    $fullName = "";
     $conn = dbconn();

     $query = "CALL getUserFullName('" . $thisUserName .  "')";

     //run the store proc
     $result = mysqli_query($conn,$query) or die("Query fail: " . mysqli_error($conn));

     //loop the resultset
     while ($row = mysqli_fetch_array($result)){
         $resultval = $row[0];
         $fullName = $resultval;
     }
      $conn = null;
      $query = "";

      return $fullName;
}


?>