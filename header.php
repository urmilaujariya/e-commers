<?php
  include_once('admin/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Portal</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet"/>
</head>
<nav class="navbar navbar-expand-lg fixed-top" >
  <div class="container">
    <a class="navbar-brand" href="#"><h1>Shopping Portal</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse m-nav" id="navbarCollapse">
        <div class="navbar-nav ms-auto">
            <ul class="navbar-nav menu-ul">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="all-product.php">Product</a></li>
                <li class="dropdown menu-item">
                <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                    <ul class="dropdown-menu">
                        <li>
                        <?php 
                          $sql=mysqli_query($conn,"select id,categoryName  from category");
                          while($row=mysqli_fetch_array($sql))
                        {?>
                          <a class="dropdown-item" href="category.php?cid=<?php echo $row['id'];?>"><?php echo $row['categoryName'] ?></a>
                        <?php } ?>
                        </li>
                      </ul>
                </li>
                <!-- <li class="nav-item"><a class="nav-link" href="signup.php">Sign up</a></li> -->
                <li class="nav-item"><a href="signup.php" class="nav-link"><i class="icon fa fa-user"></i></a></li>
					      <li class="nav-item"><a href="#" class="nav-link"><i class="icon fa fa-heart"></i></a></li>
					      <li class="nav-item"><a href="my_card.php" class="nav-link"><i class="icon fa fa-shopping-cart">
                  <?php
                    
                  ?>
                </i></a></li>
                <li class="nav-item"><a href="login.php" class="nav-link"><i class="icon fa fa-sign-in"></i>Login</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link"><i class="icon fa fa-sign-in"></i>Logout</a></li>
            </ul>
        </div>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

