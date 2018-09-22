<!-- 관광지 list 이름, 주소-->

<?php

header('Content-Type: text/html; charset=utf-8');


$con=mysqli_connect("localhost","qkddmswl1234","Tjdnfrhdah","qkddmswl1234");
 
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
mysqli_set_charset($con,"utf8"); 


$res = mysqli_query($con,"SELECT tour_name,tour_address FROM tour");
 

 $result=array();

 while($row = mysqli_fetch_array($res)){
   	array_push($result, 

   	array('tour_name' =>$row[0],'tour_address' =>$row[1]));
   }  // reponse라고 이름 붙여서 가져온다

   echo json_encode(array("result "=> $result));  //배열로 나타난다
   mysqli_close($con);


?>