<?php
  header("Content-Type: text/html; charset=UTF-8");
  $con = mysqli_connect("localhost", "qkddmswl1234", "Tjdnfrhdah", "qkddmswl1234");

  $user_id=$_POST["user_id"];

  $result=mysqli_query($con,"SELECT bus_num FROM favor_line WHERE user_id='$user_id'");

  $response=array();
  while($row=mysqli_fetch_array($result)){
    array_push($response, array("bus_num"=>$row[0]));
  }

  echo json_encode($response, JSON_UNESCAPED_UNICODE);
  mysqli_close($con);

 ?>
