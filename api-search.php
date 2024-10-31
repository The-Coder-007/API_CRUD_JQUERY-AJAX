<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// with POST method 

// $data = json_decode(file_get_contents("php://input"), true);
// $search_value = $data['search'];

// with GET method 
$search_value = isset($_GET['search']) ? $_GET['search'] : die();

include_once('config.php');

$sql = "SELECT * FROM students WHERE name or address LIKE '%{$search_value}%'";

$result = mysqli_query($conn, $sql) or die ("SQL query Failled");

if(mysqli_num_rows($result) > 0){

    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);

}
else {

    echo json_encode(array('message' => "No Search Record Found!", 'status' => false));

}