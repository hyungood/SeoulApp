

<?php  

$link=mysqli_connect("localhost","qkddmswl1234","Tjdnfrhdah","qkddmswl1234");
if (!$link)  
{  
    echo "MySQL 접속 에러 : ";
    echo mysqli_connect_error();
    exit();  
}  

mysqli_set_charset($link,"utf8"); 


$sql="SELECT tour_name,tour_address FROM tour";

$result=mysqli_query($link,$sql);
$data = array();   
if($result){  
    
    while($row=mysqli_fetch_array($result)){
        array_push($data, 
            array('tour_name' =>$row[0],'tour_address' =>$row[1]
        ));
    }
    header('Content-Type: application/json; charset=utf8');
    $json = json_encode($data, JSON_UNESCAPED_UNICODE);
    echo $json;
}  
else{  
    echo "SQL문 처리중 에러 발생 : "; 
    echo mysqli_error($link);
} 


 
mysqli_close($link);  
   
?>