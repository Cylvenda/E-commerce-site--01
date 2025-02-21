<?php
	session_start();	
	if(!(isset($_POST['user_name'])&&isset($_POST['user_email'])))
  	{
    	header('Location: register');
  	}
  	include "../includes/dbconnect.php";
	//fetch the user data
	$name=$_POST['user_name'];
	$email=$_POST['user_email'];
	$phone=$_POST['user_phone']; 
	$password=$_POST['user_password'];

	//check for already registerd user
	$query1="SELECT * FROM `users` WHERE `email` LIKE '$email'";
	$result1=mysqli_query($connection,$query1);
	if(mysqli_num_rows($result1)==0)
	{
		//push data to the DB
		$pass_hash = password_hash($password, PASSWORD_DEFAULT);
		$query="INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `password`) VALUES (NULL, '$name', '$email', $phone, '$pass_hash')";
		
		if (mysqli_query($connection,$query))
		{
			//redirect
			$_SESSION['name']=$name;
			$_SESSION['email']=$email;

			$query1="SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
			$result1=mysqli_query($connection,$query1);
			$row1=mysqli_fetch_assoc($result1);
			$_SESSION['user_id']=$row1['user_id'];

			$_SESSION['msg'] = "<h3 class='text-center text-white margin-top50'><i>You have been Registered successfully,
			Now You can Login.</i></h3>";
			header('Location: login');
		}
	}
	elseif(mysqli_num_rows($result1)==1)
	{
		$_SESSION['msg'] = "<h3 class='text-center text-red margin-top50'><i>User with that Email Already Exist!</i></h3>";
		header('Location: register');
	}
	else
	{
		echo "Some Error occured!";
	}


//redirect


?>