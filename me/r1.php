<html>
	<head><meta charset="utf-8">
	<style>
	body{

		background-size:contain;

}
		</style>
	</head>
<body align="center" background="pic/107044241-talab-org.jpg">
	<a href="start.html">صفحه اصلی</a>
	<br>
	<br>
	<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("makeup",$con);
$sql="INSERT INTO users(firstname,lastname,username,password,tel,email)
VALUES
('$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[tel]','$_POST[email]')";
if(!mysql_query($sql,$con))
{
	die("error:".mysql_error());
}
	if(empty($_POST["username"])){
  echo "فرم را کامل کنید";
}else{
 echo "  عزیز ثبت نام شما با موفقیت صورت گرفت".$_POST['firstname'];
}

	
	
	mysql_close();

?>
	
</body>
</html>