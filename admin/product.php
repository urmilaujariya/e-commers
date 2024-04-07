<?php
include_once 'header.php';
include_once 'sidemenu.php';
include_once 'config.php';
if (strlen($_SESSION['id']) == 0) {
    header('location:index.php');
}
else{
  if(isset($_POST['insert'])){
    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $productName = $_POST['productName'];
    $productCompany = $_POST['productCompany'];
    $producPriced = $_POST['producPriced'];
    $producSellPriced = $_POST['producSellPriced'];
    $productDescripation = $_POST['productDescripation'];
    $productShiCharg = $_POST['productShiCharg'];
    $producStock = $_POST['producStock'];
    
        $filename = $_FILES['productImg']['name'];
        $tempname = $_FILES['productImg']['tmp_name'];
        $folder = "images/" . $filename;
        move_uploaded_file($tempname, $folder);
    $query = "INSERT INTO products (category,subcategory,productName,productCompany,productPrice,productPriceBeforeDiscount,productDescription,shippingCharge,productAvailability,productImage,creationDate) VALUES ('$category','$subcategory','$productName','$productCompany','$producPriced','$producSellPriced','$productDescripation','$productShiCharg','$producStock','$folder','$currentTime')";
    $sql_in = mysqli_query($conn, $query);
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
      // $(document).ready( function () {
      //     $("#insert").click(function(){
      //       // alert('click');
      //     var category = $("#category").val();
      //     var subcategory = $("#subcategory").val();
      //     var productName = $("#productName").val();
      //     var productCompany = $("#productCompany").val();
      //     var producPriced = $("#producPriced").val();
      //     var producSellPriced = $("#producSellPriced").val();
      //     var productDescripation = $("#froala-editor").val();
      //     var productShiCharg = $("#productShiCharg").val();
      //     var producStock = $("#producStock").val();
      //     var productImg = $("#productImg").val();
      //     // alert(productImg);
      //     var dataString = 'category='+ category + '&subcategory='+ subcategory + '&productName='+ productName + '&productCompany='+ productCompany + '&producPriced='+ producPriced + '&producSellPriced='+ producSellPriced + '&productDescripation='+ productDescripation + '&productShiCharg='+ productShiCharg + '&producStock='+ producStock + '&productImg='+ productImg;
      //       $.ajax({
      //         type: "POST",
      //         url: "insert-product.php",
      //         data:"dataString=" + dataString,
      //         success: function(result){
      //           alert(result);
      //         }
      //         });
      //     });
      //       });

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
            <h1>Insert Product </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Insert Product </li>
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
                <div class="form-group row">
                  <label for="category" class="col-sm-2 col-form-label">Category</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="category" id="category" onChange="getSubcat(this.value);" required>
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
                      placeholder="Product Name" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="productCompany" class="col-sm-2 col-form-label">Product Company</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="productCompany" name="productCompany"
                      placeholder="Product Company" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="producPriced" class="col-sm-2 col-form-label">Product Price Before Discount</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="producPriced" name="producPriced"
                      placeholder="Product Price" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="producSellPriced" class="col-sm-2 col-form-label">Product Price after Discount(Selling
                    Price)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="producSellPriced" name="producSellPriced"
                      placeholder="Product Selling Price" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="productDescripation" class="col-sm-2 col-form-label">Product Description</label>
                  <div class="col-sm-10">
                  <textarea id="froala-editor" class="form-control" name="productDescripation"
                      placeholder="Product Descripation" required></textarea>
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
                      placeholder="Product Shipping Price" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="subcategory" class="col-sm-2 col-form-label">Product Availability</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" required name="producStock" id="producStock">
                      <option selected="selected">Select</option>
                      <option>In Stock</option>
                      <option>Out of Stock</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="productImg" class="col-sm-2 col-form-label">Product Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="productImg" name="productImg"
                      placeholder="Select Product Image" required>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info">
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