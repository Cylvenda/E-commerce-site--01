<?php 
	session_start();
?>
<!DOCTYPE html>
<html>

	<?php include "../includes/css_header.php" ?>
	
    <body style="background-color:#2F3235 !important">
        
    <?php include "../includes/pre_login_header.php" ?>

    	<div id="main_body" class="container">
            <?php 

				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
             ?>
    		<div class="row">
    			<div class="col-md-8 margin-top50">
    				<h1 class="text-white font-80px text-center"><b>Welcome to <b> Electronic Instruments Supply</b></h1>    				
    			</div>

    			<div class="col-md-4 margin-top50">
    				<h2 class="text-white text-center"> <b>Create an Account here</b> </h2>
    				<form class="form" action="register_user.php" method="POST">
                        <label class="text-white">First Name:</label>
                        <input type="Name" class="form-control" placeholder="Enter your Name" name="user_name" required><br>
    					<label class="text-white">Email:</label>
    					<input type="email" class="form-control" placeholder="Enter your Email" name="user_email" required><br>
						<label class="text-white">Phone Number:</label>
    					<input type="number" class="form-control" placeholder="Enter your Phone Number (0655...)" name="user_phone" required><br>
    					<label class="text-white">Password:</label>
    					<input type="password" class="form-control" placeholder="Password" name="user_password" required><br>
    					<input type="submit" class="btn btn-danger btn-lg btn-block" value="Register" name=""><br>
    				</form>
    				<p class="text-white"><i>Already a member? <a href="login">Login Here</a></i></p>
    			</div>
    		</div>
    	</div>
	</body>
</html>