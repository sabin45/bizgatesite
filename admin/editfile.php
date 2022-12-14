
<?php session_start();
    require('inc/toppart.php');
    
    $email = $_SESSION['email'];

    if($email == true){
    
    } else{
       header('Location: ../index.php');
    } ?>

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

// When create a task form is submitted, 
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $show_query = "select * from tbl_files where id = $id";
    $show_result = mysqli_query($conn,$show_query);
    $row = $show_result->fetch_assoc();

  $name = $row['name'];
}
 ?>

<?php

// When update a task form is submitted, 
if(isset($_POST['update'])) {
  $name = $_POST['filename'];
 

  if($name!="") 
  {
  //update query is also called INSERT INTO QUERY
  $edit_query = "UPDATE tbl_files set name = '$name' where id = '$id'";
  $edit_result = mysqli_query($conn,$edit_query);
  if($edit_result) 
  {
    ?>
<div class="alert alert-success" id="success-alert" role="alert">
  File updated successfully.
</div>

     
        <!-- <script>alert ("Data inserted Successfully")</script> ; -->
      
      <meta http-equiv="refresh" content="0; URL=manageTasks.php?msg=success" />
     

    <?php
  }
  else 
  {
    ?>
                   
                          <strong>File couldn't be updated successfully.</strong> 
                 
                   
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

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit a Task</h6>
                        </div>
                        <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">File Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="filename" placeholder=""  value ="<?php echo $name; ?>">
                            </div>
                            
                            </div>
                                <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" name="update" class="btn btn-primary">update</button>
                    </div>
                </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

               

            </div>
            <!-- End of Main Content -->

<?php require('inc/footer.php'); ?>
