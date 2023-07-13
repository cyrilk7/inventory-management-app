<?php

class Product{
    private $productName;
    private $category;
    private $description;
    private $price;
    private $quantity;
    private $expiryDate;


    public function __construct($productName, $category, $description, $price, $quantity, $expiryDate)
    {
        $this->productName = $productName;
        $this->category = $category;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->expiryDate = $expiryDate;
        
    }


    public static function getNumProducts(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }

        else{
            $sql = "SELECT COUNT(*) AS numProducts FROM PRODUCTS";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);

            if ($numrows == 1){
                $row = mysqli_fetch_assoc($result);
                $count = $row['numProducts'];
                return $count;

            }
        }
    }


    public static function getAllProducts(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }

        else{
            $sql = "SELECT * FROM PRODUCTS";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);

            if ($numrows >  0){
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $products;


            }

        }

    }

    public static function addProduct($name, $category, $description, $price, $quantity, $expiry, $productImage){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }
        else{
            $sql = "INSERT INTO products (ProductName, Category, Description, Price, Quantity, ExpiryDate, ProductImage) VALUES ('$name', '$category', '$description', $price, $quantity, '$expiry', '$productImage');";
            $result = mysqli_query($conn, $sql);
            
            if ($result){
                echo "Product added successfully!";
            }
            else{
                echo "Error";
            }

        }



    }

    public static function getProductbyId($productID){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }
        else{
            $sql = "SELECT * FROM products WHERE ProductID = $productID";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);

            if ($numrows == 1){
                $row = mysqli_fetch_assoc($result);
                return $row;

            }
        }

    }

    
    public static function deleteProductbyId($productID){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }
        else{
            $sql = "DELETE FROM products WHERE ProductID = $productID";
            $result = mysqli_query($conn, $sql);
            // $numrows = mysqli_num_rows($result);

            if ($result){
                return true;

            }
            else{
                return false;
            }
        }

    }


    public static function editProduct($productID, $productName, $productCategory, $productDescription, $productPrice, $productQuantity,$productExpiry, $productImage = 0){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }

        else{
            $sql = "UPDATE products SET ProductName = '$productName', Category = '$productCategory', Description = '$productDescription', Price = '$productPrice', Quantity = '$productQuantity', ExpiryDate = '$productExpiry', ProductImage = '$productImage' WHERE ProductID = '$productID'";
            if ($productImage == 0){
                $sql = "UPDATE products SET ProductName = '$productName', Category = '$productCategory', Description = '$productDescription', Price = '$productPrice', Quantity = '$productQuantity', ExpiryDate = '$productExpiry' WHERE ProductID = '$productID'";
            }
            $result = mysqli_query($conn, $sql);
            
            if ($result){
                return true;
            }
            else{
                return false;
            }
        }
    }


    public static function searchProducts($searchPattern){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "essentials_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Error encountered - ". $conn->connect_error);
        }

        else{
            $sql = "SELECT * FROM Products WHERE ProductName LIKE '%$searchPattern%'";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);

            if ($numrows > 0){
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $products;

            }
        }

    }




    
}

// Product::getNumProducts();
// Product::searchProducts('cO');
// Product::getPaymentStats();


?>