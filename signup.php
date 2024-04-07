<?php 
    include_once ('admin/config.php');
    include_once ('header.php');
    if(isset($_POST['signup'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirmpassword'];
        $mobile=$_POST['mobile'];
        $sql=mysqli_query($conn,"insert into users (name,email,password,contactno) values('$name','$email','$password','$mobile')");
        if($sql = true){
            header("location:login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
</head>
<body class="collection">
    <section class="container">
        <h1 class="text-center mb-5" >Sign Up</h1>
        <div class="row justify-content-center">
            <div class="col-md-4 account-info d-none">
                <ul class="nav flex-column u-info mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">User</a>
                    </li>
                </ul>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manage Address</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Wishlist</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6" id="signup">
                <form method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword"  placeholder="Confirm Password">
                        <label for="confirmpassword">Confirm Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                        <label for="mobile">Mobile Number </label>
                    </div>
                        <input type="submit" name="signup" value="Signup" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-6 d-none" id="login">
            <h1 class="text-center mb-5" >Login</h1>
                <form method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>      
                        <input type="submit" name="login" value="Login" class="btn btn-primary">
                </form>
            </div>
        </div>
    </section>
</body>
</html>