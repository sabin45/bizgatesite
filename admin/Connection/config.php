<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'Nepal@123';
    $db_name = 'blizzardgate';

    $conn = new mysqli($servername,$username,$password,$db_name);

    if($conn){
        echo 'Database connection successful';
    } else{
        echo 'Database configuration error.';
    }

?>