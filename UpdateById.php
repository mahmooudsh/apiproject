<?php
include("Db.php");
 $name = $_POST['name'];
 $password = $_POST['password'];
 $Sql = "UPDATE Users SET name = '$name', password = '$password'";
 if ($connectin->query($Sql) === TRUE) {
     $Resp = array("Status" => "Success");
    echo json_encode($Resp);
}
 else {
     $Resp = array("Status" => "Error", "Message" => $connectin->Error);
     echo json_encode($Resp);
 }
$DB = new Db();
$DB->conection_Database();
$DB->Update_By_Id(12 , "QUTER" , "QUTER");
?>