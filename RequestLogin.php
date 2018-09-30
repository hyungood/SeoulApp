<?php
header("Content-Type: text/html; charset=UTF-8");
$con = mysqli_connect("localhost", "qkddmswl1234", "Tjdnfrhdah", "qkddmswl1234");

$user_id = $_POST["user_id"];
$user_pw = $_POST["user_pw"];

$result=mysqli_query($con,  "SELECT user_id FROM user WHERE user_id='$user_id' AND user_pw = '$user_pw'");

$response["success"]=false;
while($row=mysqli_fetch_array($result)){
  $response["success"]=true;
}

echo json_encode($response);

 ?>

 <?php

 $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");


 if (!$android){
 ?>

 <html>
    <body>

       <form action="<?php $_PHP_SELF ?>" method="POST">
          id: <input type = "text" name = "user_id" />
          pw: <input type = "text" name = "user_pw" />
         <input type = "submit" />
       </form>

    </body>
 </html>
 <?php
 }
 ?>
