<?php
    include_once('header.php');
    include_once('admin/config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<section class="collection">
  <div class="container">   
    <div class="row">
    <div class="col-md- col-lg-4 mb-4 mb-lg-0">
      <div class="card">
        <div class="card-body">
          <h3>Brand</h3>
        <?php
        if(isset($_GET['cid'])){ // if click menu id
          $cid=$_GET['cid'];
          $sql=mysqli_query($conn,"select category.*,products.* FROM products INNER JOIN category ON category.id= products.category WHERE category.id='$cid'");
          $res=mysqli_num_rows($sql);
          if($res>0){
          while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                $brand=$row['productCompany'];
                ?>
                  <ul>
                    <li> <?php echo $brand ?></li>
                  </ul>
                <?php
          }
        }
      }
          ?>
        </div>
      </div>
    </div> 
    
    <?php
        
        if(isset($_GET['cid'])){ // if click menu id
          $cid=$_GET['cid'];
          $sql=mysqli_query($conn,"select category.*,products.* FROM products INNER JOIN category ON category.id= products.category WHERE category.id='$cid'");
          $res=mysqli_num_rows($sql);
          if($res>0){
          while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
    ?>
      <div class="col-md-12 col-lg-4 mb-4 mb-lg-0 mb-5">
        <div class="card">
          <div class="d-flex justify-content-between">
            <div class="card-body">
            <div class="bg-image hover-zoom ripple rounded ripple-surface d-flex justify-content-center mb-3">
                  <img src="admin/<?php echo $row['productImage'];?>" class="img-fluid" style="width: 75%;height:200px;"/>
                  <a href="#!">
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
                <h6><?php echo $row['productCompany'];?></h6>
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1">&#8360; <?php echo $row['productPrice']; ?></h4>
                </div>
                <h6 class="text-success">Free shipping</h6>
                <div class="d-flex flex-column mt-4">
                  <button class="btn btn-primary btn-sm" type="button"><a href="view_product.php?pid=<?php echo $row['id']; ?>" style="color:white;"> Details</a></button>
                  <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                    Add to wishlist
                  </button>
                </div>
            </div>            
        </div>
      </div>
</div>
<?php }
}
}
?>
</div>
</div>
</section>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
</body>
</html>