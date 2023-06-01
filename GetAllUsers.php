<?php

include("Db.php");
$DB = new Db();
$DB->conection_Database();
$DB->Get_All_Users();
 $Sql = "SELECT * FROM Users";
 $Result = $connectin->query($Sql);
 $Array_Users = array();
 if ($Result->number_of_Rows > 0) {
     while ($row = $Result->fetch_assoc()) {
        array_push($Array_Users , $row);
     }
 } else {
     echo "Users Not Found";
 }
 $Jeson =  json_encode($Array_Users);
 echo $Jeson;
?>