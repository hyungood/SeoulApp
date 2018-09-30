<?php
  header("Content-Type: text/html; charset=UTF-8");
  $con = mysqli_connect("localhost", "qkddmswl1234", "Tjdnfrhdah", "qkddmswl1234");

  $user_id=$_POST["user_id"];

  $result=mysqli_query($con, "SELECT tour.tour_name, tour.tour_kind FROM tour, favor_place
  WHERE tour.tour_idx=favor_place.tour_idx AND favor_place.user_id='$user_id'");

  $response=array();
  while($row=mysqli_fetch_array($result)){
      array_push($response, array("tour_name"=>$row[0], "tour_kind"=>$row[1]));
  }

echo json_encode($response, JSON_UNESCAPED_UNICODE);
mysqli_close($con);

  ?>
