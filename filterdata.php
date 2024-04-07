<?php
    include_once ('admin/config.php');
    $order=$_POST['filter'];
    if($order == "a-z" || $order == "z-a"){
      if($order =='a-z'){
        $order='asc';
        
      }
      else{
        $order='desc';
      }
      $sql = "SELECT * FROM products order by productName $order";
      $res =mysqli_query($conn,$sql);
      $output= '';
      while($row = mysqli_fetch_array($res)){
          $output.='
          <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
          <div class="card mb-5" >
            <div class="d-flex justify-content-between">
              <div class="card-body">
              <div class="bg-image hover-zoom ripple rounded ripple-surface d-flex justify-content-center">
                    <img src="admin/'.$row['productImage'].'" class="img-fluid" style="width: 75%;height:200px;"/>
                    <a href="#!">
                      <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                      </div>
                    </a>
                  </div>
                  <h6>'. $row['productCompany'].'</h6>
                  
                  <div class="d-flex flex-row align-items-center mb-1">
                    <h4 class="mb-1 me-1">&#8360; '.$row['productPrice'].'</h4>
                  </div>
                  <h6 class="text-success">Free shipping</h6>
                  <div class="d-flex flex-column mt-4">
                    <button class="btn btn-primary btn-sm" type="button"><a href="view_product.php?pid='.$row['id'].'" style="color:white;"> Details</a></button>
                    <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                      Add to wishlist
                    </button>
                  </div>
              </div>            
          </div>
        </div>
  </div>
       ';
      }  
      echo $output;   
    }
    else{

    
    $sql = "SELECT * FROM products order by productPrice $order";
    $res =mysqli_query($conn,$sql);
    $output= '';
    while($row = mysqli_fetch_array($res)){
        $output.='
        <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
        <div class="card mb-5" >
          <div class="d-flex justify-content-between">
            <div class="card-body">
            <div class="bg-image hover-zoom ripple rounded ripple-surface d-flex justify-content-center">
                  <img src="admin/'.$row['productImage'].'" class="img-fluid" style="width: 75%;height:200px;"/>
                  <a href="#!">
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
                <h6>'. $row['productCompany'].'</h6>
                
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1">&#8360; '.$row['productPrice'].'</h4>
                </div>
                <h6 class="text-success">Free shipping</h6>
                <div class="d-flex flex-column mt-4">
                  <button class="btn btn-primary btn-sm" type="button"><a href="view_product.php?pid='.$row['id'].'" style="color:white;"> Details</a></button>
                  <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                    Add to wishlist
                  </button>
                </div>
            </div>            
        </div>
      </div>
</div>
     ';
    }
    echo $output;
  }

?>