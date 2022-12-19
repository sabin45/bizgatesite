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
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $show_query = "select * from tbl_faqs where id = $id";
    $show_result = mysqli_query($conn,$show_query);
    $row = $show_result->fetch_assoc();

  $question = $row['question'];
  $answer = htmlentities($row['answer']);
    
}
 ?>

                    

 <!-- When update a task form is submitted,  -->
<?php 
    if(isset($_POST['update'])) {
        $question = $_POST['question'];
        $answer =html_entity_decode($_POST['editor1']);
  
        if($question!="" && $answer!="") 
        {
        //Create query is also called INSERT INTO QUERY
        $create_query = "UPDATE tbl_faqs SET question = '$question', answer = '$answer' where id = '$id'";
        $edit_result = mysqli_query($conn,$create_query);
        
        if($edit_result) 
  {
    ?>
<div class="alert alert-success" id="success-alert" role="alert">
  faqs updated successfully.
</div>

     
        <!-- <script>alert ("Data inserted Successfully")</script> ; -->
      
      <meta http-equiv="refresh" content="0; URL=managefaqs.php?msg=success" />
     
    <?php
    header('location: managefaqs.php');
  }
  else 
  {
    ?>
                   
                          <strong>faqs couldn't be updated successfully.</strong> 
                 
                   
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
                    <h6 class="m-0 font-weight-bold text-primary">Update FAQ </h6>
            </div>
            <div class="card-body">
              <!-- form start -->
              <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="question">Question <span style="color:red;">*</span></label>
                        <input type="text"class="form-control" name="question" id="" placeholder="" value ="<?php echo $question; ?>">          
                    </div>

                    <div class="form-group">
                        <label for="">Answer <span style="color:red;">*</span></label>
                        <textarea class="form-control" name="editor1" id="editor1"  value =""><?php echo $answer; ?></textarea>
                    </div>
     
                    <button type="submit" id = "update" class="btn btn-primary" name="update">Update</button>
  </form>
</div>

</div>
  
<!-- form end -->


<script>
  CKEDITOR.replace('editor1');
                        
                </script>
                <style>
.ck-editor__editable_inline {
    min-height: 400px;
}
</style>

<?php require('inc/footer.php'); ?>