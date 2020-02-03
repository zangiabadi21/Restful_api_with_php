<html>
	<head><meta charset="utf-8">
	<style>
	body{

		background-size:contain;

}
		</style>
	</head>
<body align="center">
	<a href="start.html">صفحه اصلی</a>
	<br>
	<br>
	<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("makeup",$con);
$sql="INSERT INTO buy(username,password,name,code,price)
VALUES
('$_POST[username]','$_POST[password]','$_POST[name]','$_POST[code]','$_POST[price]')";
if(!mysql_query($sql,$con))
{
	die("error:".mysql_error());
}

	mysql_close();

?>
	
</body>
</html>