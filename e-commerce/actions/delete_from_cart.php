<?php
	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  	{
    	header('Location: ../customer/login');
  	}
	include "../includes/dbconnect.php";
	$product_id=$_GET['product'];
	$product_id = encryptor('decrypt', $product_id);
	$user_id=$_SESSION['user_id'];

	$query="DELETE FROM `cart` WHERE `product_id` LIKE '$product_id' AND `user_id` LIKE '$user_id'";
	if(mysqli_query($connection,$query))
	{
		$_SESSION['msg'] = "<h3 class='text-center text-red'><i>Items has been removed</i></h3><br>";
		header('Location: show_cart_items');
	}
	else
	{
		$_SESSION['msg'] = "<h3 class='text-center text-red'><i>The Item was not removed</i></h3><br>";
		header('Location: show_cart_items');
	}

?>