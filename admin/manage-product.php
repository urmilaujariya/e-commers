<?php
    include_once('header.php');
    include_once('sidemenu.php');
    include_once('config.php');
    if(isset($_GET['id'])){
      $id=$_GET['id'];
      $sql_del ="DELETE from products WHERE id='$id'";
      $res=mysqli_query($conn,$sql_del);
      ?>
        <script>window.location.href="manage-product.php";
        </script>
      <?php
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
</head>
<body>
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Details</h1>
</div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
              <table id="myTable" class="display table table-bordered ">
              <thead>
              <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Category </th>
                    <th>Subcategory</th>
                    <th>Company Name</th>
                    <th>Product Creation Date</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
            <?php
    // $q="select products.*,category.categoryName,sub_category.sub_category from products join category on category.id=products.category join sub_category on sub_category.id=products.sub_category";
$query = mysqli_query($conn, "select products.*,category.categoryName,sub_category.subcategoryName from products join category on category.id=products.category join sub_category on sub_category.id=products.subCategory");
$cnt=1;
while ($row = mysqli_fetch_array($query)) {
    ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo $row['productName']; ?></td>
                  <td><?php echo $row['categoryName']; ?></td>
                  <td><?php echo $row['subcategoryName']; ?></td>
                  <td><?php echo $row['productCompany']; ?></td>
                  <td><?php echo $row['creationDate']; ?></td>
                  <td><a href="edit-product.php?id=<?php echo $row['id']; ?>" ><i class="nav-icon fas fa-edit"></i></a>
                  <a href="manage-product.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to delete?')"><i class="nav-icon fas fa-trash"></i></a></td>
                </tr>
                <?php $cnt=$cnt+1; } ?>
            </tbody>
        </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    include_once('footer.php');
  ?>
   <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
    </script>
</body>
</html>