<?php 
	session_start();
?>
<!DOCTYPE html>
<html>

	<?php include "../includes/css_header.php" ?>

	<body style="background-color:#2F3235 !important">

		<?php include "../includes/pre_login_header.php" ?>

	  	<div id="main_body" class="container">
    		<div class="row">
    			<div class="col-md-8 margin-top50">
    				<h1 class="text-white font-80px text-center"><b>Get all Eletronic Instruments with us:

					<br>
					</b>Eletronic Instruments Supply</b></h1>   				
    			</div>

    			<div class="col-md-4 margin-top50">
				<?php 

						if(isset($_SESSION['msg'])){
							echo $_SESSION['msg'];
							unset($_SESSION['msg']);
						}
						?>
    				<h2 class="text-white text-center"> <b>Login to continue</b> </h2>
    				<form class="form"  action="login_user.php" method="POST">
    					<label class="text-white">Email:</label>
    					<input type="email" class="form-control" placeholder="Enter your Email" name="user_email" required><br>
    					<label class="text-white">Password:</label>
    					<input type="password" class="form-control" placeholder="Password" name="user_password" required><br>
    					<input type="submit" class="btn btn-danger btn-lg btn-block" value="Login" name=""><br>
    				</form>
    				<p class="text-white"><i>Not a member? <a href="register">Register Here</a></i></p>
    			</div>
    		</div>
    	</div>
	</body>
</html>