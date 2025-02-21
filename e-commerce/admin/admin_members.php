
<!DOCTYPE html>
<html lang="en">
<?php 
	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  	{
    	header('Location: ../customer/login');
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
        	header('Location: ../index');
        }
		
		
	?>
    <style>
        .left{
            margin-left: 40px;
        }
    </style>
<body>
<div class="col-lg-11 left">
<div class="table-responsive " >

       <h3> <h2 >List of all system users </h2> <a style ="float: right; margin-bottom: 10px; " class="btn btn-success" href="admin_user_add ">Add Member</a></h3>
       <?php 
                if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
                ?>
        <table class="table table-striped table-hover table-sm">
            <tr>
            <th>##</th>
                <th><b>NAMES</b></th>
                <th><b>EMAIL</b></th>
                <th><b>PHONE NUMBER</b></th>
                <th><b>ROLE</b></th>
                <th><b>STATUS</b></th>
                <th><b>ROLE ACTION</b></th>
                <th><b>EDIT USER</b></th>
            </tr>
            <tr>
                <?php
                
                
                    
                $sql = "SELECT * FROM users ";
                $result = $connection->query($sql);
                if (!$result) {
                    die("Invalid query"); 
                }
                    while($row=$result->fetch_assoc()) {
                        $user_id = encryptor('encrypt', $row['user_id']);
                            ?>
                       <tr><a href="tel:+"></a>
                       <td id="number"><?php echo $row['user_id'] ?></td>
                       <td><?php echo $row['name']?> </td>
                       <td><?php echo $row['email'] ?></td>
                       <td><a href="tel:+<?php echo $row['phone'] ?>"><?php echo $row['phone'] ?></a></td>
                       <td><?php 
                       if($row['user_type'] == 1){
                        echo "Admin";
                       }elseif($row['user_type'] == 0){
                        echo "Customer";
                       }elseif($row['user_type'] == 2){
                        echo "Supplier";
                       }
                       else{
                        echo "Unknown";
                       }
                       ?></td>
                         <td>
                            <?php

                            if($row['status'] == 1 ){
                              echo'<a class="btn btn-sm btn-success" href="../includes/status?user='.$user_id.'&status=0">Active</a>';
                            }else{
                                echo'<a class="btn btn-sm btn-danger" href="../includes/status?user='.$user_id.'&status=1">Blocked</a>';
                            }
                                ?>
                                </td>
                                <td>
                                <?php
                                        
                                    
                                    if($row['user_type'] == 1 ){
                                    echo'<a class="btn btn-sm btn-success" href="../includes/status?user='.$user_id.'&user_type=0">Admin</a> ';
                                    }elseif($row['user_type'] == 0 ){
                                        echo'<a class="btn btn-sm btn-warning" href="../includes/status?user='.$user_id.'&user_type=2">Customer</a> ';
                                    }elseif($row['user_type'] == 2 ){
                                        echo'<a class="btn btn-sm btn-success" href="../includes/status?user='.$user_id.'&user_type=1">Supplier</a> ';
                                    }else{
                                        echo' <a class="btn btn-sm btn-danger" href="../actions/user_edit?user='.$user_id.'">Error</a> ';
                                    }

                               
                                        ?>
                                 </td>
                                 <td>
                             <a class="btn btn-primary" href=' <?php echo" ../actions/user_edit?user=".$user_id." "?>' ></i>Edit</a>
                            
                             </td>
            </tr>                     
            <?php
                }
                ?>
        </table>

    </div>
    </div>
</body>
</html>