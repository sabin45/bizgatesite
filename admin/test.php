<?php require('inc/toppart.php'); ?>

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
        $description = mysql_real_escape_string($_POST['description']);
        $img_link = $_POST['img_link'];
  

        if($title!="" && $description!="" && $img_link!="") 
  {
  //Create query is also called INSERT INTO QUERY
  $create_query = "INSERT INTO tbl_abouts (title,description,img_link) VALUES('$title','$description','$img_link')";
  echo $create_query;
  $create_result = mysqli_query($conn,$create_query);
  if($create_result) 
  {
    ?>
      <meta http-equiv="refresh" content="0; URL=manageabout.php?msg=csuccess" />
    <?php
  }
  else 
  {
    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>About page couldn't be created successfully.</strong> 
                        </div>
                        
                        <script>
                          $(".alert").alert();
                        </script>
    <?php
  }
}
else 
{
  ?>
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>All fields are necessary.</strong> 
                        </div>
                        
                        <script>
                          $(".alert").alert();
                        </script>
  <?php
}
  }

?>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Create a user</h6>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST" enctype="multipart/form-data">
                               
                                <div class="form-group">   
                                  <label for="">Title <span style="color:red;">*</span></label>
                                  <input type="text"class="form-control" name="title" id="" aria-describedby="helpId" placeholder="" required>
                                </div>
                                
                                <div class="form-group">
                                  <label for="">Description <span style="color:red;">*</span></label>
                                  <textarea class="form-control" name="description" id="editor" required></textarea>
                                </div>
                               
                                <div class="form-group mb-3">                               
                                  <label for="">Browse Image <span style="color:red;">*</span></label>
                                </div>


          <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
  Browse
</button>
 
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="#exampleModalLabel">Images</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="row">

              <style>
                [type=radio]:checked+img{
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
     
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-primary" onclick="firstFunction()" data-dismiss="modal">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  
  
  </div>
                                <div class="form-group mb-3">                               
                                  <label for="">Image Link <span style="color:red;">*</span></label>
                                  <input type="text" id ="imagebox" class="form-control" name="file_link" placeholder="" disabled>
                                </div>
                                
                                
                                <button type="submit" class="btn btn-primary" value="submit" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php require('inc/footer.php'); ?>
<script type="text/javascript">

	// copy link of an image
		function firstFunction() {
			document.getElementById('imagebox').value = document.querySelector('input[name=img]:checked').value;
		}
	
	
	</script>
