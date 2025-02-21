<?php
	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  	{
    	header('Location: ../customer/login');
  	}
	include "../includes/dbconnect.php";
	

	$product_name = mysqli_real_escape_string($connection,$_POST['product_name']);
	$product_price = mysqli_real_escape_string($connection,$_POST['product_price']);
	$product_description = mysqli_real_escape_string($connection,$_POST['product_description']);

	$filename=$_FILES['image']['name'];
	$temp_name=$_FILES['image']['tmp_name'];
	if(move_uploaded_file($temp_name, "../images/".$filename))
	{
		$query = " INSERT INTO products ( product_name, product_price, product_description, product_image ) VALUES
		 ( '$product_name' , '$product_price' , '$product_description', '$filename' ) ";
		if(mysqli_query($connection, $query))
		{
			$_SESSION['msg'] = "<h3 class='text-center text-red'><i>Product has been added</i></h3><br>";
			header('Location: ../admin/admin');
		}
	}
	else
	{
		$_SESSION['msg'] = "<h3 class='text-center text-red'><i>Product couldnot added</i></h3><br>";
		header('Location: ../admin/admin');
	}


?>