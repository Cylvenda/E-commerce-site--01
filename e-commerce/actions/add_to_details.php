<?php
	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  	{
    	header('Location: ../customer/login');
  	}
	include "../includes/dbconnect.php";

	$product_id=$_POST['product_id'];
	$user_id=$_SESSION['user_id'];
	$address=$_POST['address'];
	$quantity=$_POST['quantity'];
	
	$query1="SELECT * FROM `details` WHERE `product_id` LIKE '$product_id' AND `user_id` LIKE '$user_id'";
	$result1=mysqli_query($connection,$query1);
		
	if(mysqli_num_rows($result1)==0)
	{
		$query="INSERT INTO `details` (`details_id`, `user_id`, `product_id`, `address`, `quantity`) VALUES (NULL, '$user_id', '$product_id', '$address', '$quantity');";
		if(mysqli_query($connection,$query))
		{
			$_SESSION['msg'] = "<h3 class='text-center text-red'><i>The Item has been ordered</i></h3><br>";
			header('Location: show_cart_items'); //redirect**
		}
		else
		{
			header('Location: details_form.php?product_id='.$product_id.'');
		}
	}
	elseif(mysqli_num_rows($result1)==1)
	{
		header('Location: review_form.php?product_id='.$product_id.'');
	}
	else
	{
		echo "Some Error Occured";
	}
	
?>