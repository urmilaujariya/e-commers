<?php 
    session_start();
    include_once ('admin/config.php');
    include_once ('header.php');
    $userid =$_SESSION['userid'];
    if(isset($_POST['edit'])){
      $userid =$_SESSION['userid'];
      $name=$_POST['name'];
      // $email=$_POST['email'];
      $mobile=$_POST['mobile'];
      $up_sql=mysqli_query($conn,"UPDATE users SET name='$name',contactno='$mobile' WHERE id='$userid'");
      if($up_sql=true){
        ?>
          <script>
            alert("Your info has been updated");
            window.location.href="profile.php";
          </script>
        <?php
      }
    }
    // ADD Billing Address
    if(isset($_POST['btn_baddress'])){
      $baddress=$_POST['baddress'];
      $bstate=$_POST['bstate'];
      $bcity=$_POST['bcity'];
      $bpincode=$_POST['bpincode'];
      $bsql=mysqli_query($conn,"UPDATE users SET billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' WHERE id='$userid'");
      if($bsql=true){
        ?>
          <script>
            alert("billing addres add");
            window.location.href="profile.php";
          </script>
        <?php
      }
    }
    // ADD Shipping Address
    if(isset($_POST['btn_saddress'])){
      $saddress=$_POST['saddress'];
      $sstate=$_POST['sstate'];
      $scity=$_POST['scity'];
      $spincode=$_POST['spincode'];
      $ssql=mysqli_query($conn,"UPDATE users SET shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' WHERE id='$userid'");
      if($ssql=true){
        ?>
          <script>
            alert("Shipping addres add");
            window.location.href="profile.php";
          </script>
        <?php
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script>
      function getSubcat(val) {
          $.ajax({
          type: "POST",
          url: "edit_address.php",
          data:'cat_id='+val,
          success: function(data){
            $("#myaddress").html(data);
          }
          });
      }
</script>
</head>
<body class="collection">
    <section class="container">
        <h1 class="text-center mb-5" >Profile</h1>
        
        <div class="row justify-content-start">
            <div class="col-md-4 account-info" id="account-info">
                <ul class="nav flex-column u-info mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"> <?php echo $_SESSION['userlogin']; ?></a>
                    </li>
                </ul>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#details">Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#myaddress">Manage Address</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#myorder">My Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Wishlist</a>
                    </li>
                </ul>
            </div>    
            <div class="col-8">
                <div data-bs-spy="scroll" data-bs-target="#account-info" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
                  <?php
                    $userid=$_SESSION['userid'];
                    $sql =mysqli_query($conn,"SELECT * FROM users WHERE id='$userid' ");
                    if(mysqli_num_rows($sql)>0){
                      while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                        ?>
                <div id="details">
                  <form method="POST">
                      <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>" required>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" readonly disabled> 
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                          <input type="tel" class="form-control" name="mobile" id="mobile" value="<?php echo $row['contactno']; ?>" required>
                        </div>
                      </div>
                      <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                  </form> 
                </div>
                        <?php
                      }
                    }
                  ?>
                  <div id="myaddress" class="mt-5 mb-4 row">
                   <div>
                    <h3 class="float-start">Add Address</h3>
                    <button type="submit" name="edit" class="btn btn-primary float-end" onclick="getSubcat(this.value);">Edit Address</button>
                   </div><hr>
                       <div class="col-6" id="Billing">
                        <form method="POST">
                          <div class="mb-3">
                            <label for="baddress" class="form-label">Billing Address</label>
                            <textarea name="baddress" id="baddress" class="form-control" required></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="bstate" class="form-label">Billing State</label>
                            <input type="text" class="form-control" id="bstate" name="bstate" required>
                          </div>
                          <div class="mb-3">
                            <label for="bcity" class="form-label">Billing City</label>
                            <input type="text" class="form-control" id="bcity" name="bcity" required>
                          </div>
                          <div class="mb-3">
                            <label for="bpincode" class="form-label">Billing Pincode</label>
                            <input type="text" class="form-control" id="bpincode" name="bpincode" required>
                          </div>
                          <button type="submit" name="btn_baddress" class="btn btn-primary">Add Billing address</button>
                        </form>
                      </div>
                      <div class="col-6" id="Shipping">
                        <form method="POST">
                          <div class="mb-3">
                            <label for="saddress" class="form-label">Shipping Address</label>
                            <textarea name="saddress" id="saddress" class="form-control" required></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="sstate" class="form-label">Shipping State</label>
                            <input type="text" class="form-control" id="sstate" name="sstate" required>
                          </div>
                          <div class="mb-3">
                            <label for="scity" class="form-label">Shipping City</label>
                            <input type="text" class="form-control" id="scity" name="scity" required>
                          </div>
                          <div class="mb-3">
                            <label for="spincode" class="form-label">Shipping Pincode</label>
                            <input type="text" class="form-control" id="spincode" name="spincode" required>
                          </div>
                          <button type="submit" name="btn_saddress" class="btn btn-primary">Add Shipping address</button>
                        </form>
                      </div>
                  </div>
                </div>
            </div> 
  </div>
</section>

</body>
</html>