<?php 
   //리뷰 insert
   $con=mysqli_connect("localhost","qkddmswl1234","Tjdnfrhdah","qkddmswl1234");
  
  // 정보 담기 
  $review_idx = $_POST["review_idx"];    
  $tour_idx = $_POST["tour_idx"];

  $review_score=$_POST["review_score"];

  $review_context=$_POST["review_content"];
  

  $statement = mysqli_prepare($con,"INSERT INTO REVIEW VALUES (?,?,?,?");


// 정수값 i 3개 문자열 하나 
  mysqli_stmt_bind_param($statement,"iiis",$tour_idx, $review_idx,$review_score, $review_context); 

  mysqli_stmt_excute($statement);

  $response = array();
  $response["success"]= true; 

  echo json_encode($response);
