
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

    $show_query = "select * from tbl_tasks where id = $id";
    $show_result = mysqli_query($conn,$show_query);
    $row = $show_result->fetch_assoc();

  $title = $row['title'];
  $priority = $row['priority'];
  $details = $row['details'];
  $deadline = $row['deadline'];
  $status = $row['status'];
}
 ?>

<?php

// When update a task form is submitted, 
if(isset($_POST['update'])) {
  $title = $_POST['title'];
  $priority = $_POST['priority'];
  $details = $_POST['details'];
  $deadline = $_POST['deadline'];
  

  if($title!="" && $priority!="" && $details!="" && $deadline!="") 
  {
  //update query is also called INSERT INTO QUERY
  $edit_query = "UPDATE tbl_tasks set title = '$title',priority= '$priority',details = '$details',deadline ='$deadline' where id = '$id'";
  $edit_result = mysqli_query($conn,$edit_query);
  if($edit_result) 
  {
    ?>
<div class="alert alert-success" id="success-alert" role="alert">
  Task updated successfully.
</div>

     
        <!-- <script>alert ("Data inserted Successfully")</script> ; -->
      
      <meta http-equiv="refresh" content="0; URL=manageTasks.php?msg=success" />
     

    <?php
  }
  else 
  {
    ?>
                   
                          <strong>Task couldn't be updated successfully.</strong> 
                 
                   
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
                                <div class="form-group">
                                  <label for="">Task Title <span style="color:red;">*</span></label>
                                  <input type="text"class="form-control" name="title" id="" value ="<?php echo $title; ?>" aria-describedby="helpId" placeholder="" required>
                                </div>
                                <div class="form-group">
                                  <label for="">Task Priority <span style="color:red;">*</span></label>
                                  <select class="form-control" name="priority" id="" required>
                                        <?php
                                            if($priority == "Normal")
                                            {
                                        ?>
                                                <option selected><?php echo $priority;?></option>
                                                <option value="Normal">High</option>
                                                <option value="Low">Low</option>
                                            <?php
                                            }
                                            else if($priority =="High")
                                            {
                                            ?>
                                                <option selected><?php echo $priority;?></option>
                                                <option value="Normal">Normal</option>
                                                <option value="Low">Low</option>
                                            <?php
                                            }
                                            else if($priority =="Low")
                                            {
                                            ?>
                                        
                                                <option selected><?php echo $priority;?></option>
                                                <option value="Normal">Normal</option>
                                                <option value="Low">High</option>
                                            <?php
                                            }
                                            ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="">Task Details <span style="color:red;">*</span></label>
                                  
                                  <input type="text"class="form-control" name="details" id="" value= "<?php echo $details ?>" aria-describedby="helpId" placeholder="" required>
                                </div>
                                <div class="form-group">
                                  <label for="">Task Deadline <span style="color:red;">*</span></label>
                                  <input type="date"class="form-control" name="deadline" id="" value= "<?php echo $deadline ?>" aria-describedby="helpId" placeholder="" required>
                                </div>
                                <button type="update" class="btn btn-primary" name="update">UPDATE</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

               

            </div>
            <!-- End of Main Content -->

<?php require('inc/footer.php'); ?>
