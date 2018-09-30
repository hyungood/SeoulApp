<?php 

header("Content-Type: text/html; charset=UTF-8");
   $con=mysqli_connect("localhost","qkddmswl1234","Tjdnfrhdah","qkddmswl1234");
  

  $user_id = $_POST["user_id"];    
  $tour_idx=$_POST["tour_idx"];


  $statement = mysqli_prepare($con,"INSERT INTO favor_place VALUES (NULL,?,?)");

  mysqli_stmt_bind_param($statement,"si",$user_id,$tour_idx); 

  mysqli_stmt_execute($statement);

  $response = array();
  $response["success"]= true; 

  echo json_encode($response,JSON_UNESCAPED_UNICODE);

 ?>
