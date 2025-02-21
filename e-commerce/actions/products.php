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
        if($row['user_type'] == 1 && $row['user_type'] = 11 )
        {
          include "../includes/header_admin.php";
        }
        else
        {
        include "../includes/header_postlogin.php";
        }
   ?>
<body style="background-image: url('../images/backgrund2.jpg'); !important">
  

  <div class="container ">
    <h1 class="text-center font-80px margin-bottom50"> <b>Welcome Again <?php echo $_SESSION['name']; ?>! </b></h1>

    <div class="row">
      <?php 
        $query="SELECT * FROM `products` WHERE product_status = 1 ORDER BY RAND()";
        $result=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($result))
        {
           $product_id = encryptor('encrypt', $row['product_id'] );
          echo '<div class="col-md-3">
                  <div class="product-tab">
                    <img src="../images/'.$row['product_image'].'" class="img-size curve-edge">
                    <h3 class="text-center"><b>'.$row['product_name'].'</b></h3>
                    <a href="product_description?product='.$product_id.'" class="btn btn-block btn-success"> View Details </a>
                  </div>
                </div>';
        }
      ?>
             
    </div> 

    <div class="row">
      

      <div class="col-md-10">
        <div class="row">

          <div class="col-md-12 bio-tab">
            <div class="row">
              <div class="col-md-4">
                <img src="../images/ourlogo.jpg" class="img-size img-circle">
              </div>

              <div class="col-md-8">
                <h1 class="text-center"> <b>About Electronic Intruments Supply</b> </h1>
                <p><b><i>Tanzania Online <b>Electronics instruments Supply</b> <br> Shopping Site 
                       <b>Electronic Intruments Supply</b> is here for you, To make sure that all electronics instruments
                  you need, You found it in time and at affordable price. This is done  throug out all country. <br>
                  Also we ensure the security of customer's orders.
                   </p>  
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <img src="../images/cat1.jpg" class="img-size-lg">
          </div>

        </div>
      </div>

      <!--List of items in 2/12 parts-->
      <div class="col-md-2">
        <h2 class="text-center"><b>Chart Menu</b></h2>
        <div class="row">
        <?php 
          $query1="SELECT * FROM `products` WHERE product_status = 1 ORDER BY RAND() LIMIT 7 ";
          $result1=mysqli_query($connection,$query1);
          while($row1=mysqli_fetch_assoc($result1))
          {
            $product_id = encryptor('encrypt', $row1['product_id'] );
            echo '<div class="col-md-15">
                    <div class="row list hover-pink">
                      
                      <div class="col-md-7">
                        <a href="product_description?product='.$product_id.'">
                        <img src="../images/'.$row1['product_image'].'" class="img-size-xs">
                        </a>
                      </div>

                      <div class="col-md-5">
                        <b>'.$row1['product_name'].'</br><br>
                        <small>Tsh.'.$row1['product_price'].'</small>
                      </div>

                    </div>            
                  </div>';
          }         
        ?>
        </div>
      </div>     
    </div>

    <?php include "../includes/footer.php"; ?>
   
  </div>
</body>
</html>