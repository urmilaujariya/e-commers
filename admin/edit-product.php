<?php
include_once 'header.php';
// include_once 'sidemenu.php';
include_once 'config.php';
if (strlen($_SESSION['id']) == 0) {
    header('location:index.php');
}
else{
    date_default_timezone_set('Asia/Kolkata');// change according timezone
    $currentTime = date( 'd-m-Y h:i:s A', time () );
    
    // $categorys=mysqli_query($conn,"SELECT *  FROM category;");
    if(isset($_GET['id'])){
        $userid=$_GET['id'];
        $sql_selc=mysqli_query($conn,"SELECT * FROM products where id='$userid'");
        $row=mysqli_fetch_assoc($sql_selc);
        $category=$row['category'];
        $subcategory=$row['subcategory'];
        $productName=$row['productName'];
        $productCompany=$row['productCompany'];
        $productPrice=$row['productPrice'];
        $productPriceBeforeDiscount=$row['productPriceBeforeDiscount'];
        $producSellPriced=$row['productPriceBeforeDiscount'];
        $productDescription=$row['productDescription'];
        $shippingCharge=$row['shippingCharge'];
        $productAvailability=$row['productAvailability'];
        $productImage=$row['productImage'];
        if(isset($_POST['update'])){  
            $userid=$_GET['id'];
            $category=$_POST['category'];
            $subcategory=$_POST['subcategory'];
            $productName=$_POST['productName'];
            $productCompany=$_POST['productCompany'];
            $productPrice=$_POST['productPrice'];
            $productPriceBeforeDiscount=$_POST['producSellPriced'];
            $productDescription=$_POST['productDescription'];
            $shippingCharge=$_POST['productShiCharg'];
            $productAvailability=$_POST['producStock'];
            // $image1=$_POST['image1'];
            $filename = $_FILES['image1']['name'];
            $tempname = $_FILES['image1']['tmp_name'];
            $folder = "images/" . $filename;
            move_uploaded_file($tempname, $folder);
            // $q="UPDATE products SET categoryid='$category',subcategory='$subcategory',productName='$productName',productCompany='$productCompany',productPrice='$productPrice',productPriceBeforeDiscount='$productPriceBeforeDiscount',productDescription='$productDescription',shippingCharge='$shippingCharge',productAvailability='$productAvailability',productImage='$folder',updationDate='$currentTime' WHERE id='$userid'";
            $q="UPDATE products SET category='$category',subcategory='$subcategory',productName='$productName',productCompany='$productCompany',productPrice='$productPrice',productPriceBeforeDiscount='$productPriceBeforeDiscount',productDescription='$productDescription',shippingCharge='$shippingCharge',productAvailability='$productAvailability',productImage='$folder',updationDate='$currentTime' WHERE id='$userid'";
            $sql_up=mysqli_query($conn,$q);
            if($sql_up=true){
            ?>
                <script>
                window.location.href='manage-product.php';
                </script>
            <?php
        }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
  <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet'
        type='text/css' />
  <script>
      function getSubcat(val) {
          $.ajax({
            type: "POST",
            url: "get_subcat.php",
            data:'cat_id='+val,
            success: function(data){
              $("#subcategory").html(data);
            }
          });
      }
</script>
</head>
<body>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Product </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Product Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
                <div class="form-group row">
                  <label for="category" class="col-sm-2 col-form-label">Category</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="category" id="category" onChange="getSubcat(this.value);">
                    <option selected="selected" value="none">Category </option>
                  <?php
$sql_category = mysqli_query($conn, "SELECT * FROM category");
while ($row = mysqli_fetch_array($sql_category, MYSQLI_ASSOC)) {
    ?>

                       <option  value="<?php echo $row['id']; ?>" required> <?php echo $row['categoryName']; ?></option>
                      <?php
}
?>

                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="subcategory" class="col-sm-2 col-form-label">Sub Category</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" required name="subcategory" id="subcategory">
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="productName" name="productName"
                      placeholder="Product Name" required value="<?php echo $productName; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="productCompany" class="col-sm-2 col-form-label">Product Company</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="productCompany" name="productCompany"
                      placeholder="Product Company" required value="<?php echo $productCompany; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="productPrice" class="col-sm-2 col-form-label">Product Price Before Discount</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="productPrice" name="productPrice"
                      placeholder="Product Price" required value="<?php echo $productPrice; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="producSellPriced" class="col-sm-2 col-form-label">Product Price after Discount(Selling
                    Price)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="producSellPriced" name="producSellPriced"
                      placeholder="Product Selling Price" required value="<?php echo $producSellPriced; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="productDescription" class="col-sm-2 col-form-label">Product Description</label>
                  <div class="col-sm-10">
                  <textarea id="froala-editor" class="form-control" name="productDescription"
                      placeholder="Product Descripation" required><?php echo $productDescription; ?></textarea>
                  <!-- <textarea id="froala-editor" class="form-control" name="productDescripation"
                      placeholder="Product Descripation" required></textarea> -->
                    <!-- <input type="text" class="form-control" id="productDescripation" name="productDescripation"
                      placeholder="Product Descripation" required> -->
                  </div>

                </div>
                <div class="form-group row">
                  <label for="productShiCharg" class="col-sm-2 col-form-label">Product Shipping Charge</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="productShiCharg" name="productShiCharg"
                      placeholder="Product Shipping Price" required value="<?php echo $shippingCharge; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="subcategory" class="col-sm-2 col-form-label">Product Availability</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" required name="producStock" id="producStock" <?php echo $productAvailability;;?>>
                      <option selected="selected">Select</option>
                      <option>In Stock</option>
                      <option>Out of Stock</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="productImg" class="col-sm-2 col-form-label">Product Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="productImg" name="image1"
                      placeholder="Select Product Image" required value="<?php echo $productImage; ?>">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <input type="submit" name="update" id="update" value="Update" class="btn btn-info">
                <input type="reset" class="btn btn-default float-right" value="Cancel">
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
          <!-- /.card -->
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
    <script>             var editor = new FroalaEditor('#froala-editor');        </script>
  <?php
include_once "footer.php";
?>
</body>

</html>