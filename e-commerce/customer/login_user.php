<?php

	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
	{
		header('Location: login');
	}
	include "../includes/dbconnect.php";
	

	$email=$_POST['user_email'];
	$password=$_POST['user_password'];

	$query="SELECT * FROM `users` WHERE `email` LIKE '$email' ";

	//running the serch in DB and storing in $result
	$result=mysqli_query($connection,$query);

	//function to return the number of rows in $result

	$num_rows = mysqli_num_rows($result);
	

	if($num_rows == 1)
	{	
		$row=mysqli_fetch_assoc($result);

		if(password_verify($password, $row['password'] )){

			if($row['status'] == 1 )
			{
				if($row['user_type'] == 1 ){
					$_SESSION['name']=$row['name'];
					$_SESSION['email']=$row['email'];
					$_SESSION['user_id']=$row['user_id'];

					header('Location: ../admin/admin');

				}else{
					
					$_SESSION['name']=$row['name'];
					$_SESSION['email']=$row['email'];
					$_SESSION['user_id']=$row['user_id'];
					
					header('Location: ../actions/products');

					}
				}else{
					$_SESSION['msg'] = "<h3 class='text-center text-red margin-top50'><i>
					Your Account is being suspended for a while, contact our customer care for more details</i></h3>";
					header('Location: login');
				}
			
		}else{
			$_SESSION['msg'] = "<h3 class='text-center text-red margin-top50'><i>
				Incorrect Password or  Some Error Occurred </i></h3>";
				header('Location: login');
		}
			
	}
	else
	{	
		$_SESSION['msg'] = "<h3 class='text-center text-red margin-top50'><i>We Couldn`t Recognize Your Credential,
		Please Try Again with Right Email.</i></h3>";
		header('Location: login');
	}

?>