<?php

require_once("../controllers/dashboardController.php");

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
    <link rel="stylesheet" href="../css/styles.css">
    <title> Your Products </title>
</head>
<body>
    <div class="product-container">
        <div class="left">
            <h3> Essentials </h3>
            <div class="menu-items">
                <div class="item">
                    <i class="fa-regular fa-clock"></i>
                    <a href="dashboard.php"> Dashb<span  style="border-bottom: 3px solid white;">oard</span> </a>
                </div>
                <div class="item">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <a href="products.php"> Prod<span>ucts</span> </a>
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
                    <h3> <?php echo $firstname . ' ' . $lastname; ?></h3>
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
                <h2> Dashboard </h2>
                <div class="dash-row">
                    <div class="dash-card">
                        <i class="fa-solid fa-circle-info"></i>
                        <div class="icon-div">
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                        <p> Total Revenue </p>
                        <h4> <?php echo $totalRevenue ?> </h4>
                    </div>
                    <div class="dash-card">
                        <i class="fa-solid fa-circle-info"></i>
                        <div class="icon-div">
                            <i class="fa-solid fa-money-bill"></i>
                        </div>
                        <p> Daily Revenue </p>
                        <h4> <?php echo $dailyRevenue ?> </h4>
                    </div>
                    <div class="dash-card">
                        <i class="fa-solid fa-circle-info"></i>
                        <div class="icon-div">
                            <i class="fa-solid fa-box"></i>
                        </div>
                        <p> Products </p>
                        <h4> <?php echo $numProducts ?> </h4>
                    </div>
                    <div class="dash-card">
                        <i class="fa-solid fa-circle-info"></i>
                        <div class="icon-div">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <p> Users </p>
                        <h4> <?php echo $numUsers ?> </h4>
                    </div>

                </div>
                <h2 style="margin-top: 2%;"> Recent Payments </h2>

                <table>
                    <tr>
                        <th> Payment Date </th>
                        <th> Payment Time </th>
                        <th> Amount </th>
                        <th> Student ID</th>

                    </tr>

                    <?php
                        while ($row = mysqli_fetch_assoc($payments)) {
                            $date = $row['PaymentDate'];
                            $time = $row['PaymentTime'];
                            $amount = $row['Amount'];
                            $id = $row['StudentID'];
                        
                            echo "<tr>";
                            echo "<td>$date</td>";
                            echo "<td>$time</td>";
                            echo "<td>$amount</td>";
                            echo "<td>$id</td>";
                            echo "</tr>";
                        }

                    ?>



                </table>
            </div>

        </div>
    </div>

    <script src="../js/script.js"></script>
    
</body>
</html>