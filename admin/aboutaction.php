
<?php
  
  // Connect to database 
  require('../Connection/config.php');

  // Check if id is set or not, if true,
  // toggle else simply go back to the page
  if (isset($_GET['status'])){

      // Store the value from get to 
      // a local variable "course_id"
      $about_id=$_GET['id'];
      if($status=="1"){
        $sql="UPDATE tbl_abouts SET 
        status=0 WHERE id='$about_id'";

    // Execute the query
    

      } else{
        $sql="UPDATE tbl_abouts SET 
        status=1 WHERE id='$about_id'";
      }
      mysqli_query($conn,$sql);
      // SQL query that sets the status to
      // 0 to indicate deactivation.
     
  }

  // Go back to course-page.php
  header('location: managesection.php');
?>