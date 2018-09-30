<?php

header("Content-Type: text/html; charset=UTF-8");
$con = mysqli_connect("localhost", "qkddmswl1234", "Tjdnfrhdah", "qkddmswl1234");

$user_id = $_POST["user_id"];

$tour_idx = $_POST["tour_idx"]; 

$result=mysqli_query($con, "DELETE FROM favor_place WHERE user_id='$user_id'and tour_idx='$tour_idx'");

$response = array();
$response["success"] = true;

echo json_encode($response);

 ?>
