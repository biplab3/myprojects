<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));
include('../dbconnect.php');
//print_r()

 $sql = "select * from employee where id='$data->id'";
 $stmt = $con->prepare($sql);
 $stmt->execute();
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 if($row==""){
  $array = array('status'=>'success','msg'=>'ID not available');
    echo json_encode([$array]); 
 }
 else{
   $sql1 = "delete from employee where id='$data->id'";
   $stmt1 = $con->prepare($sql1);
   $stmt1->execute();
   //$info = "SELECT * from employee where id='$data->id'";
   $array = array('status'=>'success','msg'=>'Deleted Successfully');
   echo json_encode([$array]); 
 }

 
?>