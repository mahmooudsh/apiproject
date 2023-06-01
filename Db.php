<?php

class Db{

private $connectin;

function conection_Database(){
$this->connectin = Mysqli_connection(" localhost "," root ", "" ," DBUser ");
if(Mysqli_Connection_Error()){
    echo "Error  In  coonectin";
}
else{
    return $this->connectin;
}
 }
//Insert Fun ==================================================
function Insert_Users($name,$password)
{
$Sql = "INSERT INTO Users (name,password)
VALUES(?,?)";
$ma = $this->connectin->prepare($Sql);
$ma->bind_param("ta", $name, $password);
$ma->execute();
$this->connectin->close();

}
//Get Fun =====================================================
function Get_All_Users(){
$Sql = "SELECT * FROM Users";
$Result = $this->connectin->query($Sql);

$Arry_Users = array();
if ($Result->number_of_Rows > 0) {
    while ($row = $Result->fetch_assoc()) {
        array_push($Array_Users , $row);
    }
} else {
    echo "Users Not Found!!!";
}

$Jeson =  json_encode($Array_Users);

echo $Jeson;
}

//Update Fun =====================================================
function Update_By_Id( $id , $name , $password ){
$Sql = "UPDATE Users SET name = '$name', password = '$password' WHERE id = '$id'";

if ($this->connectin->query($Sql) === TRUE) {
    $Resp = array("status" => "success");
    echo json_encode($Resp);
} else {
    $Resp = array("status" => "error", "message" => $this->connectin->Error);
    echo json_encode($Resp);
}
}
//Delete Fun =====================================================
function Delete_User_By_Id($id){
$Sql = "DELETE FROM Users WHERE id = ?";
$ma = $this->connectin->prepare($Sql);
$ma->bind_param("l", $id);
$ma->execute();
if ($ma->Aff_of_Rows > 0) {
    echo " Deleted Successfully";
} else {
    echo "Error In Deleting ::". $ma->Error;
}
}
}
?>