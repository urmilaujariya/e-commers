<?php
    session_start();
    include_once 'admin/config.php';
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $res=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' and password='$password'");
        $num=mysqli_fetch_array($res,MYSQLI_ASSOC);
        print_r($num);
        if($num>0)
        {
            $_SESSION['username']=$_POST['name'];
            $_SESSION['userlogin']=$_POST['email'];
            $_SESSION['userid']=$num['id'];
            header("location:profile.php");
        }
        else{?>

        <script>
            alert("Invalid username or password");
        </script>
        <?php
        }
    }

?>