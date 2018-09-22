<!-- 유저 탈퇴 : user_id에서 값 받아와 삭제-->
<?php
  $con = mysqli_connect("localhost", "qkddmswl1234", "Tjdnfrhdah", "qkddmswl1234");

  $user_id = $_POST["user_id"];

  $statement = mysqli_prepare($con, "DELETE FROM user WHERE user_id=?");
  mysqli_stmt_bind_param($statement, "s", user_id);
  mysqli_stmt_execute();

  $response=array();
  $response["success"]=true;

  $statement = mysqli_prepare($con, "DELETE FROM favor_line WHERE user_id=?");
  mysqli_stmt_bind_param($statement, "s", user_id);
  mysqli_stmt_execute();

  $statement = mysqli_prepare($con, "DELETE FROM favor_place WHERE user_id=?");
  mysqli_stmt_bind_param($statement, "s", user_id);
  mysqli_stmt_execute();

  echo json_encode($response);

 ?>
