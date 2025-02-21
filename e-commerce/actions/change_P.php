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
				
            
				if(isset($_POST['update'])){
                    $old_pass = $_POST['old_pass'];
					$new_pass = $_POST['new_pass'];
					$password = $_POST['new_new_pass'];
					
                    if($new_pass == $password){
                        $old_password = password_hash($old_pass, PASSWORD_DEFAULT);
                        $sql_query = mysqli_query($connection, "SELECT * FROM users WHERE email = '$user_email' ");
                        while($row = mysqli_fetch_assoc($sql_query))
                    
                        if(password_verify($old_pass,$row['password'], )){
                            $password_hash = password_hash($password, PASSWORD_DEFAULT);
                            if($query= "UPDATE users  SET password = '$password_hash' WHERE email = '$user_email' ")
                            {
                                
                                mysqli_query($connection, $query);
                                $_SESSION['msg'] = "<h3 class='text-center text-red'><i>Customer details updated successfuly..</i></h3><br>";
                                
                            }
                        }else{
                            $_SESSION['msg'] = "<h3 class='text-center text-red'><i>Incorrect Old Password</i></h3><br>";

                        }
                    }else{
                        $_SESSION['msg'] = "<h3 class='text-center text-red'><i>Error Occured OR <br> New Password Must match</i></h3><br>";

                    }
                }
				
             ?>
    		<div class="col">
    			<div class="col-md-8 margin-top50">
    				<h1 class="text-black font-80px text-center"><b>Edit/updated Password </h1> <br><br>
                    <a class="btn btn-success btn-lg" style="margin-left: 30rem;" href="profile">Back</a>   				
    			</div>

    			<div class="col-md-4 margin-top30">
                    <?php
                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                    }
                    ?>
    				<h2 class="text-black text-center"> <b>Change Password</b> </h2>
    				<form class="form"  method="POST">
                        <label class="text-black"> Old Password:</label>
                        <input type="Name" class="form-control"   name="old_pass" required><br>
    					<label class="text-black"> New Password:</label>
    					<input type="text" class="form-control"  name="new_pass" required><br>
						<label class="text-black"> Comfirm New Password:</label>
    					<input type="text" class="form-control" name="new_new_pass" required><br>
    					
    					<input type="submit" class="btn btn-primary btn-lg btn-block" value="update" name="update"><br>

    				</form>
    			</div>
    		</div>
    	</div>
	</body>
</html>