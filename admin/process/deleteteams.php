<?php 
session_start();
include ('../Connection/config.php');

$email = $_session['email'];
if($email == true){

} else{
   header('Location: ../index.php');
}

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $delete_query = "DELETE from tbl_teams where id=$id";

    $delete_result = mysqli_query($conn,$delete_query);
    if($delete_query)
    {
        echo header ('Location: ../manageteams.php?msg=dsuccess');
    }else{
        
        echo header ('Location: ../manageteams.php?msg=derror');
    }

}


?>