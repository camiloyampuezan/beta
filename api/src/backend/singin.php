<?php

    require('../../config/db_connection.php');
    
    $email=$_POST['email'];
    $pass=$_POST['passwd'];
    $enc_pass = md5($pass);

    //validate if email already exists
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = pg_query($conn, $query);
    $row = pg_fetch_assoc($result);

    if(row) {
        echo "<script>alert('Email already exists!')</script>";
        header('Refresh:0; url="http://127.0.0.1/beta/api/src/register_form.html');
        exit();
    }

    $query = "  INSERT INTO users (email, password)
        VALUES ('$email', '$enc_pass')
    ";

    $result = pg_query($conn, $query);

    if($result) {
        //echo "Registration Successful!";
        echo "<script>alert('Registration Successful!')</script>";
        header('Refresh:0; url="http://127.0.0.1/beta/api/src/loging_form.html');
    } else {
        echo "Registration fieled!: ";
    }
    pg_close($conn);

?>
