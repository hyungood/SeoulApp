<?php

header("Content-Type: text/html; charset=UTF-8");
$con=mysqli_connect("localhost","qkddmswl1234","Tjdnfrhdah","qkddmswl1234");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($con,"utf8");
$bus_num = $_POST["bus_num"];

$result = mysqli_query($con, "SELECT stop1_lat, stop1_lng, stop2_lat, stop2_lng,
  stop3_lat, stop3_lng, stop4_lat, stop4_lng,
  stop5_lat, stop5_lng
  FROM recommendline WHERE bus_num = '$bus_num'");

$response = array();
if($result){
  while($row = mysqli_fetch_array($result)){
    array_push($response, array("stop1_lat"=>$row[0], "stop1_lng"=>$row[1],
                              "stop2_lat"=>$row[2], "stop2_lng"=>$row[3],
                              "stop3_lat"=>$row[4], "stop3_lng"=>$row[5],
                              "stop4_lat"=>$row[6], "stop4_lng"=>$row[7],
                              "stop5_lat"=>$row[8], "stop5_lng"=>$row[9]) );}
}
else{  echo "SQL문 처리중 에러 발생: ";
  echo mysqli_error($con);}

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
          bus_num: <input type = "text" name = "bus_num" />
         <input type = "submit" />
       </form>

    </body>
 </html>
 <?php
 }
 ?>
