<?php
session_start();
require('../Connection/config.php');

$email = $_SESSION['email'];

if($email == true){

} else{
   header('Location: ../index.php');
}


if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $delete_query = "DELETE from tbl_tasks where id=$id";

    $delete_result = mysqli_query($conn,$delete_query);
    if($delete_query)
    {
        echo header ('Location: ../manageTask.php?msg=dsuccess');
    }else{
        
        echo header ('Location: ../manageTask.php?msg=derror');
    }

}

?>