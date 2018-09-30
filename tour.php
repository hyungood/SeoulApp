<?php
  header("Content-Type: text/html; charset=UTF-8");
  $con = mysqli_connect("localhost", "qkddmswl1234", "Tjdnfrhdah", "qkddmswl1234");

  $tour_idx=$_POST["tour_idx"];

  $result=mysqli_query($con,"SELECT tour_name, tour_address, tour_img, 
  tour_kind FROM tour WHERE tour_idx='$tour_idx'");

  $response=array();
  while($row=mysqli_fetch_array($result)){
    array_push($response, array("tour_name" => $row[0],"tour_address" =>$row[1],"tour_img"=>$row[2],"tour_kind"=>$row[3]));
  }

  echo json_encode($response, JSON_UNESCAPED_UNICODE);
  mysqli_close($con);

 ?>


 <?php

 $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");


 if (!$android){
 ?>

 <html>
   <body>

      <form action="<?php $_PHP_SELF ?>" method="POST">
      tour_idx: <input type = "text" name = "tour_idx"/>
        <input type = "submit" />
      </form>

   </body>
 </html>
 <?php
 }
 ?>