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

                $product_id = $_GET["product"];
				$product_id = encryptor('decrypt', $product_id);
                $select_query = mysqli_query($connection, "SELECT * FROM products WHERE product_id = '$product_id' ")
                or die('error occuerd');
                $row = mysqli_fetch_assoc($select_query);
            
				if(isset($_POST['update'])){
					$name = $_POST['product_name'];
					$price = $_POST['product_price'];
					$product_disc = $_POST['product_disc']; 

                        // UPDATE QUERY
					if($query= "UPDATE products  SET product_name = '$name', product_price = '$price', product_description = '$product_disc'
                     WHERE product_id = '$product_id' ")
					{
						//redirect
                        mysqli_query($connection, $query);

                        $_SESSION['msg'] = "<h3 class='text-center text-red'><i>Details Updated Successfully.</i></h3><br>";
						header('Location: product_dis ' );
					}
                }
				
             ?>
    		<div class="col">
    			<div class="col-md-8 margin-top50">
    				<h1 class="text-black font-80px text-center"><b>Edit Product Details </h1>    				
    			</div>

    			<div class="col-md-4 margin-top30">
    				<h2 class="text-black text-center"> <b>Edit Product Details</b> </h2>
    				<form class="form"  method="POST">
                        <label class="text-black"> Product Name:</label>
                        <input type="text" class="form-control"  value="<?php echo $row['product_name']; ?>" name="product_name" required><br>
    					<label class="text-black"> Product Price:</label>
    					<input type="text" class="form-control" value="<?php echo $row['product_price']; ?>" name="product_price" required><br>
						<label class="text-black"> Product Description:</label>
                        <textarea class="form-control" name="product_disc" id="product_disc" ><?php echo $row['product_description']; ?></textarea>			
			<br>
    					<input type="submit" class="btn btn-danger btn-lg btn-block" value="update" name="update"><br>

    				</form>
    			</div>
    		</div>
    	</div>
	</body>
</html>