<?php
	session_start();	
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
	{
    	header('Location: ../customer/login');
	}
	include "../includes/dbconnect.php";

	$product_id = $_GET['product'];
	$product_id = encryptor('decrypt', $product_id);
	
	$user_id=$_SESSION['user_id'];
	

?>
<!DOCTYPE html>
<html>
	<?php include "../includes/css_header.php" ?>
	<body style="background-color: #EEEEEE;">
		<?php include "../includes/header_postlogin.php" ?>
		
		<div class="row">
			<div class="col-md-6">
				<h1 class="text-center"> <b>Please enter the delivery details of this Product. Thank you..</b> </h1><br>
				<i class="text-center"><b>NOTE: You purchase medium is COD('Cash On Delivery')</b></i>
			</div>
			<div class="col-md-6">

				<form class="text-center" action="add_to_details.php" method="POST">
					<input type="hidden" name="product_id" value=" <?php echo $product_id; ?>">
					<label><h3><b>Please enter your Address: </b></h3></label>
					<input type="text" name="address" class="form-control" placeholder="Address..."><br>
					<label><h3><b>Quantity(\1): </b></h3></label>
					<input type="number" min="1" max="10" step="1" name="quantity" class="form-control" placeholder="Quantity"><br>
					<input type="submit" value="Submit Details" class="btn btn-danger btn-lg">
				</form>
			</div>
		</div>
	</body>
</html>