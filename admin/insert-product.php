<?php
    include_once('config.php');
    if(isset($_POST['dataString'])){
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
        if($sql_in=true)
        {
            echo "Product Insertd";
        }
    }
    else{
        echo "not inserted";
    }
?>