<!DOCTYPE html>
<html>
	<?php 
	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  	{
    	header('Location: ../customer/login');
  	}
	include "../includes/css_header.php"; ?>
<body style="background-color: #EEEEEE;">
	<?php include "../includes/header_admin.php"; ?>
	<div class="row margin-left20">

		<div class="col-md-12 text-center">
			<h1 class="font-80px">Admin Pannel</h1>
		</div>
		<br><br><br>
		<a href="admin_orders" class="btn btn-lg btn-success margin-left20"> View all Orders</a>
		<a href="admin_members" class="btn btn-lg btn-success margin-left20"> View all Members</a>
		<a href="../actions/product_dis" class="btn btn-lg btn-success margin-left20"> View Products</a>

		<br><br><br>
		<?php 
			   if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
        ?>
		<div class="row">
			<div class="col-md-5">
				<h3 class="font-80px">Add a product To Database</h3>
			</div>
			<div class="col-md-6">
				<form action="../actions/upload_product" method="POST" enctype="multipart/form-data">
					<label>Product Name</label>
					<input type="text" name="product_name" class="form-control"><br>
					<label>Product Price</label>
					<input type="number" name="product_price" class="form-control"><br>
					<label>Product Description</label>
					<textarea name="product_description" class="form-control"></textarea><br>
					<label>Upload Image</label>
					<input type="file" name="image" class="form-control"><br>
					<input type="submit" value="Add product" class="btn btn-success btn-lg">
				</form>
			</div>
		</div>
		
	</div>
</body>
</html>