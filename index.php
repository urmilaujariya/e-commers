<?php
    include_once 'admin/config.php';
    include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<section class="collection">
  <div class="container py-5">
  
    <!-- new arribals product -->
    <div class="row mt-4">
        <h1 class="mb-5">New Arrivals</h1>
      
        <?php
        
            $sql=mysqli_query($conn,"SELECT * FROM products ORDER BY id desc limit 3");
            $res=mysqli_num_rows($sql);
            if($res>0){
                while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
        ?>
            <div class="col-md-12 col-lg-4 mb-4 mb-lg-0" >
            <div class="card">
            <!-- <div class="d-flex justify-content-between p-3">
                <p class="lead mb-0">Today's Combo Offer</p>
                <div
                class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                style="width: 35px; height: 35px;">
                <p class="text-white mb-0 small">x4</p>
                </div>
            </div> -->
            <div class="d-flex justify-content-center align-item-center mt-3"> <img src="admin/<?php echo $row['productImage'];?>" class="img-fluid card-img-top " style="width:100px; height:100px;text-align: center;"/>
            </div>
            
            <div class="card-body">
                <div class="d-flex justify-content-between">
                <h6 class="mb-0"><?php echo $row['productName']; ?></h6>
                </div>
                <div class="d-flex justify-content-between mb-3 mt-4">
                <p class="small"><a href="#!" class="text-muted"><?php echo $row['productCompany']; ?></a></p>
                <h5 class="text-dark mb-0">&#8360; <?php echo $row['productPrice']; ?></h5>
                </div>
                <div class="d-flex justify-content-between mb-2">
                <p class="text-muted mb-0">
                <?php
                    $avaible =$row['productAvailability'];
                    if($avaible == 'In Stock'){
                        ?>
                    <h6 class="text-success">
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
                </p>
                
                <div class="ms-auto text-warning">
                <button class="btn btn-primary btn-sm" type="button"><a href="view_product.php?pid=<?php echo $row['id']; ?>" style="color:white;"> Details</a></button>
                </div>
            </div>
                
            </div>
        </div>
    </div>
        <?php }}?>
    </div>
  </div>
</section>
</body>
</html>