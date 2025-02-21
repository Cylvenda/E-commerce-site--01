<?php

	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
	  	{
	    	header('Location: ../actions/products');
	  	}
	session_destroy();
	
	$_SESSION['msg'] = "<h3 class='text-center text-red margin-top50'><i>
	Your Logged out successfully, But Your Warmely Welcome again</i></h3>";
	header("Location: ../index");