<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));
include('../dbconnect.php');
//print_r($data);
 $empname = $data->emp_name;
 $age = $data->age;
 $department = $data->department;

//insert the data in your mysql database
 $sql = "INSERT INTO employee(name,age,department) values('$empname','$age','$department')";
 $stmt = $con->prepare($sql);
 $stmt->execute();
 if($stmt->rowCount()>0)
 {
    $array = array('status'=>'success','msg'=>'Added Successfully');
    echo json_encode([$array]); 
 }
  else{
    $array = array('status'=>'success','msg'=>'Failed to Add');
    echo json_encode([$array]);  
  }
?>