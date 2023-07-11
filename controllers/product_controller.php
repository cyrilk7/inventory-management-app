<?php
session_start();
require_once("../models/product_model.php");




if (isset($_SESSION['FirstName'])){
    $products = Product::getAllProducts();
    

    if (isset($_POST['addProduct'])){
        $productName = $_POST['productName'];
        $productCategory = $_POST['productCategory'];
        $productDescription = $_POST['productDescription'];
        $productPrice = $_POST['productPrice'];
        $productQuantity = $_POST['productQuantity'];
        $productExpiry = $_POST['productExpiry'];
        
        $productImage = $_FILES["productImage"]["name"];
        $base = "../images/products/";
        $targetDirectory = $base . basename($productImage);

        if (file_exists($targetDirectory)){
            $fileExtension = pathinfo($targetDirectory, PATHINFO_EXTENSION);
            $fileName = pathinfo($targetDirectory, PATHINFO_FILENAME);
            $newDirectory = $fileName . '_' . time() . '.' . $fileExtension;

            $targetDirectory = $base . $newDirectory;
        }


        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetDirectory)) {
            Product::addProduct($productName, $productCategory, $productDescription, $productPrice, $productQuantity,$productExpiry,$targetDirectory);
            header("Location: ../views/products.php");
          } 
        else {
            echo "Error moving the uploaded file.";
        }

        


        


    }

    if (isset($_POST['editProduct'])){
        $productID = $_POST['id'];
        $productName = $_POST['productName'];
        $productCategory = $_POST['productCategory'];
        $productDescription = $_POST['productDescription'];
        $productPrice = $_POST['productPrice'];
        $productQuantity = $_POST['productQuantity'];
        $productExpiry = $_POST['productExpiry'];


        $editBool = Product::editProduct($productID, $productName, $productCategory, $productDescription, $productPrice, $productQuantity,$productExpiry);
        
        if ($editBool){
            header("Location: ../views/product_details.php?id=$productID");
        }
        else{
            echo "Unsuccessful";
        }

        

    }


}

else{
    require_once("../views/login.php");
}





?>