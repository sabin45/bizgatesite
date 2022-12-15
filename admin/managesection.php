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
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Toggle</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Action</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Toggle</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $select_query = "SELECT * FROM tbl_heading ORDER BY created_at DESC";
                                    $select_result = mysqli_query($conn,$select_query);
                                    $count = 0;
                                    while($data = mysqli_fetch_array($select_result))
                                    {
                                        $count += 1; //$count = $count + 1;
                                        ?>

                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>
                                                <a name="" id="" class="btn btn-primary btn-sm" href="editsection.php?id=<?php echo $data['id']; ?>" role="button">Edit</a>
                                                <a name="" id="" class="btn btn-danger btn-sm" href="process/deletesection.php?id=<?php echo $data['id']; ?>" role="button">Delete</a>
                                            </td>
                                            <td><?php echo $data['title']; ?></td>
                                            <td><?php echo $data['description']; ?></td>
                                            
                                            <td><button type="button" name="" id="" class="btn btn-primary btn-sm btn-lg btn-block">
                                                <?php if($data['status']=="1") 
                                                        echo "Active";
                                                    else 
                                                        echo "Inactive"; ?></button></td>
                                            <td><?php 
                                                if($data['status']=="1") {
                                                    if (isset($_GET['id'])){
                                                        $about_id=$_GET['id'];
                                                        $sql="UPDATE tbl_heading SET 
                                                             status=1 WHERE id='$about_id'";
                                                  
                                                        
                                                        mysqli_query($conn,$sql);
                                                        echo "<a href=# class='btn-danger'>Deactivate</a>";
                                                    }

                                                }else 
                                                if (isset($_GET['id'])){
                                                    $about_id=$_GET['id'];
                                       
                                                    $sql="UPDATE tbl_heading SET 
                                                        status=0 WHERE id='$about_id'";
                                              
                                                    // Execute the query
                                                    mysqli_query($conn,$sql);
                                                }
                                                echo "<a href=# class='btn-success'>Activate</a>";
                                                ?>
                                            </td>
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