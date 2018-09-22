
 <?php
 //리뷰 삭제    
$con=mysqli_connect("localhost","qkddmswl1234","Tjdnfrhdah","qkddmswl1234");


   $review_idx = $_POST["review_idx"];
   $statement = mysqli_prepare($con,"DELETE FROM REVIEW where review_idx =?");
   mysqli_stmt_bind_param($statement,"i",$review_idx);
   mysqli_stmt_excute($statement);


   $response = array();
   $response["sucess"] = true;

   echo json__encode($response);
   mysqli_close($con);
?>