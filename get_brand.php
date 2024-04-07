<?php
    include_once('admin/config.php');
    include_once ('header.php');

     if(isset($_GET['bid'])){ 
        $cid=$_GET['bid'];
        $sql=mysqli_query($conn,"SELECT * FROM products where id='$cid'");
        $res=mysqli_num_rows($sql);
        if($res>0){
        while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
            ?>
<section class="collection">
    <div class="container">   
        <div class="row">
            
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
?>