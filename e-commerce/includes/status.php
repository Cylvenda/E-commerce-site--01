<?php
    include "dbconnect.php";
        if(isset($_GET['status'])){
        $user_id = $_GET['user'];
        $user_id = encryptor('decrypt', $user_id);
        $status = $_GET['status'];
        $change_status ="UPDATE users SET status = $status WHERE user_id = '$user_id'  ";
        mysqli_query($connection, $change_status);
        header('Location: ../admin/admin_members');
    }


    if(isset( $_GET['user_type'])){
        $user_id = $_GET['user'];
        $user_id = encryptor('decrypt', $user_id);
        $type = $_GET['user_type'];
        $change_type ="UPDATE users SET user_type = $type WHERE user_id = '$user_id'  ";
        mysqli_query($connection, $change_type);
        header('Location: ../admin/admin_members');
    }
    
    
    if(isset($_GET['product_status'])){
        $product_id = $_GET['product'];
        $product_id = encryptor('decrypt', $product_id);
        $status = $_GET['product_status'];
        $change_status ="UPDATE products SET product_status = $status WHERE product_id = '$product_id'  ";
        mysqli_query($connection, $change_status);
        header('Location: ../actions/product_dis');
    }

    if(isset( $_GET['order_status'])){
        $user_id = $_GET['customer'];
        $user_id = $_GET['user'];
        $order_user = encryptor('decrypt', $order_user );
        $order_status = $_GET['order_status'];
        $change_type ="UPDATE orders SET order_status = $order_status WHERE order_id = '$order_user'  ";
        mysqli_query($connection, $change_type);
        header('Location: ../actions/manage_orders?customer='.$user_id.'');
    }
    