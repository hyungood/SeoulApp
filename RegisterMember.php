<?php
  $con = mysqli_connect("localhost", "qkddmswl1234", "Tjdnfrhdah", "qkddmswl1234");

  $user_id = $_POST["user_id"];
  $user_pw = $_POST["user_pw"];

  $statement = mysqli_prepare($con, "INSERT INTO user VALUES (?,?)");
  mysqli_stmt_bind_param($statement, "ss", $user_id, $user_pw);
  mysqli_stmt_execute($statement);

  $response = array();
  $response["success"] = true;

  echo json_encode($response);
 ?>
