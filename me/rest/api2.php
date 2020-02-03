<?php 
header("Content-Type:application/json"); 
if (isset($_GET['password']) && $_GET['password']!="") { 
include('db.php'); 
$password = $_GET['password']; 
$result = mysqli_query( 
$con, 
"SELECT * FROM `users` WHERE password=$password"); 
if(mysqli_num_rows($result)>0){ 
$row = mysqli_fetch_array($result); 
$firstname = $row['firstname']; 
$lastname = $row['lastname']; 
$username = $row['username']; 
$password = $row['password']; 
$tel = $row['tel']; 
$email = $row['email']; 

response($firstname,$lastname,$username, $password, $tel,$email); 
mysqli_close($con); 
}else{ 
response(NULL, NULL, 200,"No Record Found"); 
} 
}else{ 
response(NULL, NULL, 400,"Invalid Request"); 
} 

function response($firstname,$lastname,$username, $password, $tel,$email){ 
	$response['firstname'] = $firstname; 
$response['lastname'] = $lastname; 
$response['username'] = $username; 
$response['password'] = $password; 
$response['tel'] = $tel; 
$response['email'] = $email; 
 
$json_response = json_encode($response); 
	
	echo "you're username is :".$username;
	
	echo $json_response; 
return( $json_response); 
} 
?>