<?php
    session_start();
    include_once ('header.php');
    include_once ('admin/config.php');
    if(isset($_POST['add_to_cart'])){
       
        if(isset($_SESSION['cart'])){
        }
        else{
            $session_array=array(
                'id'=> $_GET['id'],
                'productName'=> $_POST['productName'],
                'productPrice'=> $_POST['productPrice'],
                'productQuantity'=> $_POST['productQuantity']
            );
            $_SESSION['cart'][]=$session_array;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<section class="collection">
    <div class="container-fluid py-5">
      <div class="row w-75">
        <div class="col-md-4">
          <div class="card shadow-0 border rounded-3">
            <div class="card-body">
              <h5 class="border-bottom ">Price details</h5>
              <p class="mb-2">Price <span><?php ?></span></p>
              <p class="mb-2">Discount</p>
              <p class="mb-2">Delivery Charges</p>
              <?php
                var_dump($_SESSION['cart']);  
              ?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</body>
</html>