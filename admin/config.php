<?php
    $servername="localhost";
    $username="root";
    $password="";
    $db="e-commerce";
    $conn =mysqli_connect($servername,$username,$password,$db);
    if($conn!=true){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else{
        // echo "ok";
    }
?>