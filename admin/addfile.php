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
                $filename = $_POST['filename'];

                $dataFile = $_FILES['dataFile']['name'];
                //$dataFile consit info like hello.jpg
                $filesize = $_FILES['dataFile']['size'];
                $explode_values = explode('.', $dataFile);
                //$explode_values become array having data in the form $explode_values = ['hello','jpg']
                $name = $explode_values[0];
                $fname = str_replace(' ','', $name);
                $finalname = strtolower($fname.time());
                $ext = $explode_values[1];
                $finalfile = $finalname.'.'.$ext;

                if($filename!="")
                {
                  if($filesize<2000000)
                  {
                    if($ext=='jpg' || $ext == 'png' || $ext == 'pdf' || $ext == 'jpeg')
                    {
                        if(move_uploaded_file($_FILES['dataFile']['tmp_name'],"uploads/".$finalfile))
                        {
                          $query = "INSERT INTO tbl_files (name,file_link,ext) VALUES('$filename','$finalfile','$ext')";
                          $result = mysqli_query($conn,$query);
                          if($result)
                          {
                            ?>
                                 <meta http-equiv="refresh" content="0; URL=managefile.php?msg=csuccess" />
                                   <?php
                            echo alert("File is uploaded successfully.") ;
                          }
                          else 
                          {
                            echo alert("File couldn't uploaded successfully.") ;
                          }
                        }
                    }
                    else 
                    {
                      echo "File Extension doesn't match. We only accept jpg, png, pdf.";
                    }

                  }
                  else
                  {
                    echo alert("File size exceeded.");
                  }
                }
                else 
                {
                  echo "File name is necessary.";
                }
              }
            ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Upload File</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="#" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">File Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="filename" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">File</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="dataFile" placeholder="">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <?php
  require('inc/footer.php'); 
  ?>