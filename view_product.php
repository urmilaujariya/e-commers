<?php 
    session_start();
    include_once('admin/config.php');
    include_once('header.php');    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="collection"> 
<div class="container">   
<?php
            if(isset($_GET['pid'])){
                $pid=$_GET['pid'];
                $sql=mysqli_query($conn,"SELECT * FROM products WHERE id='$pid'");
                $res=mysqli_num_rows($sql);
                if($res>0){
                while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
        ?>
    <div class="row products">
    <!-- product info -->
    
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <form method="POST" >
            <div class="card">
                <img src="admin/<?php echo $row['productImage']; ?>" alt="" class="img-fluid" style="height:500px;">
            </div>
            <div class="d-flex flex-row mt-5">
                <!-- <div class="text-danger mb-1 me-2 float-start">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                </div> -->
                <!-- <span>310</span> -->
                <h3 class="mx-5">&#8360; <?php echo $row['productPrice'];?></h3>
                <input type="number" value="1" name="productQuantity" style="width:100px; height:40px;" class="form-control">
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 size product-info">
                <h5> <?php echo $row['productName'];?></h5>
                <p> <?php echo $row['productCompany'];?></p>
                <?php echo $row['productDescription'];?>  
                
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <input type="hidden" name="productName" value="<?php $row['productName']; ?>">
        <input type="hidden" name="productPrice" value="<?php $row['productPrice']; ?>">
                    
            <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
            <button class="btn btn-primary shadow-0" type="submit" name="add_to_cart">Add to cart</button>
            <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a>
            </div>
        <!-- <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            
            
              <ul class="size_ul">
                <li>Size</li>
                <li><a href="#">XS</a></li>
                <li><a href="#">S</a></li>
                <li><a href="#">M</a></li>
                <li><a href="#">L</a></li>
                <li><a href="#">XL</a></li>
                <li><a href="#">XXL</a></li>
              </ul>
        </div> -->
        </form>
    </div>
    <?php }}}?>   
</div>
</section>
</body>
</html>