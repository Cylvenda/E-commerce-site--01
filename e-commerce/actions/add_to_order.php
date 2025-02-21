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

	$delete="DELETE FROM `cart` WHERE `cart`.`product_id` LIKE '$product_id' AND `cart`.`user_id` LIKE '$user_id'";
	mysqli_query($connection,$delete);

	$query1="SELECT * FROM `orders` WHERE `product_id` LIKE '$product_id' AND `user_id` LIKE '$user_id'";
	$result1=mysqli_query($connection,$query1);
		
	if(mysqli_num_rows($result1)==0)
	{
		$query="INSERT INTO `orders` (`order_id`, `user_id`, `product_id`) VALUES (NULL, '$user_id', '$product_id');";
		if(mysqli_query($connection,$query))
		{
			$product_id = encryptor('encrypt', $product_id);
			header('Location: details_form?product='.$product_id.''); //redirect**
		}
		else
		{
			echo "error!";
		}
	}
	elseif(mysqli_num_rows($result1)==1)
	{
		$_SESSION['msg'] = "<h3 class='text-center text-red'><i>The Item has already been ordered</i></h3><br>";
		$product_id = encryptor('encrypt', $product_id);
		header('Location: show_cart_items ');
	}
	else
	{
		$_SESSION['msg'] = "<h3 class='text-center text-red'><i>Error Occured</i></h3><br>";
		header('Location: show_cart_items ');
	}
	
?>