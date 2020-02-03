<html>
	<head><meta charset="utf-8">
	</head>
<body dir="rtl" >
<?php
		
		if(isset($_GET['edit_pro'])){
			
			$id_pro=$_GET['edit_pro'];
			
			$select_pro="select * from products where product_id='$id_pro' ";
			
			$run_pro=mysqli_query($con,"SET NAMES SET utf8");
			
			$run_pro=mysqli_query($con,"SET CHARACTER SET utf8");
			
			$run_pro=mysqli_query($con,$select_pro);
			
			$row_pro=mysqli_fetch_array($run_pro);
			
			$title_pro=$row_pro['product_title'];
			
			$img_pro=$row_pro['product_image'];
			
			global $img_pro;
			
			$price_pro=$row_pro['product_price'];
			
			$desc_pro=$row_pro['product_desc'];
			
			$keywords_pro=$row_pro['product_keywords'];
			
			//get cat product
			$cat_pro=$row_pro['product_cat'];
			
			$select_cat_pro="select * from categories where cat_id='$cat_pro' ";
			
			$run_cat_pro=mysqli_query($con,"SET NAMES SET utf8");
			
			$run_cat_pro=mysqli_query($con,"SET CHARACTER SET utf8");
			
			$run_cat_pro=mysqli_query($con,$select_cat_pro);
			
			$row_cat_pro=mysqli_fetch_array($run_cat_pro);
			
			$title_cat_pro=$row_cat_pro['cat_title'];
			
			
			//get cat product
			
			$brand_pro=$row_pro['product_brand'];
			
			$select_brand_pro="select * from brands where brand_id='$brand_pro' ";
			
			$run_brand_pro=mysqli_query($con,"SET NAMES SET utf8");
			
			$run_brand_pro=mysqli_query($con,"SET CHARACTER SET utf8");
			
			$run_brand_pro=mysqli_query($con,$select_brand_pro);
			
			$row_brand_pro=mysqli_fetch_array($run_brand_pro);
			
			$title_brand_pro=$row_brand_pro['brand_title'];
			
			
		}			
		
	?>
	<table  width="650" align="center">
		
		<caption ><b>محصول مورد نظر خود را اصلاح و ویرایش نمایید.</b></caption >
		
		<tr>
			<th ><b>ویژگی های محصول</b></th >
			<th ><b>مقدار ورودی برای هر کدام از ویژگی ها</b></th >
		</tr>
		
		<tr>
			<td><b>نام محصول</b></td >
			<td><input type="text" name="product_title" size="70" value="<?php echo $title_pro; ?>"></td >
		</tr>
		
		<tr>
			<td><b>دسته بندی  محصول</b></td>
			<td>
				<select name="product_cat" >
					<option value="<?php echo $cat_pro; ?>"><?php echo $title_cat_pro; ?></option>
					<?php
						$get_cat="select * from categories";
						$run_cat=@mysqli_query($con,"SET NAME utf8");
						$run_cat=@mysqli_query($con,"SET CHARACTER SET utf8");
						$run_cat=mysqli_query($con,$get_cat);
						while($row_cat=mysqli_fetch_array($run_cat))
						{
							$cat_id=$row_cat['cat_id'];
							$cat_title=$row_cat['cat_title'];
							echo"<option value='$cat_id'>$cat_title</option>";
						}
					?>
				</select>
				
			</td >
		</tr>
		
		
		<tr>
			<td><b>برند محصول</b></td >
			<td>
				<select name="product_brand" >
					<option value="<?php echo $brand_pro; ?>"><?php echo $title_brand_pro; ?></option>
					<?php
						$get_brand="select * from brands";
						$run_brand = @mysqli_query($con,"SET NAMES utf8");
						$run_brand = @mysqli_query($con,"SET CHARACTER SET utf8");
						$run_brand=mysqli_query($con,$get_brand);
						while($row_brand=mysqli_fetch_array($run_brand))
						{
							$brand_id=$row_brand['brand_id'];
							$brand_title=$row_brand['brand_title'];
							echo"<option value='$brand_id'>$brand_title</option>";
						}
					?>
				</select>
			</td>
		</tr>
		
		
		
		<tr>
			<td><b>قیمت محصول</b></td >
			<td><input type="text" name="product_price" value="<?php echo $price_pro; ?>"></td >
		</tr>
		
		
		<tr>
			<td><b>توصیف محصول</b></td >
			<td>
				<textarea name="product_desc" ><?php echo $desc_pro; ?></textarea>
			</td >
		</tr>
		
		
		<tr>
			<td><b>عکس محصول</b></td >
			<td>
				<img src="<?php echo $img_pro; ?>" height="45" width="60"/><br/><br/>
				<input type="file" name="product_image">
			</td >
		</tr>
		
		
		<tr>
			<td><b>کلمات کلیدی</b> </td >
			<td><input type="text" name="product_keywords" size="70" value="<?php echo $keywords_pro; ?>" ></td >
		</tr>
		
		
		<tr>
			<td align="center"><input type="submit" name="submit" value="به روز رسانی"></td >
			<td align="center"><input type="reset" name="reset" value="ریست کردن"></td >
		</tr>
		
	</table > 
</form>
<?php
	if(isset($_POST['submit']))
	{
		
		$id_pro=$_GET['edit_pro'];
				
		//getting the text data form the fields
		
		$product_title		=$_POST['product_title'];
		$product_cat		=$_POST['product_cat'];
		$product_brand		=$_POST['product_brand'];
		$product_price		=$_POST['product_price'];
		$product_desc		=$_POST['product_desc'];
		$product_keywordS 	=$_POST['product_keywords'];
		
		
		//getting the image form the image fields
		if(is_uploaded_file($_FILES['product_image']['tmp_name'])){
			$product_image_name	=$_FILES['product_image']['name'];
			$product_image_tmp	=$_FILES['product_image']['tmp_name'];
			$address_images='product_images/'.$product_image_name;
			move_uploaded_file($product_image_tmp,$address_images);
			}else{
			$address_images=$img_pro;
		}
		
		$update_product="update products set 
		product_cat='$product_cat',	
		product_brand='$product_brand',	
		product_title=N'$product_title',	
		product_price=$product_price,	
		product_desc=N'$product_desc',	
		product_image='$address_images',	
		product_keywords=N'$product_keywordS' where product_id='$id_pro' ";	
		
		$update_pro=mysqli_query($con,$update_product);
		//display message to user		
		if($update_pro)
		{
			echo"<script>alert('اطلاعات جدید جایگزین اطلاعات قبلی شد.')</script>";
			echo"<script>window.open('index.php?view_pro','_self')</script>";
		}
		
	}
	
?>
	</body></html>