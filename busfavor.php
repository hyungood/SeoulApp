<?php 
   //버스 즐겨찾기 db에 insert
   $con=mysqli_connect("localhost","qkddmswl1234","Tjdnfrhdah","qkddmswl1234");
    $line_idx = $_POST["line_idx"];
    $user_id=$_POST["user_id"];
    $bus_num = $_POST["bus_num"];    
  


  $statement = mysqli_prepare($con,"INSERT INTO favor_line VALUES (?,?,?");

  mysqli_stmt_bind_param($statement,"iss",$line_idx, $user_id,$bus_num); 

  mysqli_stmt_excute($statement);

  $response = array();
  $response["success"]= true; 

  echo json_encode($response);

 ?>
