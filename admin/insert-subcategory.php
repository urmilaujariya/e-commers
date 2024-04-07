<?php
    include_once ('config.php');
    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());
     $category=$_POST['categoryV'];
     $subcategoryname=$_POST['subcategorynameV'];
     $sql_in=mysqli_query($conn,"INSERT INTO sub_category (categoryid,subcategoryName,creationDate) values ('$category','$subcategoryname','$currentTime')");
     echo "Sub Category Add";
?>