
<?php 
session_start();
    require('inc/toppart.php');
    
    $email = $_SESSION['email'];

    if($email == true){
    
    } else{
       header('Location: ../index.php');
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

// When create a user form is submitted, 
if(isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $pwd = md5($_POST['pwd']);
  $repwd = md5($_POST['repwd']);

    
  if($fname!="" && $lname!="" && $email!="" && $pwd!="") 
  {
  //Create query is also called INSERT INTO QUERY
  $create_query = "INSERT INTO tbl_user (firstname,lastname,email,password) VALUES('$fname','$lname','$email','$pwd')";
  $create_result = mysqli_query($conn,$create_query);
  
  if($create_result) 
  {
    ?>
    <div class="alert alert-success alert-dismissible fade show" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>User Created!</strong> successfully.
    </div>
    

     
        <!-- <script>alert ("Data inserted Successfully")</script> ; -->
      
      <meta http-equiv="refresh" content="0; URL=manageUser.php?msg=success" />
     

    <?php
  }
  else 
  {
    ?>
                   
                          <strong>Task couldn't be created successfully.</strong> 
                          <?php echo $create_result; ?>
                 
                   
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
<form action="#" method="POST" enctype="multipart/form-data">
  <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="fname" class="form-control" id="fname" placeholder="Firstname" name="fname" required>
    </div>
    <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="lname" class="form-control" id="lname" placeholder="Last Name" name="lname" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
    </div>
    <div class="form-group">
      <label for="repwd">Re-Password:</label>
      <input type="password" class="form-control" id="repwd" placeholder="Re-Enter your password" name="repwd" required>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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


