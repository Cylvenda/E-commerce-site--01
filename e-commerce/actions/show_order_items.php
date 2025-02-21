<?php
  session_start();  
  if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  {
    header('Location: ../customer/login');
  }
  include "../includes/dbconnect.php";
?>

<!DOCTYPE html>
<html>
  <?php include "../includes/css_header.php";
          $user_email = $_SESSION['email'];
          $sql = mysqli_query($connection, "SELECT * FROM users WHERE email = '$user_email' ");
          $row = mysqli_fetch_assoc($sql);
          if($row['user_type'] == 1 )
          {
            include "../includes/header_admin.php";
          }
          else
          {
          include "../includes/header_postlogin.php";
          }
   ?>
<body style="background-color: #EEEEEE">
  

  <div class="container ">
        <!--All products with 3/12 parts each-->
    <div class="row">
      <?php 
        //$product_id=$_GET['product_id'];
        $user_id=$_SESSION['user_id'];

        $query="SELECT * FROM `orders` c JOIN `products` p ON c.`product_id`=p.`product_id` WHERE c.`user_id`=$user_id";
        $result=mysqli_query($connection,$query);
        

        if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
        
        while($row=mysqli_fetch_assoc($result))
        {
          $product_id = encryptor('encrypt', $row['product_id']);
          echo '<div class="col-md-3">
                  <div class="product-tab-tab">
                    <img src="../images/'.$row['product_image'].'" class="img-size curve-edge">
                    <h3 class="text-center"><b>'.$row['product_name'].'</b></h3>
                    <a href="custom_manage_order?product='.$product_id.'" class="btn btn-block btn-success" >View Details </a>
                    <a href="delete_from_order?product='.$product_id.'" class="btn btn-block btn-danger" >Cancel Order </a>                    
                  </div>
                </div>';
        }