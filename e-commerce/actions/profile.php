<!DOCTYPE html>
<html>
<?php 
	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  	{
    	header('Location: ../customer/register.php');
  	}
	  include "../includes/css_header.php";
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
        	header('Location: ../index.php');
        }
	?>

    	<div  class="container">
            <?php 

                
                $select_query = mysqli_query($connection, "SELECT * FROM users WHERE email = '$user_email' ")
                or die('error occuerd');
                $row = mysqli_fetch_assoc($select_query);
				
            
				if(isset($_POST['update'])){
					$name=$_POST['user_name'];
					$email=$_POST['user_email'];
					$phone=$_POST['user_phone']; 
					

                        // UPDATE QUERY
						
					if($query= "UPDATE users  SET name = '$name', email = '$email', phone = $phone
                     WHERE email = '$user_email' ")
					{
						//redirect
                        mysqli_query($connection, $query);
						$_SESSION['msg'] = "<h3 class='text-center text-red'><i>Details Updated successfully..</i></h3><br>";
						
					}
                }
				
             ?>
    		<div class="col">
    			<div class="col-md-8 margin-top50">
    				<h1 class="text-black font-80px text-center"><b>Edit Details from the system  </h1> <br>
                    <a class="btn btn-primary btn-lg" style="margin-left: 27rem;" href="change_P">Change Password</a>
                    
		
    			</div>
                <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
    			<div class="col-md-4 margin-top30">

    				<h2 class="text-black text-center"> <b>Edit/Updated details</b> </h2>
    				<form class="form"  method="POST">
                        <label class="text-black"> First Name:</label>
                        <input type="Name" class="form-control"  value="<?php echo $row['name']; ?>" name="user_name" required><br>
    					<label class="text-black"> Email:</label>
    					<input type="email" class="form-control" value="<?php echo $row['email']; ?>" name="user_email" required><br>
						<label class="text-black"> Phone Number:</label>
    					<input type="text" class="form-control" value="<?php echo $row['phone']; ?>" name="user_phone" required><br>
    					<br>
    					<input type="submit" class="btn btn-primary btn-lg btn-block" value="update" name="update"><br>

    				</form>
    			</div>
    		</div>
    	</div>
	</body>
</html>