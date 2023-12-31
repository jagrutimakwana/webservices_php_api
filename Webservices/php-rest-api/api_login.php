<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$email =$data['semail'];
$pwd =md5($data['spwd']);

include "config.php";

$sel="SELECT * FROM students WHERE email='".$email."' AND pwd='".$pwd."'";
$res=mysqli_query($conn,$sel);
$count=mysqli_num_rows($res);


if ($count> 0) {
    echo json_encode(array('message' => 'Login Success', 'status' => true));
} else {
    echo json_encode(array('message' => 'Login Failed', 'status' => false));
}

?>

