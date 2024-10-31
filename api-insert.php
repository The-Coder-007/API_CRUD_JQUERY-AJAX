<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['sname'];
$age = $data['sage'];
$address = $data['saddress'];

include_once('config.php');

$sql = "INSERT INTO students(name, age, address) VALUES('{$name}', {$age}, '{$address}') ";


if(mysqli_query($conn, $sql)){

    echo json_encode(array('message' => 'Student Record Inserted', 'status' => true));

}
else {

    echo json_encode(array('message' => "Student Record Not Inserted", 'status' => false));

}