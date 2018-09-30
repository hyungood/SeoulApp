<?php
header("Content-Type: text/html; charset=UTF-8");
$con = mysqli_connect("localhost", "qkddmswl1234", "Tjdnfrhdah", "qkddmswl1234");

$dept=$_POST["dept"];

$result=mysqli_query($con,"SELECT bus_num FROM recommend_line WHERE dept ='$dept'");

$response=array();
while($row=mysqli_fetch_array($result)){
  array_push($response, array("bus_num"=>$row[0]));
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
          bus_num: <input type = "text" name = "dept" />
         <input type = "submit" />
       </form>

    </body>
 </html>
 <?php
 }
 ?>
