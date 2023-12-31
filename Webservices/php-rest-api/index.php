<?php
header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
include('config.php');
$sel="select * from students";
$res=mysqli_query($conn,$sel) or die("Select Query Failed.");
$count=mysqli_num_rows($res) ;
if($count >0){
   $output= mysqli_fetch_all($res, MYSQLI_ASSOC);
   echo json_encode($output);
}
else{
    echo json_encode(array("message" => "No Product Found.", "status" => false));
}
?>