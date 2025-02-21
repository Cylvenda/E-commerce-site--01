<?php
	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  	{
    	header('Location: ../customer/login');
  	}
	include "../includes/dbconnect.php";
    ?>
<!DOCTYPE html>
<?php include "../includes/css_header.php"; 

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
    include "../includes/css_header.php";
?>
<style>
    body{
        margin-left: 10rem;
    }
</style>
<body>
<div class="col-lg-13">
        <h1 class="text-center"><b>Available Products</b></h1>
        <div class="row">
        <?php 
         if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

          $query1="SELECT * FROM `products`";
          $result1=mysqli_query($connection,$query1);
          while($row1=mysqli_fetch_assoc($result1))
          {
            $product_id = encryptor('encrypt', $row1['product_id']);
            ?>
            <div class="col-md-10">
                    <div class="row list">
                      
                      <div class="col-md-7">
                      <div class="col-md-3">
                        <a href="<?php echo 'product_description.php?product='.$product_id.' ' ?>">
                        <img src="<?php echo ' ../images/'.$row1['product_image'].' ' ?>" class="img-product">
                        </a>
                         </div>
                      

                      <div class="col-md-5">
                        <b><?php echo $row1['product_name'] ?></b><br>
                        <p><b>Tsh. <?php echo $row1['product_price'] ?></b></p>
                      </div>
                      </div>
                          <br><br>
                      <div class="col-md-5">
                        <small><a href="<?php echo "product_edit?product='.$product_id.' " ?>" class="btn btn-primary">Edit</a></small>
                        <?php  
                        if($row1['product_status'] == 1){
                            echo '<small><a href="../includes/status?product='.$product_id.'&product_status=0" class="btn btn-success">Active</a></small>';
                        }else{
                            echo '<small><a href="../includes/status?product='.$product_id.'&product_status=1" class="btn btn-warning">Blocked</a></small>';
                        }
                        ?>
                        <small><a href="<?php echo "delete_it?product='.$product_id.' " ?>" class="btn btn-danger">Delete</a></small>
                      </div>

                      

                    </div>            
                  </div>
        <?php  } ?>
        </div>
      </div>     
    </div>


</body>
</html>