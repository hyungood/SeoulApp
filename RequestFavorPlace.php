<!-- user_id에 따라 사용자가 즐겨찾기한 장소 정보 리스트(tour_name, tour_kind) 출력-->

<?php
  $con = mysqli_connect("localhost", "qkddmswl1234", "Tjdnfrhdah", "qkddmswl1234");

  $user_id = $_POST["user_id"];

  $statement = mysqli_prepare($con, "SELECT tour.tour_name, tour.tour_kind FROM tour, favor_place
  WHERE tour.tour_idx=favor_place.tour_idx AND favor_place.user_id=?");
  mysqli_stmt_bind_param($statement, "s", user_id);
  mysqli_stmt_execute($statement);

  $response = array();
  while($row = mysqli_fetch_array($statement)){
    array_push($response, array("tour_name"=>$row[0], "tour_kind"=>$row[2]));
  }

  echo json_encode(array("response"=>$response), JSON_UNESCAPED_UNICODE);
  mysqli_close($con);
 ?>
