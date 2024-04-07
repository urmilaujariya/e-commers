<?php 
    include_once('header.php');
    include_once('sidemenu.php');
    include_once 'config.php';
    if(isset($_GET['id'])){
      $id=$_GET['id'];
      $sql_del ="DELETE from sub_category WHERE id='$id'";
      $res=mysqli_query($conn,$sql_del);
      ?>
        <script>
        window.location.href="subcategory.php";
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
                $("#submit").click(function(){
                var category = $("#category").val();
                var subcategoryname = $("#subcategoryname").val();
                var dataString = 'categoryV='+ category + '&subcategorynameV='+ subcategoryname;
                  $.ajax({
                    type: "POST",
                    url: "insert-subcategory.php",
                    data: dataString,
                    success: function(result){
                      alert(result);
                    }
                    });
                });
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
            <h1>Sub Category </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sub Category </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <form method="post">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sub Category</h3>
              </div>
              <div class="card-body">
              <div class="form-group">
                  <label>Category</label>
                  <select class="form-control select2" style="width: 100%;" name="category" id="category">
            <?php
            
              $sql=mysqli_query($conn,"SELECT * FROM category");
              while($row=mysqli_fetch_assoc($sql)){
                ?>
                <!-- <select class="form-control" name="country"> -->
                        <!-- <option>Please select country</option> -->
                        <?php foreach($sql as $key => $value){ ?>
                            <option value="<?=$value['id'] ;?>"><?=$value['categoryName'] ;?></option>
                        <?php } ?>
                    </select>
                
                <?php
                
              }
              ?>
              </select>
                
                </div>
                <div class="form-group">
                  <label for="subcategoryname">SubCategory Name</label>
                  <input type="text" id="subcategoryname" class="form-control" name="subcategoryname" required>
                </div>
              </div>
              <div class="form-group d-flex justify-content-center">
                <div class="mb-5">
                  <input type="submit" value="Create" class="btn btn-success" name="create" id="submit">
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
                <h3 class="card-title">Manage Sub Category</h3>
              </div>
              <div class="card-body">
            <table id="myTable" class="display table table-bordered ">
              <thead>
                  <tr>
                      <th>id</th>
                      <th>Category </th>
                      <th>Sub Category</th>
                      <th>Creation Date</th>
                      <th>Last Update</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
            <?php
    
$query = mysqli_query($conn, "select category.categoryName,sub_category.* FROM sub_category INNER JOIN category ON category.id=sub_category.categoryid;");
$cnt=1;
while ($row = mysqli_fetch_array($query)) {
    ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo $row['categoryName']; ?></td>
                  <td><?php echo $row['subcategoryName']; ?></td>
                  <td><?php echo $row['creationDate']; ?></td>
                  <td><?php echo $row['updationDate']; ?></td>
                  
                  <td><a href="edit-subcategory.php?id=<?php echo $row['id']; ?>" ><i class="nav-icon fas fa-edit"></i></a>
                  <a href="subcategory.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to delete?')"><i class="nav-icon fas fa-trash"></i></a></td>
                </tr>
                <?php $cnt=$cnt+1; } ?>
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
    include_once('footer.php');
  ?>
    <script>
    $(document).ready( function () {
      $('#myTable').DataTable();
    } );
  </script>
</body>

</html>