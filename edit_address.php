<?php
    session_start();
    include_once ('admin/config.php');
    $userid=$_SESSION['userid'];
    $sql =mysqli_query($conn,"SELECT * FROM users WHERE id='$userid' ");
    if(mysqli_num_rows($sql)>0){
        while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
        ?>
        <div id="myaddress" class="mt-5 mb-4 row">
                   <div>
                    <h3 class="float-start">Add Address</h3>
                    <button type="submit" name="edit" class="btn btn-primary float-end">Edit Address</button>
                   </div><hr>
                       <div class="col-6" id="Billing">
                        <form method="POST">
                          <div class="mb-3">
                            <label for="baddress" class="form-label">Billing Address</label>
                            <textarea name="baddress" id="baddress" class="form-control" required><?php echo $row['billingAddress']; ?></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="bstate" class="form-label">Billing State</label>
                            <input type="text" class="form-control" id="bstate" name="bstate" required value="<?php echo $row['billingState']; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="bcity" class="form-label">Billing City</label>
                            <input type="text" class="form-control" id="bcity" name="bcity" required value="<?php echo $row['billingCity']; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="bpincode" class="form-label">Billing Pincode</label>
                            <input type="text" class="form-control" id="bpincode" name="bpincode" required value="<?php echo $row['billingPincode']; ?>">
                          </div>
                          <button type="submit" name="btn_baddress" class="btn btn-primary">Add Billing address</button>
                        </form>
                      </div>
                      <div class="col-6" id="Shipping">
                        <form method="POST">
                          <div class="mb-3">
                            <label for="saddress" class="form-label">Shipping Address</label>
                            <textarea name="saddress" id="saddress" class="form-control" required> <?php echo $row['shippingAddress']; ?></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="sstate" class="form-label">Shipping State</label>
                            <input type="text" class="form-control" id="sstate" name="sstate" required value="<?php echo $row['shippingState']; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="scity" class="form-label">Shipping City</label>
                            <input type="text" class="form-control" id="scity" name="scity" required value="<?php echo $row['shippingCity']; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="spincode" class="form-label">Shipping Pincode</label>
                            <input type="text" class="form-control" id="spincode" name="spincode" required value="<?php echo $row['shippingPincode']; ?>">
                          </div>
                          <button type="submit" name="btn_saddress" class="btn btn-primary">Add Shipping address</button>
                        </form>
                      </div>
                  </div>
        <?php }} ?>