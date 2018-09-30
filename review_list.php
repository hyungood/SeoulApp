<?php
  header("Content-Type: text/html; charset=UTF-8");
  $con = mysqli_connect("localhost", "qkddmswl1234", "Tjdnfrhdah", "qkddmswl1234");

  $tour_idx=$_POST["tour_idx"];

  $result=mysqli_query($con,"SELECT user_id,review_score,review_content FROM review WHERE  tour_idx = '$tour_idx'");

  $reviewList=array();
  while($row=mysqli_fetch_array($result)){
    array_push($reviewList, array("userId" => $row[0],"userStar"=>$row[1],"userText"=>$row[2]));
  }

  echo json_encode($reviewList, JSON_UNESCAPED_UNICODE);
  mysqli_close($con);

 ?>
