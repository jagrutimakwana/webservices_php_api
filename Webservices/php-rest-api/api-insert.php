<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['sname'];
$email = $data['semail'];
$pwd = md5($data['spwd']);
$age = $data['sage'];
$city = $data['scity'];

include "config.php";

$sql = "INSERT INTO students(sname, email, pwd, age, city) VALUES ('{$name}', '{$email}', '{$pwd}', '{$age}', '{$city}')";

if(mysqli_query($conn, $sql)){
	echo json_encode(array('message' => 'Student Record Inserted.', 'status' => true));

}else{

 echo json_encode(array('message' => 'Student Record Not Inserted.', 'status' => false));

}
?>
