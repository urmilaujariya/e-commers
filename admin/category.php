<?php
include_once 'config.php';
include_once 'header.php';
include_once 'sidemenu.php';
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $sql_del ="DELETE from category WHERE id='$id'";
  $res=mysqli_query($conn,$sql_del);

  ?>
    <script>
    window.location.href="category.php";
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
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
                $("#submit").click(function(){
                var category = $("#category").val();
                var description = $("#description").val();
                var dataString = 'categoryV='+ category + '&descriptionV='+ description;
                  $.ajax({
                    type: "POST",
                    url: "category-insert.php",
                    data: dataString,
                    success: function(result){
                      alert(result);
                    }
                    });
                });
            });
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
            <h1>Category Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <form method="post" >
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Category</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="category">Category Name</label>
                  <input type="text"  class="form-control category" name="category" id="category" required>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea  class="form-control description" rows="4" name="description" id="description"></textarea>
                </div>
              </div>
              <div class="form-group d-flex justify-content-center">
                <div class="mb-5">
                  <input type="submit" value="Create" class="btn btn-success" name="submit" id="submit" class="submit">
                  <input type="reset" value="cancel" class="btn btn-danger">
                </div>
              </div>
            </div>
          </form>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="row">
        <div class="col-md-12">
          <form method="post">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Manage Category</h3>
              </div>
              <div class="card-body">
              <table id="myTable" class="display table table-bordered ">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Creation Date</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
$query = mysqli_query($conn, "select * from category");
while ($row = mysqli_fetch_array($query)) {
    ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['categoryName']; ?></td>
                  <td><?php echo $row['categoryDescription']; ?></td>
                  <td><?php echo $row['creationDate']; ?></td>
                  <td><?php echo $row['updationDate']; ?></td>
                  <td><a href="edit-category.php?id=<?php echo $row['id']; ?>" ><i class="nav-icon fas fa-edit"></i></a>
                  <a href="category.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to delete?')"><i class="nav-icon fas fa-trash"></i></a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
              </div>
            </div>
          </form>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Data table -->
  <?php
    
include_once 'footer.php';
?>
    <script>
    $(document).ready( function () {
      $('#myTable').DataTable();
    } );
  </script>
</body>

</html>