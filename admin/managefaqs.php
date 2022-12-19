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
                   $id =$_GET['id'];
                    $status = $_GET['status'];
             
                    $sql="UPDATE tbl_faqs SET 
                        status= '$status' WHERE id= '$id'";

                    mysqli_query($conn,$sql);
                
                //header('location:managesection.php');
                // Go back to course-page.php
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
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Action</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $select_query = "SELECT * FROM tbl_faqs ORDER BY created_at DESC";
                                    $select_result = mysqli_query($conn,$select_query);
                                    $count = 0;
                                    while($data = mysqli_fetch_array($select_result))
                                    {
                                        $count += 1; //$count = $count + 1;
                                        ?>

                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>
                                                <a name="" id="" class="btn btn-primary btn-sm" href="editfaqs.php?id=<?php echo $data['id']; ?>" role="button">Edit</a>
                                                <a name="" id="" class="btn btn-danger btn-sm" href="process/deletefaqs.php?id=<?php echo $data['id']; ?>" role="button">Delete</a>
                                            </td>
                                            <td><?php echo $data['question']; ?></td>
                                            <td><?php echo $data['answer']; ?></td>
                                            
                                            <td><button type="button" name="" id="" class="btn btn-sm btn-lg btn-block">
                                                <?php if($data['status']=="1") {
                                                   // echo "<a href=managesection.php?id=".$data['id']." &status=0 class='bg-Success' >Active</a>";
                                                    echo "<a href=managefaqs.php?id=".$data['id']."&status=0 class='bg-success btn-block'>Active</a>";

                                                }
                                                       // echo "Enable";
                                                    elseif($data['status']=="0"){

                                                        echo "<a href=managefaqs.php?id=".$data['id']."&status=1 class='bg-Danger btn-block' >Inactive</a>";
                                                        
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

