<html>
	<head><meta charset="utf-8">
	</head>
<body >

	<?php
$con=mysql_connect("localhost","root","");
	if(!$con)
{
	die("error:".mysql_error());
}
mysql_select_db("makeup",$con);
$sql="INSERT INTO product(code,name,price,count)
VALUES
('$_POST[code]','$_POST[name]','$_POST[price]','$_POST[count]')";
if(!mysql_query($sql,$con))
{
	die("error:".mysql_error());
}

	mysql_close();
echo "اطلاعات محصول جدید با موفقیت ثبت شد";
?>
	
</body>
</html>