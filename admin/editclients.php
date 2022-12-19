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

// When create a task form is submitted, 
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $show_query = "select * from tbl_clients where id = $id";
    $show_result = mysqli_query($conn,$show_query);
    $row = $show_result->fetch_assoc();

  $logo = $row['logo'];
  $client_links = $row['client_links'];
}
 ?>


                 
            <?php
                if(isset($_POST['update'])) {
                    $logo = $_POST['file_link'];
                    $client_links = $_POST['client_links'];
                    

                    if($logo!="" && $client_links!="") {
                        $create_query = "UPDATE tbl_clients SET logo = '$logo',client_links = '$client_links' where id = '$id'";
                        $create_result = mysqli_query($conn,$create_query);
                        if($create_result) 
                        {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Services Created!</strong> successfully.
                                    
                            </div>
                                            
                                <meta http-equiv="refresh" content="0; URL=manageclients.php?msg=success" />
                                        
                                    
                                        <?php
                                        }
                                        else 
                                        {
                                        ?>
                                                        
                                            <strong>Clients couldn't be created successfully.</strong> 
                                                        
                                                        
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
                    <h6 class="m-0 font-weight-bold text-primary">Create Services</h6>
            </div>
            <div class="card-body">
              <!-- form start -->
              <form action="#" method="POST" enctype="multipart/form-data">
                    
                    </div>
                    <div class="form-group">
                        <label for="">Client Links <span style="color:red;">*</span></label>
                        <input type="text"class="form-control" name="client_links" id="" value ="<?php echo $client_links; ?>" placeholder=""> 
                    </div>
                    <div class="form-group mb-3">                               
                        <label for="">Browse Logo <span style="color:red;">*</span></label>
                     </div>

                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
  Browse
</button>

<button class='btn btn-Success'>
<?php echo "<a href=addfile.php  class = 'text-white' role='button'>Upload</a>"; ?>
 </button>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="myModalLabel">Choose Image</h1>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <style>
        [ type=radio]:checked+img{
          outline: 2px solid blue;
        }
       </style>

<?php
    $select_query = "SELECT * FROM tbl_files ORDER BY created_at DESC";
    $select_result = mysqli_query($conn,$select_query);
    $count = 0;
        while($data = mysqli_fetch_array($select_result))
          {
            $count += 1; //$count = $count + 1;
 ?>  
        <label>
                <input type="radio" id="selectimage" name="img" value="<?php echo $data['file_link'] ?>" style="opacity: 0;" /> 
                <img src="uploads/<?php echo $data['file_link'] ?>" alt="" style="display:block; object-fit: contain;" width="100%" height="120px">
        </label>
             <?php   }  ?>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="firstFunction()" data-bs-dismiss="modal">Select</button>
      </div>
    </div>
  </div>
</div>

                    <div class="form-group mb-3">                               
                        <label for="">Logo Link <span style="color:red;">*</span></label>
                        <input type="text" id ="imagebox" class="form-control" name="file_link" value ="<?php echo $logo; ?>" placeholder="">
                    </div>
                    
                    <button type="update" id = "update" class="btn btn-primary" name="update">UPDATE</button>
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

<Script type ="text/javascript">
	// copy link of an image
  function firstFunction() {
			document.getElementById('imagebox').value = document.querySelector('input[name=img]:checked').value;
		}

   
  </Script>


