
<?php
  
  require('../Connection/config.php');
  
  if (isset($_GET['id'])){

      $slider_id=$_GET['id'];
      $sql="UPDATE tbl_slioders SET 
           status=1 WHERE id='$slider_id'";

      mysqli_query($conn,$sql);
  }

  // Go back to course-page.php
  header('location: manageslider.php');
?>