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
                    <div class="card shadow mb-4">
                  
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Manage Tasks</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Preview</th>
                                            <th>File</th>
                                            <th>Extension</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Preview</th>
                                            <th>File</th>
                                            <th>Extension</th>
                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $select_query = "SELECT * FROM tbl_files ORDER BY created_at DESC";
                                    $select_result = mysqli_query($conn,$select_query);
                                    $count = 0;
                                    while($data = mysqli_fetch_array($select_result))
                                    {
                                        $count += 1; //$count = $count + 1;
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>
                                                <a name="" id="" class="btn btn-primary btn-sm" href="editfile.php?id=<?php echo $data['id']; ?>" role="button">Edit</a>
                                                <a name="" id="" class="btn btn-danger btn-sm" href="process/deletefile.php?id=<?php echo $data['id']; ?>" role="button">Delete</a>
                                            </td>
                                            <td><?php echo $data['name']; ?></td>
                                            <td><img src="../admin/uploads/<?php echo $data['file_link']; ?>" alt="" style="display:block; object-fit: contain;" width="100%" height="120px"></td>
                                            <td><?php echo $data['file_link']; ?></td>
                                            <td><?php echo $data['ext']; ?></td>
                                            
                                        </tr>
                                        <?php      
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php require('inc/footer.php'); ?>