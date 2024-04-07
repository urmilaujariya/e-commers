<?php
    include_once('header.php');
    include_once('sidemenu.php');
    include_once('config.php');
    if(isset($_GET['id'])){
      $id=$_GET['id'];
      $sql_del ="DELETE from users WHERE id='$id'";
      $res=mysqli_query($conn,$sql_del);
      ?>
        <script>window.location.href="manage-user.php";
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
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
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
            <h1>User Details</h1>
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
                    <th>Name</th>
                    <th>Email </th>
                    <th>Contact No</th>
                    <th>Shippping Address/City/State/Pincode </th>
                    <th>Billing Address/City/State/Pincode</th>
                    <th>Reg. Date</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
            <?php
    // $q="select products.*,category.categoryName,sub_category.sub_category from products join category on category.id=products.category join sub_category on sub_category.id=products.sub_category";
$query = mysqli_query($conn, "SELECT * from users");
$cnt=1;
while ($row = mysqli_fetch_array($query)) {
    ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['contactno']; ?></td>
                  <td><?php echo $row['shippingAddress'].",".$row['shippingCity'].",".$row['shippingState']."-".$row['shippingPincode'];?></td>
                  <td><?php echo $row['billingAddress'].",".$row['billingCity'].",".$row['billingState']."-".$row['billingPincode'];?></td>
                  <td><?php echo $row['regDate']; ?></td>
                  <td><a href="#.php?id=<?php echo $row['id']; ?>" ><i class="nav-icon fas fa-edit"></i></a>
                  <a href="manage-user.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to delete?')"><i class="nav-icon fas fa-trash"></i></a></td>
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
</body>
</html>