<html>
	<?php 
		session_start();
		
		if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  		{
    		header('Location: ../customer/login');
  		}
  		include "../includes/css_header.php";
		include "../includes/dbconnect.php";
	?>
	<body style="background-color: #EEEEEE;">
		<?php 
		        $user_email = $_SESSION['email'];
				$sql = mysqli_query($connection, "SELECT * FROM users WHERE email = '$user_email' ");
				$row = mysqli_fetch_assoc($sql);
				if($row['user_type'] == 1 && $row['user_type'] = 11 )
				{
				  include "../includes/header_admin.php";
				}
				else
				{
				include "../includes/header_postlogin.php";
				} 

      	$user_id=$_GET['user'];
          if(isset($_GET['user'])){
            $user_id = $_GET['user'];
            $user_id = encryptor('decrypt', $user_id );
            $query="SELECT * FROM `orders` o JOIN `products` p ON o.`product_id`=p.`product_id` 
            JOIN `users` u ON o.`user_id`=u.`user_id` JOIN `details` d ON o.`user_id`=d.`user_id` WHERE o.`user_id`
            = '$user_id'  GROUP BY o.`order_id` ORDER BY o.`order_id` DESC ";
          }
		  if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		$product_id = encryptor('encrypt', $row['product_id'] );
				echo '<div class="container">
			        	<div class="row padding30">  
			          		<div class="col-md-6">
			                	<div class="product-tab">
				           	  		<img src="../images/'.$row['product_image'].'" class="img-size-lg">
				            	</div>
					    	</div>
				      	   	<div class="col-md-6">
				      	   		<div class="product-tab">
					                <h1 class="text-center"> '.$row['product_name'].'</h1>
					                <p> &nbsp&nbsp&nbsp&nbsp '.$row['product_description'].'<br>
					                <br> <b>&nbsp&nbsp&nbsp&nbspPrice: Tsh '.$row['product_price'].'/1</b><br><br></p> 
					                <a style="margin-left: 10%" href="add_to_cart?product='.$product_id.'" class="btn btn-lg btn-danger"> Add to Cart</a>
					                <a style="margin-left: 20%" href="products" class="btn btn-lg btn-warning">Back home</a>
				                </div>
				           	</div>
				        </div>
				    </div>';				
      	?>

      	
	</body>
</html>