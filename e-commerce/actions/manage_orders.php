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
		
		
		if(isset($_GET['user'])){
		$user_id = $_GET['user'];
		$user_id = encryptor('decrypt', $user_id );
		$query="SELECT * FROM `orders` o JOIN `products` p ON o.`product_id`=p.`product_id` 
		JOIN `users` u ON o.`user_id`=u.`user_id` JOIN `details` d ON o.`user_id`=d.`user_id` WHERE o.`user_id`
		= '$user_id'  GROUP BY o.`order_id` ORDER BY o.`order_id` DESC ";
		$result=mysqli_query($connection,$query);
		$row=mysqli_fetch_assoc($result);
		}else{
			$user_id = $_GET['customer'];
		}
	?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center font-80px"><?php echo $row['name']; ?> Orders</h1>
			</div>
		</div>
		<div class="row">
			<?php
				while($row=mysqli_fetch_assoc($result))
				{

					$order_user = encryptor('encrypt', $row['order_id']);
				?>
				 <div class="col-md-3">
						<div class="product-tab-new">
							<p><b> User Name: <?php echo $row['name'] ?><br>
							User ID: <?php echo $row['user_id'] ?><br>
							Product Name: <?php echo $row['product_name'] ?><br>
							Product ID: <?php echo $row['product_id'] ?><br>
							Quantity: <?php echo $row['quantity'] ?><br>
							Address: <?php echo $row['address'] ?><br>
							Order Pressed At: <?php echo $row['time_pressed'] ?><br>
							Order ID: <?php echo $row['order_id'] ?><br>
						 <?php 
								// if($row['order_status'] == 1){
								// 	echo'<a class="btn btn-block btn-sm btn-success" href="../includes/manage_orders?customer='.$order_user.'&order_status=0">DONE</a> ';
									
								// }else{
								// 	echo'<a class="btn btn-block btn-sm btn-warning" href="../includes/status?customer='.$order_user.'&order_status=1">PENDING</a> ';

								// }
			
							?><br>
							</b></p>
						
						</div>
					</div>
					<?php
				}
			?>
		</div>		
	</div>
</body>
</html>