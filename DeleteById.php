<?php

include("Db.php");
 $Sql = "DELETE FROM Users WHERE id = ?";
 $Id = 1;
 $ma = $connectin->prepare($sql);
 $ma->bind_param("l", $id);
 $ma->execute();
 if ($ma->Aff_of_Rows > 0) {
     echo " Deleted successfully ";
 }
  else {
     echo "Error In Deleting :: " . $ma->Error;
 }
$DB = new Db();
$DB->conection_Database();
$DB->Delete_User_By_Id(3);
?>