<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "essentials_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Error encountered - ". $conn->connect_error);
}

else{
    if (isset($_REQUEST['term'])){
        $searchQuery = $_REQUEST['term'];
        $query = "SELECT * FROM products WHERE ProductName LIKE '%$searchQuery%'";

        $result = mysqli_query($conn, $query);
        
        if($result){
            $numrows = mysqli_num_rows($result);
            if ($numrows > 0){
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "
                    <a href='../views/product_details.php?id=" . $row['ProductID'] . "'>
                    <div class='search-item'>
                        <div class='search-img'>
                            <img src='" . $row['ProductImage'] . "' alt=''>
                        </div>
                        <div class='category-box'>
                            <h4>" . $row['ProductName'] . "</h4>
                            <p>" . $row['Category'] . "</p>
                        </div>
                    </div>
                    </a>
                    ";
                }
            }
            else{
                echo "<h4 id='no-matches'> No matches found </h4>";
            }

        }
        else{
            echo "Error";
        }




    }
    
}

?>