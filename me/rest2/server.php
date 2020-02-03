<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
	$input = json_decode(file_get_contents('php://input'),true);
$username = $input['username'];
$password = $input['password'];
	include_once 'fetch2.php';
	
if(!$DB = mysqli_connect("localhost","root","","makeup")) {
    echo "DBerror";
}
mysqli_query($DB,"SET CHARACTER SET utf8;");
mysqli_query($DB,"SET SESSION collation_connection = 'utf8_persian_ci'");
 
$sql = mysqli_query($DB,"SELECT `username`,`password` FROM `users` WHERE `username`='$username' LIMIT 1");
if(mysqli_num_rows($sql) == 1) {
$row = mysqli_fetch_assoc($sql);
if($row['password'] == $password) {
$return = array('error'=>0,'username'=>$row['username']);
} else {
$return = array('error'=>1);
}
} else {
$return = array('error'=>1);
}
 
echo json_encode($return);
	?>
	
</body>
</html>