<?php 
if (isset($_POST['password'])) { 

	$password = $_POST['password']; 

$url = "http://localhost/xampp/me/rest/api2.php?password=".$password;

$client = curl_init($url); 
curl_setopt($client,CURLOPT_RETURNTRANSFER,true); 
$response = curl_exec($client); 
$result = json_decode($response); 
var_dump($url);
echo "<table>"; 
echo "<tr><td>code:</td><td>$result->username</td></tr>"; 
echo "<tr><td>name:</td><td>$result->password</td></tr>"; 

echo "</table>"; 
} 
?>