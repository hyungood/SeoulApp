
<?php
// 리뷰 출력 페이지(각각 관광지 인덱스 값 가져와서 리뷰 출력) 
$con=mysqli_connect("localhost","qkddmswl1234","Tjdnfrhdah","qkddmswl1234");
 
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
mysqli_set_charset($con,"utf8"); 

$review_idx = $_POST["tour_idx"]; // 관광지 index

  $statement = mysqli_prepare($con, "SELECT review_idx,review_score,review_content FROM REVIEW WHERE tour_idx = ?");
  mysqli_stmt_bind_param($statement, "iis", $tour_idx);
  mysqli_stmt_execute($statement);
 $response = array(); 
  while($row = mysqli_fetch_array($result)){
   	array_push($response, array("tour_name" => $row[0],"review_score"=>$row[1],"review_content"=>$row[2]));
   }  // reponse라고 이름 붙여서 가져온다

   echo json_encode(array("response "=> $response));  //배열로 나타난다
   mysqli_close($con); //mysql 연결 끊는 함수 
?>
