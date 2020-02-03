<?php
		if(isset($_GET['search']))
		{	
			$search_qurey=$_GET['user_query'];
			
			$get_pro="select * from product where product_keywords like N'%$search_qurey%' ";
			$run_pro=@mysqli_query($con,"SET NAMES utf8");
			$run_pro=@mysqli_query($con,"SET CHARACTER SET utf8");
			$run_pro=mysqli_query($con,$get_pro);
			echo"<h2>$search_qurey</h2>";
			while($row_pro=mysqli_fetch_array($run_pro))
			{
				
				$pro_id=$row_pro['code'];
				$pro_cat=$row_pro['name'];
			
			
			} 
		}				
?>