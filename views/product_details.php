<?php

require_once("../models/product_model.php");

if (!isset($_GET['id'])){
    header("Location: ../views/products.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Product Name </title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    $productID = $_GET['id'];
    $product = Product::getProductbyId($productID);
    

    ?>
    <div class="detail-container">
        <div class="detail-left">
            <!-- <i class="fa-solid fa-arrow-left"></i> -->
            <div class="detail-img">
                <img src="<?php echo $product['ProductImage']; ?>" alt="">

            </div>
        </div>

        <div class="detail-right">
            <h3> <?php echo $product['Category']; ?> </h3>
            <h1> <?php echo $product['ProductName']; ?> </h1>
            <div class="description">
                <p> <?php echo $product['Description']; ?> </p>
            </div>
            <div class="price-container">
                <h2> $<?php echo $product['Price']; ?> </h2>
                <div class="edit-container">
                    <button type="button" data-toggle="modal" data-target="#editModal" id="edit-product"> Edit </button>
                    <?php echo "<a href='../controllers/delete_controller.php?id=". $_GET['id'] ."'"?>><i class="fa-solid fa-trash"></i></a>
                    
                </div>
            </div>
            <hr>
            <h3 style="font-weight: 700;"> Details </h3>
            <div class="detail-pane">
                <div class="left-detail">
                    <p>Quantity</p>
                    <p> Expiry Date</p>
                   
                </div>
                <div class="right-detail">
                    <p> <?php echo $product['Quantity']; ?> </p>
                    <p> <?php echo $product['ExpiryDate']; ?> </p>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h2 style="text-align: center;"> Edit Product </h2>
            </div>
            <?php echo '<form action="../controllers/product_controller.php?id='. $_GET['id'] .'" method="POST">' ?>
                <div class="modal-body">

                    <div class="name-box">
                        <h4> Product Name </h4>
                        <input type="text" name="productName" placeholder="Cheetos" value="<?php echo $product['ProductName']; ?>">
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    </div>
                    <div class="name-box">
                        <h4>Category</h4>
                        <select name="productCategory">
                            <!-- <option value="">Select a category </option> -->
                            <option value="Snacks" <?php if ($product['Category'] == 'Snacks') echo 'selected'; ?>>Snacks</option>
                            <option value="Sports" <?php if ($product['Category'] == 'Sports') echo 'selected'; ?>>Sports</option>
                            <option value="Clothing" <?php if ($product['Category'] == 'Clothing') echo 'selected'; ?>>Clothing</option>
                            <!-- <option value="Snacks">Snacks</option>
                            <option value="Sports">Sports</option>
                            <option value="Clothing">Clothing</option> -->
                        </select>
                    </div>
                    <div class="name-box">
                        <h4> Description </h4>
                        <textarea name="productDescription" placeholder="Loren ipsum" id="" cols="30" rows="4"><?php echo $product['Description']; ?></textarea>
                    </div>
                    <div class="name-box">
                        <h4> Price </h4>
                        <input type="number" step="0.01" name="productPrice" placeholder="$23" value="<?php echo $product['Price']; ?>">
                    </div>
                    <div class="name-box">
                        <h4> Quantity </h4>
                        <input type="number" name="productQuantity" placeholder="0 pcs" value="<?php echo $product['Quantity']; ?>">
                    </div>
                    <div class="name-box">
                        <h4> Expiry Date </h4>
                        <input value="<?php echo $product['ExpiryDate']; ?>" type="date" name="productExpiry">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                <button type="submit" name="editProduct" class="btn btn-primary" id="save"> Save Changes </button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.js"></script>
    
</body>
</html>