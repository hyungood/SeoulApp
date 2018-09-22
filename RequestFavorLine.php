<!-- user_id 에 따라 사용자가 즐겨찾기한 노선 리스트(bus_num) 출력 -->
<?php
  header("Content-Type: text/html; charset=UTF-8");
  $con = mysqli_connect("localhost", "qkddmswl1234", "Tjdnfrhdah", "qkddmswl1234");

  $user_id = $_POST["user_id"];

  $statement = mysqli_prepare($con, "SELECT bus_num FROM favor_line WHERE user_id = ?");
  mysqli_stmt_bind_param($statement, "s", $user_id);
  mysqli_stmt_execute($statement);

  $response = array();
  while($row = mysqli_fetch_array($result)){
    array_push($response, array("bus_num"->$row[0]));
  }

  echo json_encode(array("response"->$response), JSON_UNESCAPED_UNICODE);
  mysqli_close($con);
 ?>
