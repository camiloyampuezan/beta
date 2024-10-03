<?php

    require('../../config/db_connection.php');
    
    $email=$_POST['email'];
    $pass=$_POST['passwd'];
    $enc_pass = md5($pass);

    $query = "  INSERT INTO users (email, password)
        VALUES ('$email', '$enc_pass')
    ";

    $result = pg_query($conn, $query);

    if($result) {
        echo "Registration Successful!";
    } else {
        echo "Registration fieled!: ";
    }
    pg_close($conn);

?>
