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

      	$product_id = $_GET['product'];
		$product_id = encryptor('decrypt', $product_id );
      	$query = "SELECT * FROM products P JOIN details D ON P.product_id = D.product_id JOIN orders O ON O.user_id = D.user_id
        JOIN users U ON U.user_id = O.user_id WHERE O.product_id = '$product_id' ";
        // "SELECT * FROM `products` ";
      	$results=mysqli_query($connection,$query);
      	$row=mysqli_fetch_assoc($results);
      	
		  if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		$product_id = encryptor('encrypt', $row['product_id'] );
        $price = $row['product_price'];
        $qty = $row['quantity'];
        $total_price = $price * $qty ;
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
                                    <br> <b>&nbsp&nbsp&nbsp&nbspCustomer Email :'.$row['email'].'</b><br></p> 
					                <br> <b>&nbsp&nbsp&nbsp&nbspPrice : Tsh '.$row['product_price'].'</b><br></p> 
                                    <b>&nbsp&nbsp&nbsp&nbspTotal Product Quantity : '. $row['quantity'].'</b><br>
                                    <br> <b>&nbsp&nbsp&nbsp&nbspTotal Price : Tsh '. $total_price.'</b><br></p>
                                    <b>&nbsp&nbsp&nbsp&nbspTime order pressed : '. $row['time_pressed'].'</b><br></p>
                                    <b>&nbsp&nbsp&nbsp&nbspOrder`s Address : '. $row['address'].'</b><br></p>
					                <a style="margin-left: 10%" href="delete_from_order?product='.$product_id.'" class="btn btn-lg btn-danger"> Delete Order</a>
					                <a style="margin-left: 20%" href="show_order_items" class="btn btn-lg btn-warning">Back</a>
				                </div>
				           	</div>
				        </div>
				    </div>';				
      	?>

      	
	</body>
</html>