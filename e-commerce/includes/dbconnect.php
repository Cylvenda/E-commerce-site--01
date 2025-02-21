<?php


    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'e_commerce';

    try{

    $connection = new mysqli($host, $user, $pass, $db);

    
}catch(mysqli_sql_exception){
    echo "<h1 class='text-center text-red'><i>Sorry We are not available right now, check us later</i></h1>";
}

function encryptor($action, $string){
    $output = false;
    $encrypt_method = "AES-256-CBC";

    $secret_key = 'Elline Tech';
    $secret_iv = 'elline@2025';

    $key = hash('sha256', $secret_key);

    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    
    if($action == 'encrypt'){
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }elseif($action == 'decrypt'){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

    return $output;
}
