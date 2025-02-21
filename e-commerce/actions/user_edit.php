<!DOCTYPE html>
<html>
<?php 
	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  	{
    	header('Location: ../customer/register.php');
  	}

    include "../includes/dbconnect.php";
	include "../includes/css_header.php";
		$user_email = $_SESSION["email"]; 
		$sql_query = mysqli_query($connection, "SELECT * FROM users WHERE email = '$user_email' ");
		while($row = mysqli_fetch_assoc($sql_query))
	
		if($row['user_type'] == 1)	
        {
          include "../includes/header_admin.php";
        }
        else
        {
        	header('Location: ../index.php');
        }

	?>

    	<div  class="container">
            <?php 

                $user_id = $_GET["user"];
				$user_id = encryptor('decrypt', $user_id);
                $select_query = mysqli_query($connection, "SELECT * FROM users WHERE user_id = $user_id ")
                or die('error occuerd');
                $row = mysqli_fetch_assoc($select_query);
				
            
				if(isset($_POST['update'])){
					$name=$_POST['user_name'];
					$email=$_POST['user_email'];
					$phone=$_POST['user_phone']; 
					$password=$_POST['user_password'];
					$type=$_POST['user_type']; 

                        // UPDATE QUERY
						$password_hash = password_hash($password, PASSWORD_DEFAULT);
					if($query= "UPDATE users  SET name = '$name', email = '$email', phone = $phone, 
                    password = '$password_hash', user_type = '$type' WHERE user_id = '$user_id' ")
					{
						//redirect
                        mysqli_query($connection, $query);
						$_SESSION['msg'] = "<h3 class='text-center text-red'><i>Customer details updated successfuly..</i></h3><br>";
						header('Location: ../admin/admin_members');
					}
                }
				$pass = password_hash($row['password'], PASSWORD_DEFAULT);
             ?>
    		<div class="col">
    			<div class="col-md-8 margin-top50">
    				<h1 class="text-black font-80px text-center"><b>Edit customer's Details from the system  </h1>    				
    			</div>

    			<div class="col-md-4 margin-top30">
    				<h2 class="text-black text-center"> <b>Edit customer details</b> </h2>
    				<form class="form"  method="POST">
                        <label class="text-black"> First Name:</label>
                        <input type="Name" class="form-control"  value="<?php echo $row['name']; ?>" name="user_name" required><br>
    					<label class="text-black"> Email:</label>
    					<input type="email" class="form-control" value="<?php echo $row['email']; ?>" name="user_email" required><br>
						<label class="text-black"> Phone Number:</label>
    					<input type="text" class="form-control" value="<?php echo $row['phone']; ?>" name="user_phone" required><br>
    					<label class="text-black"> Password:</label>
    					<input type="password" class="form-control" value="<?php echo $pass; ?>"  name="user_password" required><br>
						<label class="text-black">
						Role
						</label>
            <select class="form-control" name="user_type" id="user_type">
            <option class="form-control">
                        <?php
    
                    if($row['user_type'] == 1){
                        echo'Admin';
                    }elseif($row['user_type'] == 0){
                        echo'Customer';
                    }elseif($row['user_type'] == 11){
                        echo'Supplier';
                    }else{
                        echo'error';
                    }
                    
                ?>
            </option>
                <option class="form-control" value="0">Customer</option>
                <option class="form-control" value="1">Admin</option>
				<option class="form-control" value="2">Supplier</option>
            </select>
			<br>
    					<input type="submit" class="btn btn-danger btn-lg btn-block" value="update" name="update"><br>

    				</form>
    			</div>
    		</div>
    	</div>
	</body>
</html>