<?php 
header("Content-Type: text/html; charset=UTF-8");
   $con=mysqli_connect("localhost","qkddmswl1234","Tjdnfrhdah","qkddmswl1234");
   
  $review_idx = $_POST["user_id"];    
  $tour_idx = $_POST["tour_idx"];

  $review_score=$_POST["review_score"];

  $review_context=$_POST["review_content"];
  

  $statement = mysqli_prepare($con,"INSERT INTO review VALUES (?,?,?,?)");


  mysqli_stmt_bind_param($statement,"iiis",$tour_idx, $review_idx,$review_score, $review_context); 

  mysqli_stmt_execute($statement);

  $response = array();
  $response["success"]= true; 

  echo json_encode($response,JSON_UNESCAPED_UNICODE);

  mysqli_close($con); 
?>

