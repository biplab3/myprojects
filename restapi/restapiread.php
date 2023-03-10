<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));
include('../dbconnect.php');

 $sql = "SELECT * from employee ORDER BY id DESC";
 $stmt = $con->prepare($sql);
 $stmt->execute();
 $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
 if($stmt->rowCount()>0)
 {
    $array = array('status'=>'success','msg'=>$data);
    echo json_encode([$array]); 
 }
  else{
    $array = array('status'=>'success','msg'=>'Data Not Available');
    echo json_encode([$array]);  
  }
?>