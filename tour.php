<?php
// 관광지 상세 페이지(tour인덱스 가져와서 각각 상세 관광지 정보 출력) 
$con=mysqli_connect("localhost","qkddmswl1234","Tjdnfrhdah","qkddmswl1234");
 
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
mysqli_set_charset($con,"utf8"); 

$tour_idx = $_POST["tour_idx"];

  $statement = mysqli_prepare($con, "SELECT tour_name,tour_lat,tour_lng, tour_address, tour_img, tour_kind FROM TOUR WHERE tour_idx = ?");
  mysqli_stmt_bind_param($statement, "ssssi", $tour_idx);
  mysqli_stmt_execute($statement);
 $response = array(); 
  while($row = mysqli_fetch_array($result)){
   	array_push($response, array("tour_name" => $row[0],"tour_lat" =>$row[1],"tour_lng"=>$row[2],"tour_address"=>$row[3],"tour_img"=>$row[4],"tour_kind" => $row[5]));
   }  // reponse라고 이름 붙여서 가져온다

   echo json_encode(array("response "=> $response));  //배열로 나타난다
   mysqli_close($con); //mysql 연결 끊는 함수 
?>