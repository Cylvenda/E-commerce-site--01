<?php
	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  	{
   		header('Location: ../customer/login');
  	}
?>
<!DOCTYPE html>
<html>
	<?php
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
        	header('Location: ../customer/login');
        }
		
		
	?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center font-80px"> The Orders </h1>
			</div>
		</div>
		<div class="row">
			<?php 
				$query="SELECT * FROM `orders` o JOIN `products` p ON o.`product_id`=p.`product_id` 
				JOIN `users` u ON o.`user_id`=u.`user_id` JOIN `details` d ON o.`user_id`=d.`user_id` GROUP BY u.`user_id` DESC";
				$result=mysqli_query($connection,$query);
				while($row=mysqli_fetch_assoc($result))
				{
					$user_id = encryptor('encrypt', $row['user_id']);
				echo'<div class="col-md-4">
						<div class="order-tab">
						<h3 style="padding-top: 10px;" class="text-center ">'.$row['name'].' Orders</h3>
								
							<p><b>
							Customer Email: <a href="mailto:'.$row['email'].'">'.$row['email'].'</a><br>
							Phone Number: <a href="tel:+'.$row['phone'].'">'.$row['phone'].'</a><br>
							Customer ID: '.$row['user_id'].'<br>
							<a href="../actions/manage_orders?user='.$user_id.'" class="btn btn-sm btn-block btn-success">View Order</a>
							</b></p>
							
						</div>
					</div>';
				}
			?>
		</div>		
	</div>
</body>
</html>