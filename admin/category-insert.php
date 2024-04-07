<?php
    include_once 'config.php';
     date_default_timezone_set('Asia/Kolkata'); // change according timezone
     $currentTime = date('d-m-Y h:i:s A', time());
    //  if(!empty($_POST["data"])) {
         $category = $_POST['categoryV'];
         $description = $_POST['descriptionV'];
         $sql = mysqli_query($conn, "insert into category(categoryName,categoryDescription,creationDate) values('$category','$description','$currentTime')");
         echo "Category Add";
    //  }
?>