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

                <?php 
                if (isset($_GET['id'])){
                   $section_id =$_GET['id'];
                    $status = $_GET['status'];
             
                    $sql="UPDATE tbl_whychooseus SET 
                        status= '$status' WHERE id= '$section_id'";

                    mysqli_query($conn,$sql);
                }
                
                
              ?>

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
                                            <th>FIle</th>
                                            <th>Icon Link</th>
                                            <th>Feature Title</th>
                                            <th>Feature Details</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>S.N.</th>
                                            <th>Action</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>FIle</th>
                                            <th>Icon Link</th>
                                            <th>Feature Title</th>
                                            <th>Feature Details</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $select_query = "SELECT * FROM tbl_whychooseus ORDER BY created_at DESC";
                                    $select_result = mysqli_query($conn,$select_query);
                                    $count = 0;
                                    while($data = mysqli_fetch_array($select_result))
                                    {
                                        $count += 1; //$count = $count + 1;
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>
                                                <a name="" id="" class="btn btn-primary btn-sm" href="editwhychooseus.php?id=<?php echo $data['id']; ?>" role="button">Edit</a>
                                                <a name="" id="" class="btn btn-danger btn-sm" href="process/deletewhychooseus.php?id=<?php echo $data['id']; ?>" role="button">Delete</a>
                                            </td>
                                            <td><?php echo $data['title']?></td>
                                            <td><?php echo $data['description']; ?></td>
                                            <td><?php echo $data['img_link']; ?></td>
                                            <td><?php echo $data['icon_link']?></td>
                                            <td><?php echo $data['feature_title']; ?></td>
                                            <td><?php echo $data['feature_desc']; ?></td>
                                            <td><button type="button" name="" id="" class="btn btn-sm btn-lg btn-block">
                                                <?php if($data['status']=="1") {
                                                    echo "<a href=managewhychooseus.php?id=".$data['id']."&status=0 class='bg-success btn-block'>Active</a>";
                                                }
                                                    elseif($data['status']=="0"){

                                                        echo "<a href=managewhychooseus.php?id=".$data['id']."&status=1 class='bg-Danger btn-block' >Inactive</a>";
                                                        
                                                    }
                                                     ?></button>
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