<?php 
  session_start();
    require('inc/toppart.php');

    $email = $_SESSION['email'];
    if($email == true){

    }else{
      header ('Location: ../index.php');
    }
 ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php require('inc/sidebar.php'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            <?php require('inc/navbar.php'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                    <?php
 
 if(isset($_GET['id']))
 {
    $id=$_GET['id'];
   
    $select= "select * from tbl_user where id='$id'";
    $show_result = mysqli_query($conn,$select);
    $row = $show_result->fetch_assoc();
    

    $fname=$row['firstname'];
    $lname=$row['lastname'];
    $email=$row['email'];
 }
 ?>

<?php

if(isset($_POST['update'])) {
  $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    if($fname!="" && $lname!="" && $email!="") 
    {
   
       $update = "UPDATE tbl_user set firstname='$fname',lastname='$lname',email='$email' where id='$id'";
       $edit_result=mysqli_query($conn,$update);
       if($edit_result) 
        {
    ?>
      <div class="alert alert-success" id="success-alert" role="alert">
        User updated successfully.
      </div>

     
        <!-- <script>alert ("Data inserted Successfully")</script> ; -->
      
      <meta http-equiv="refresh" content="0; URL=manageUser.php?msg=success" />
     

    <?php
     }
       else 
     {
    ?>
                   
                          <strong>User Details couldn't be updated successfully.</strong> 
                 
                   
    <?php
  }
}
else 
{
  ?>
                       
                          <strong>All fields are necessary.</strong> 
                
                   
  <?php
}
  }
?>

<!-- form started -->
<div class="container">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Create User</h6>

</div>

<div class="card-body">
<form action="#" method="POST">
  <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="fname" class="form-control" id="fname" name="fname" value = "<?php  echo $fname ;?>" required>
    </div>
    <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="lname" class="form-control" id="lname" name="lname" value = "<?php  echo $lname ;?>" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" value = "<?php  echo $email ;?>" required>
    </div>
    <!-- <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
    </div>
    <div class="form-group">
      <label for="repwd">Re-Password:</label>
      <input type="password" class="form-control" id="repwd" placeholder="Re-Enter your password" name="repwd" required>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div> -->
    <button type="update" class="btn btn-primary" name="update">Update</button>
  </form>
</div>

</div>
  




<!-- form end -->
<?php require('inc/footer.php'); ?>
<script>
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>


