<!DOCTYPE html>
<html>
<?php 
	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  	{
    	header('Location: ../customer/login');
  	}

    include "../includes/dbconnect.php";
		$user_email = $_SESSION["email"]; 
		$sql_query = mysqli_query($connection, "SELECT * FROM users WHERE email = '$user_email' ");
		while($row = mysqli_fetch_assoc($sql_query))
	
		if($row['user_type'] == 1)	
        {
          include "../includes/header_admin.php";
        }
        else
        {
        	header('Location: ../customer/login');
        }
		include "../includes/css_header.php";
	?>

	<body>
		

    	<div  class="container">
            <?php 

				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				if(isset($_POST['submit'])){
					$name=$_POST['user_name'];
					$email=$_POST['user_email'];
					$phone=$_POST['user_phone']; 
					$password=$_POST['user_password'];
					$type=$_POST['user_type']; 

					$query1="SELECT * FROM `users` WHERE `email` LIKE '$email'";
					$result1=mysqli_query($connection,$query1);
					$rows_num = mysqli_num_rows($result1);
						if($rows_num <= 0){

							$query_insert = mysqli_query($connection, "INSERT INTO users (name, email, phone, password, user_type)
							VALUES ('$name', '$email', $phone,'$password', '$type')");
								 
								 if($query_insert){
							$_SESSION['msg'] = "<h3 class='text-center text-black margin-top50'><i>Customer Added Successfully!..</i></h3>";
							header('Location: admin_members');
								 }else{
									$_SESSION['msg'] = "<h3 class='text-center text-black margin-top50'><i>Couldn`t Add new customer, Error Occurred </i></h3>";
									header('Location: admin_members');
								 }
						}else{

						    $_SESSION['msg'] = "<h3 class='text-center text-red margin-top50'><i>User With This Email Already Exist, Check Here to Verify</i></h3>";
					 	    header('Location: admin_members ');
						}
				}
             ?>
    		<div class="col">
    			<div class="col-md-8 margin-top50">
    				<h1 class="text-black font-80px text-center"><b>Add new customer to <b> Electronic Instruments Supply</b>  System</h1>    				
    			</div>

    			<div class="col-md-4 margin-top30">
    				<h2 class="text-black text-center"> <b>Add New customer</b> </h2>
    				<form class="form"  method="POST">
                        <label class="text-black"> First Name:</label>
                        <input type="Name" class="form-control" placeholder="Enter your Name" name="user_name" required><br>
    					<label class="text-black"> Email:</label>
    					<input type="email" class="form-control" placeholder="Enter your Email" name="user_email" required><br>
						<label class="text-black"> Phone Number:</label>
    					<input type="tel" class="form-control" placeholder="Enter your Phone Number 065599...." name="user_phone" required><br>
    					<label class="text-black"> Password:</label>
    					<input type="password" class="form-control" placeholder="Password" name="user_password" required><br>
						<label class="text-black">
						<?php
						?>
						Role
						</label>
            <select class="form-control" name="user_type" id="user_type">
                <option class="form-control" value="0">Member</option>
                <option class="form-control" value="1">Admin</option>
				<option class="form-control" value="2">Supplier</option>
            </select>
			<br>
    					<input type="submit" class="btn btn-danger btn-lg btn-block" value="submit" name="submit"><br>

    				</form>
    			</div>
    		</div>
    	</div>
	</body>
</html>