<?php 
if (isset($_POST['name']) && $_POST['name']!="") { 
$name = $_POST['name']; 
$url = "http://localhost/xampp/me/rest/api.php?name=".$name;

$client = curl_init($url); 
curl_setopt($client,CURLOPT_RETURNTRANSFER,true); 
$response = curl_exec($client); 
$result = json_decode($response); 

echo "<table>"; 
echo "<tr><td>code:</td><td>$result->code</td></tr>"; 
echo "<tr><td>name:</td><td>$result->name</td></tr>"; 
echo "<tr><td>price:</td><td>$result->price</td></tr>"; 
	echo "<tr><td>count:</td><td>$result->count</td></tr>"; 
	 
echo "</table>"; 
} 
?>