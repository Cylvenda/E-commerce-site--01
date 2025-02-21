<?php
	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  	{
    	header('Location: register.php');
  	}
	include "../includes/dbconnect.php";

	$product = $_GET['product'];
    $product_id = encryptor('decrypt', $product);


	$query="DELETE FROM `products` WHERE `product_id` LIKE '$product_id' ";
	if (mysqli_query($connection,$query))
	{
        $_SESSION['msg'] = "<h3 class='text-center text-red'><i>Product deleted successfully</i></h3><br>";
		header('Location: product_dis ');
	}
	else
	{
        $_SESSION['msg'] = "<h3 class='text-center text-red'><i>Couln't delete, Error Occured.</i></h3><br>";
		header('Location: product_dis ');
	}
