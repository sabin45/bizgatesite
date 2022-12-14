<?php
    session_start();
    require('../Connection/config.php');

    $email = $_SESSION['email'];

    if($email == true){

    } else{
       header('Location: ../index.php');
    }

    if(isset($_POST['login'])) 
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query= "SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = $result->fetch_assoc();
    $count=mysqli_num_rows($result);
    if ($count>0)
    {
        $_SESSION['email'] = $email;
        echo header("location: ../dashboard.php");
    } 
    else{
        echo header("location: ../index.php?msg=loginerror");
    }
}
?>


