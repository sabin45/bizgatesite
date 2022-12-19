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
                if(isset($_POST['submit'])) {
                    $question = $_POST['question'];
                    $answer = html_entity_decode($_POST['editor1']);
                   
                    if($question!="" && $answer!="" ) {
                        $create_query = "INSERT INTO tbl_faqs (question,answer) VALUES('$question','$answer')";
                        $create_result = mysqli_query($conn,$create_query);
                        if($create_result) 
                        { 
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>FAQs Created!</strong> successfully.
                            </div>
                                <!-- <script>alert ("Data inserted Successfully")</script> ; -->
                                            
                                <meta http-equiv="refresh" content="0; URL=managefaqs.php?msg=success" />
                                        
                                    
                                        <?php
                                        }
                                        else 
                                        {
                                        ?>
                                                        
                                            <strong>Faqs  couldn't be created successfully.</strong> 
                                                               
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
                    <h6 class="m-0 font-weight-bold text-primary">Create FAQ</h6>
            </div>
            <div class="card-body">
              <!-- form start -->
              <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="question">Question <span style="color:red;">*</span></label>
                        <input type="text"class="form-control" name="question" id="" placeholder="" required>          
                    </div>

                    <div class="form-group">
                        <label for="">Answer <span style="color:red;">*</span></label>
                        <textarea class="form-control" id="editor1" name="editor1"  required></textarea>
                    </div>
     
                    <button type="submit" id = "submit" class="btn btn-primary"  value="submit" name="submit">Submit</button>
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

<script type ="text/javascript">

        CKEDITOR.replace( 'editor1' );
                                </script>
<style>
.ck-editor__editable_inline {
    min-height: 400px;
}

</style>
