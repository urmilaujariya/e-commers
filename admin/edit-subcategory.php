<?php
  include_once 'config.php';
  include_once 'header.php';
//   include_once 'sidemenu.php';
  if (strlen($_SESSION['alogin']) == 0) {
      header('location:index.php');
  }  
  else{
    date_default_timezone_set('Asia/Kolkata');// change according timezone
    $currentTime = date( 'd-m-Y h:i:s A', time () );
    
    $categorys=mysqli_query($conn,"SELECT *  FROM category;");

    if(isset($_GET['id'])){
        $userid=$_GET['id'];
        // $sql_selc=mysqli_query($conn,"SELECT * FROM sub_category where id='$userid'");
        $sql_selc=mysqli_query($conn,"SELECT category.*, sub_category.* FROM category INNER JOIN sub_category ON category.id=sub_category.categoryid WHERE sub_category.id='$userid';");
        $row=mysqli_fetch_assoc($sql_selc);
        $ucategory=$row['categoryName'];
        $subcategoryName=$row['subcategoryName'];
      if(isset($_POST['update'])){  
        $userid=$_GET['id'];
        $category=$_POST['category'];
        $description=$_POST['description'];
        $q="UPDATE sub_category SET categoryid='$category',subcategoryName='$description',updationDate='$currentTime' WHERE id='$userid'";
        $sql_up=mysqli_query($conn,$q);
        if($sql_up=true){
          ?>
            <script>
              window.location.href='subcategory.php';
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
</head>
<body>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub Category Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sub Category Edit</li>
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
                  <label for="inputName">Sub Category Name</label>
                  <!-- <input type="text" id="inputName" class="form-control" name="category" required> -->
                  <select class="form-control select2" style="width: 100%;" name="category" id="category">
                  <?php foreach($categorys as $rows):?>
                        <option value="<?php echo $rows['id']; ?>"><?php echo $rows['categoryName']; ?></option>
                        
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Sub Category Name</label>
                  <input id="inputDescription" class="form-control" name="description" value="<?php echo $subcategoryName;?>">
                </div>
              </div>
              <div class="form-group d-flex justify-content-center">
                <div class="mb-5">
                  <input type="submit" value="Update" class="btn btn-success" name="update">
                  <input type="reset" value="cancel" class="btn btn-danger">
                </div>
              </div>
            </div>
          </form>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
</div>
</section>
</div>
</body>
</html>

<