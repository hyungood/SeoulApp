<?php
header("Content-Type: text/html; charset=UTF-8");
$con = mysqli_connect("localhost","qkddmswl1234","Tjdnfrhdah","qkddmswl1234");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($link,"utf8");
$bus_num = $_POST["bus_num"];

$bus_line = mysqli_query($con, "SELECT bus_stop_name1,bus_stop_name2,bus_stop_name3,bus_stop_name4,bus_stop_name5
  FROM recommend_line WHERE bus_num = '$bus_num'");

$stop = array();

if($bus_line){
while($row = mysqli_fetch_array($bus_line)){
  array_push($stop, array("bus_stop_name1" => $row[0],"bus_stop_name2" => $row[1],
        "bus_stop_name3" => $row[2], "bus_stop_name4" => $row[3], "bus_stop_name5" => $row[4]));}
}
else{
  echo "SQL문 처리중 에러 발생: ";
  echo mysqli_error($con);
}
echo json_encode($stop, JSON_UNESCAPED_UNICODE);

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
