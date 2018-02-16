<!DOCTYPE>

<?php 

include("includes/db.php");

?>
<html>
	<head>
		<title>Inserting Employee Data</title> 
		
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
	</head>
	
<body bgcolor="skyblue">


	<form action="insert_product.php" method="post" enctype="multipart/form-data"> 
		
		<table align="center" width="795" border="2" bgcolor="#187eae">
			
			<tr align="center">
				<td colspan="7"><h2>Insert New Data Here</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Employee Name:</b></td>
				<td><input type="text" name="emp" size="60" required/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Marital Status:</b></td>
				<td>
				<select name="marital" >
					<option>Select a Status:</option>
					<?php 
		$get_cats = "select * from categories";
	
		$run_cats = mysqli_query($con, $get_cats);
	
		while ($row_cats=mysqli_fetch_array($run_cats)){
	
		$cat_id = $row_cats['cat_id']; 
		$cat_title = $row_cats['cat_title'];
	
		echo "<option value='$cat_id'>$cat_title</option>";
	
	
	}
					
					?>
				</select>
				
				
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Department</b></td>
				<td>
				<select name="dept" >
					<option>Select a Dept.</option>
					<?php 
		$get_brands = "select * from brands";
	
	$run_brands = mysqli_query($con, $get_brands);
	
	while ($row_brands=mysqli_fetch_array($run_brands)){
	
		$brand_id = $row_brands['brand_id']; 
		$brand_title = $row_brands['brand_title'];
	
	echo "<option value='$brand_id'>$brand_title</option>";
	
	
	}
					
					?>
				</select>
				
				
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Employee Image:</b></td>
				<td><input type="file" name="emp_image" /></td>
			</tr>
			
			<tr>
				<td align="right"><b>Date of joining:</b></td>
				<td><input type="date" name="joining" required/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Date of Birth:</b></td>
				<td><input type="date" name="dob" required></td>
			</tr>
			
			<tr>
				<td align="right"><b>E-mail ID</b></td>
				<td><input type="email" name="email_id" size="50" required/></td>
			</tr>
				<tr>
				<td align="right"><b>Contact No.:</b></td>
				<td><input type="text" name="contact" size="50" required/></td>
			</tr>
			
			<tr align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
			</tr>
		
		</table>
	
	
	</form>


</body> 
</html>
<?php 

	if(isset($_POST['insert_post'])){
	
		//getting the text data from the fields
		$emp = $_POST['emp'];
		$marital= $_POST['marital'];
		$dept = $_POST['dept'];
		$joining = $_POST['joining'];
		$dob = $_POST['dob'];
		$email_id = $_POST['email_id'];
		$contact = $_POST['contact'];

		//getting the image from the field
		$emp_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
	
		 $insert_data = "insert into products (emp,marital,dept,joining,dob,email_id,contact) values ('$emp','$marital','$dept','$joining','$dob','$email_id','$contact',)";
		 
		 $insert_d = mysqli_query($con, $insert_data);
		 
		 if($insert_d){
		 
		 echo "<script>alert('Data Has been inserted!')</script>";
		 echo "<script>window.open('index.php?insert_product','_self')</script>";
		 
		 }
	}








?>



