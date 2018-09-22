<?php 
   //즐겨찾는 관광지 등록 
   $con=mysqli_connect("localhost","qkddmswl1234","Tjdnfrhdah","qkddmswl1234");
  

  $place_idx = $_POST["place_idx"];
  $user_id = $_POST["user_id"];    
  $tour_idx=$_POST["tour_idx"];


  $statement = mysqli_prepare($con,"INSERT INTO favor_place VALUES (?,?,?");

  mysqli_stmt_bind_param($statement,"isi",$place_idx, $user_id,$tour_idx); 

  mysqli_stmt_excute($statement);

  $response = array();
  $response["success"]= true; 

  echo json_encode($response);

 ?>
