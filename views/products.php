<?php
require_once("../controllers/product_controller.php");
// session_start();
$firstname = $_SESSION['FirstName'];
$lastname = $_SESSION['LastName'];
$profileImage = $_SESSION['ProfileImage'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/styles.css">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title> Your Products </title>
</head>
<body>
    <div class="product-container">
        <div class="left">
            <h3> Essentials </h3>
            <div class="menu-items">
                <div class="item">
                    <i class="fa-regular fa-clock"></i>
                    <a href="dashboard.php"> Dashb<span>oard</span> </a>
                </div>
                <div class="item">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <a href="products.php"> Prod<span style="border-bottom: 3px solid white;">ucts</span> </a>
                </div>
                <div class="item">
                    <i class="fa-regular fa-credit-card"></i>
                    <a href="payments.php"> Payments </a>
                </div>
                <div class="item" style="margin-top: 100%;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <a href="../controllers/logoutController.php"> Logout </a>
                </div>
            </div>

        </div>
        <div class="right">
            <div class="nav">
                <input type="text" placeholder="Search for product..">
            
                <div class="profile-box" onclick="toggleMenu()">
                    <div class="avatar-container">
                        <img src="<?php echo $profileImage ?>" alt="Avatar" class="avatar-image">
                    </div> 
                    <h3>  <?php echo $firstname . ' ' . $lastname; ?> </h3>
                    <i class="fa-solid fa-sort-down" style="color:rgba(142, 133, 134, 0.45); font-size: 25px; margin-bottom:5%"></i>
                </div>
                <div class="drop-down" id="subMenu">
                    <div class="drop-down-profile">
                        <div class="avatar-container" style="width: 60px; height: 60px;">
                            <img src="<?php echo $profileImage ?>" alt="Avatar" class="avatar-image">
                        </div>
                        <p> <?php echo $firstname . ' ' . $lastname; ?> </p>
                    </div>
                    <hr>
                    <div style="display:flex; align-items: center; justify-content:space-between">
                        <div class="drop-down-row">
                            <i class="fa-solid fa-gears"></i>
                            <a href=""> Settings </a>
                        </div>
                        <i class="fa-solid fa-angle-right" id="right-icon"  style="margin-top: 5%; padding-right: 3%; font-size: 10px; transition:transform 0.5s"></i>
                    </div>
                    <div class="anchor-div" style="display: flex; justify-content:center;">
                        <a href="../controllers/logoutController.php"><button> Logout </button></a>
                    </div>
                </div>                  
            </div>

            <div class="body">
                <div class="row">
                    <h2> Products </h2>
                    <button type="button" data-toggle="modal" data-target="#exampleModalCenter"> Add </button>
                </div>
                <div class="product-row">
                    <?php foreach ($products as $product) { ?>
                    <div class="product-card">
                        <div class="info">
                            <?php echo '<a href="product_details.php?id=' . $product["ProductID"] . '"'; ?>>
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                        </div>
                        <div class="product-img">
                            <img src="<?php echo $product['ProductImage']; ?>" alt="">
                        </div>
                        <h2><?php echo $product['ProductName']; ?></h2>
                        <h3><?php echo $product['Quantity']; ?></h3>
                        <h4> pcs </h4>
                    </div>
                    <?php } ?>
                </div>
                
            </div>


        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalLongTitle"> </h5> -->

            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> -->
            <h2 style="text-align: center;"> Add a New Product </h2>
            </div>
            <form action="../controllers/product_controller.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="name-box">
                        <h4> Product Name </h4>
                        <input type="text" name="productName" placeholder="Cheetos">
                    </div>
                    <div class="name-box">
                        <h4>Category</h4>
                        <select name="productCategory">
                            <option value="">Select a category </option>
                            <option value="Snacks">Snacks</option>
                            <option value="Sports">Sports</option>
                            <option value="Clothing">Clothing</option>
                        </select>
                    </div>
                    <div class="name-box">
                        <h4> Description </h4>
                        <textarea name="productDescription" placeholder="Loren ipsum" id="" cols="30" rows="4"></textarea>
                    </div>
                    <div class="name-box">
                        <h4> Price </h4>
                        <input type="number" step="0.01" name="productPrice" placeholder="$23">
                    </div>
                    <div class="name-box">
                        <h4> Quantity </h4>
                        <input type="number" name="productQuantity" placeholder="0 pcs">
                    </div>
                    <div class="name-box">
                        <h4> Expiry Date </h4>
                        <input type="date" name="productExpiry">
                    </div>

                    <div class="name-box">
                        <h4> Product Image </h4>
                        <input type="file" name="productImage" accept=".png, .jpg, .jpeg">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                <button type="submit" name="addProduct" class="btn btn-primary" id="save">Add Product</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../js/script.js"></script>
    
</body>
</html>