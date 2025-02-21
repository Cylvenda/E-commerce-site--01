<?php
	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  	{
    	header('Location: ../index ');
  	}
	include "../includes/dbconnect.php";

if(isset($_GET['product'])){
	$product_id = encryptor('decrypt', $product_id);
	$query="DELETE FROM `products` WHERE `product_id` LIKE '$product_id'";
	if (mysqli_query($connection,$query))
	{
		header('Location: product_dis ');
	}
	else
	{
		header('Location: product_dis ');
	}

}
?>