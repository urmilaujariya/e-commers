<?php
    include_once ('header.php');
    include_once ('admin/config.php');
    
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
        <div class="col-md-8">
          <div class="card shadow-0 border rounded-3">
            <div class="card-body">
              <?php 
          if(isset($_GET['mcid'])){
              $mcid=$_GET['mcid'];
              $sql=mysqli_query($conn,"SELECT * FROM products WHERE id='$mcid'");
              $res=mysqli_num_rows($sql);
                  if($res>0){
                  while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){   
          ?>
              <div class="row justifiy-content-start">
                <div class="col-md-4 col-lg-3 col-xl-3 mb-lg-0">
                  <img src="admin/<?php echo $row['productImage']; ?>" class="w-75 h-75" />
                </div>
                <div class="col-md-4 col-lg-6 col-xl-6">
                  <h5>
                    <?php echo $row['productName']; ?>
                  </h5>
                  <div class="d-flex flex-row align-items-center mb-1">
                    <h4 class="mb-1 me-1">&#8360;
                      <?php echo $row['productPrice']; ?>
                    </h4>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-1">
                    <input type="number" style="width:50px" value="1">
                  </div>
                  <div class="d-flex flex-row align-items-center mb-1">
                    <?php
                    $avaible =$row['productAvailability'];
                    if($avaible == 'In Stock'){
                        ?>
                    <h6 class="text-success mt-3">
                      <?php echo $row['productAvailability']; ?>
                    </h6>
                    <?php
                    }
                    else{
                      ?>
                    <h6 class="text-danger">
                      <?php echo $row['productAvailability']; ?>
                    </h6>
                    <?php
                    }
                  ?>
                  </div>
                  <div class="mb-2 text-muted small">
                    <span>Delivery Charges</span>
                    <span class="text-primary"> &#8360;
                      <?php echo $row['shippingCharge']; ?>
                    </span>
                  </div>
                </div>
              </div>
              <?php }}} ?>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow-0 border rounded-3">
            <div class="card-body">
              <h5 class="border-bottom ">Price details</h5>
              <p class="mb-2">Price <span><?php ?></span></p>
              <p class="mb-2">Discount</p>
              <p class="mb-2">Delivery Charges</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</body>
</html>