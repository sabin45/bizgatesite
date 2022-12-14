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

// When create a task form is submitted, 
if(isset($_POST['submit'])) {
  $title = $_POST['title'];
  $priority = $_POST['priority'];
  $details = $_POST['details'];
  $deadline = $_POST['deadline'];

  if($title!="" && $priority!="" && $details!="" && $deadline!="") 
  {
  //Create query is also called INSERT INTO QUERY
  $create_query = "INSERT INTO tbl_tasks (title,priority,details,deadline) VALUES('$title','$priority','$details','$deadline')";
  $create_result = mysqli_query($conn,$create_query);
  if($create_result) 
  {
    ?>
<div class="alert alert-success" id="success-alert" role="alert">
  Task created successfully.
</div>

     
        <!-- <script>alert ("Data inserted Successfully")</script> ; -->
      
      <meta http-equiv="refresh" content="0; URL=manageTasks.php?msg=success" />
     

    <?php
  }
  else 
  {
    ?>
                   
                          <strong>Task couldn't be created successfully.</strong> 
                 
                   
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
                            <h6 class="m-0 font-weight-bold text-primary">Create a Task</h6>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="">Task Title <span style="color:red;">*</span></label>
                                  <input type="text"class="form-control" name="title" id="" aria-describedby="helpId" placeholder="" required>
                                </div>
                                <div class="form-group">
                                  <label for="">Task Priority <span style="color:red;">*</span></label>
                                  <select class="form-control" name="priority" id="" required>
                                    <option value="High">High</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Low">Low</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="">Task Details <span style="color:red;">*</span></label>
                                  <textarea class="form-control" name="details" id="" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="">Task Deadline <span style="color:red;">*</span></label>
                                  <input type="date"class="form-control" name="deadline" id="" aria-describedby="helpId" placeholder="" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php require('inc/footer.php'); ?>
