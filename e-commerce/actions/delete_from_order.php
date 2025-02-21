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

	$query="DELETE FROM `orders` WHERE `product_id` LIKE '$product_id' AND `user_id` LIKE '$user_id'";
	if(mysqli_query($connection,$query))
	{
		$query1="DELETE FROM `details` WHERE `product_id` LIKE '$product_id' AND `user_id` LIKE '$user_id'";
		if(mysqli_query($connection,$query1))
		{
			$_SESSION['msg'] = "<h3 class='text-center text-red'><i>Order has been deleted</i></h3><br>";
			header('Location: show_order_items');
		}
	}
	else
	{
		$_SESSION['msg'] = "<h3 class='text-center text-red'><i>Couldn`t delete order</i></h3><br>";
		header('Location: show_order_items.php?msg=2');
	}
?>