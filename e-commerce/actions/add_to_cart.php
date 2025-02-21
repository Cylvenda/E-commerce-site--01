<?php
	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  	{
    	header('Location: register.php');
  	}
	include "../includes/dbconnect.php";
	
	$product_id=$_GET['product'];
	$product_id = encryptor('decrypt', $product_id );
	$user_id=$_SESSION['user_id'];

	$query1="SELECT * FROM `cart` WHERE `product_id` LIKE '$product_id' AND `user_id` LIKE '$user_id'";
	$result1=mysqli_query($connection,$query1);
		
	if(mysqli_num_rows($result1)==0)
	{
		$query="INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`) VALUES (NULL, '$product_id', '$user_id')";
		if(mysqli_query($connection,$query))
		{
			$_SESSION['msg'] = "<h4 class='text-center text-black'><i>Added to cart</i></h4><br>";
			$product_id = encryptor('encrypt', $product_id );
			header('Location: product_description?product='.$product_id.'');
		}
		else
		{
			echo "error!";
		}
	}
	elseif(mysqli_num_rows($result1)==1)
	{
		$_SESSION['msg'] = "<h4 class='text-center text-black'><i>You have Already added this to cart</i></h4><br>";
		$product_id = encryptor('encrypt', $product_id );
		header('Location: product_description?product='.$product_id);
	}
	else
	{
		echo "Some Error Occured";
	}
	
?>