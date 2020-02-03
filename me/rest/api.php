<?php 
header("Content-Type:application/json"); 
include('db.php'); 
if (isset($_GET['name']) && $_GET['name']!="") { 
$name = $_GET['name']; 
$result = mysqli_query( 
$con, 
"SELECT * FROM `product` WHERE name=$name"); 
if(mysqli_num_rows($result)>0){ 
$row = mysqli_fetch_array($result); 
$code = $row['code']; 
$name = $row['name']; 
$price = $row['price']; 
$count = $row['count'];
 
response($code, $name, $price,$count); 
mysqli_close($con); 
}else{ 
response(NULL, NULL, 200,"No Record Found"); 
} 

}
function response($code, $name, $price,$count){ 
$response['code'] = $code; 
$response['name'] = $name; 
$response['price'] = $price; 
$response['count'] = $count; 
 
	
$json_response = json_encode($response); 
	echo $json_response; 
return( $json_response); 
} 
?>