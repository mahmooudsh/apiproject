<?php

include("Db.php");
$DB = new Db();
$DB->conection_Database();
$DB->Insert_Users("Mahmoud" , "7777777");
$Sql = "INSERT INTO users (name, password) VALUES (?, ?)";
 if($_SERVER['REQUEST_METHOD'] == "POST"){
 $name = $_Post['name'];
 $password = $_Post['password'];
 if(isset($name) && isset($password)){
 $ma = $connectin->prepare($Sql);
 $ma->bind_param("tt", $name, $email);
 $ma->execute();
 $Ra->close();
 $connectin->close();
 }
 }
?>