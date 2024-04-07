<?php
    include_once('header.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<section class="collection">
  <div class="container">   
  <div class="row">
    <h2>Categorys</h2>
    <?php
        include_once('admin/config.php');
          $sql=mysqli_query($conn,"SELECT * FROM category");
          $res=mysqli_num_rows($sql);
          if($res>0){
          while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
    ?>
      <div class="col-4 w-25 mb-5">
        <div class="card"  >
            <div class="card">
                <div class="card-body d-flex justify-content-center">
                <h6><?php echo $row['categoryName'];?></h6>
                </div>
            </div>

        </div>
    </div>
<?php }
// }
}
?>
</div>
    <!-- All Product -->
    <div class="row">
        <div class="col-12 d-flex justify-content-between mb-5">
            <h2>All Products </h2>
            <select class="form-select form-select-lg w-25" id="filter" name="sort_filter">
                <option value='desc'>Price Hight to Low</option>
                <option value='asc'>Price Low to Hight</option>
                <option value='a-z' <?php if(isset($_GET['sort_filter']) && $_GET['sort_filter'] == "a-z"){ echo "selected";}?> >A-Z</option>
                <option value='z-a' <?php if(isset($_GET['sort_filter']) && $_GET['sort_filter'] == "z-a"){ echo "selected";}?>>Z-A</option>
            </select>
        </div>
    </div>

    <div class="row" id="filterrecorde">
    <!-- <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="card">
            <div class="card-body">
            
            </div>
        </div>
    </div> -->
        <?php
            include_once('admin/config.php');
            // if(isset($_GET['cid'])){ // if click menu id
    
            //   $cid=$_GET['cid'];
            $sql=mysqli_query($conn,"SELECT * FROM products");
            $res=mysqli_num_rows($sql);
            if($res>0){
                while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                        ?>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card mb-5" >
                        <div class="d-flex justify-content-between">
                            <div class="card-body">
                            <div class="bg-image hover-zoom ripple rounded ripple-surface d-flex justify-content-center">
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
                                <span class="text-danger"><s>&#8360; 0</s></span>
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
        ?>
    </div>
</div>
</section>
<script>
    $('#filter').change(function(){
        $filterdata=$("#filter").val();

        $.ajax({
            url:'filterdata.php',
            method:"POST",
            data:{'filter':$filterdata},
            success:function(response){
                $("#filterrecorde").html(response);
            }
        });
    });
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
</body>
</html>