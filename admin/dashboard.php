<?php
session_start();



require('inc/toppart.php');
require('inc/navbar.php');
require('inc/sidebar.php');
require('inc/footer.php');

$email = $_SESSION['email'];

if($email == true){

} else{
   header('Location: ../index.php');
}
?>