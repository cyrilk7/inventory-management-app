<?php
require_once('../controllers/paymentController.php');
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
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
                    <a href="dashboard.php"> Dashb<span>oard</span> </a>
                </div>
                <div class="item">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <a href="products.php"> Prod<span>ucts</span> </a>
                </div>
                <div class="item">
                    <i class="fa-regular fa-credit-card"></i>
                    <a href="payments.php"> Paym<span style="border-bottom: 3px solid white;">ents </span> </a>
                </div>
                <div class="item" style="margin-top: 100%;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <a href="../controllers/logoutController.php"> Logout </a>
                </div>
            </div>

        </div>
        <div class="right">
            <div class="nav">
                <div class="search-box">
                    <input type="text" placeholder="Search for product..">
                    <div class="results">

                    </div>

                </div>
            
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
                <h2> Revenue </h2>
                <div class="chart-row">
                    <div class="chart-box">
                        <canvas id="DailyChart"> </canvas>
                    </div>
                    <div class="chart-box">
                        <canvas id="MonthlyChart"> </canvas>
                    </div>

                </div>
                <div class="payments-box">
                    <div class="payment-row">
                        <h2> Choose the date </h2>
                        <input type="date" id="paymentPicker">
                    </div>
                    <div class="payment-cards">

                        <?php 
                            if (isset($_GET['date'])){
                                $date = $_GET['date'];
                                $payments = Payment::getPaymentByDate($date);
                            }

                            if (count($payments) > 0)
    
                            foreach ($payments as $payment) {                   
                        ?>
                        <div class="payment-card">
                            <div class="date-box">
                                <i class="fa-solid fa-credit-card"></i>
                                <div class="detail-box">
                                    <h4> <?php echo $payment['PaymentDate'] ?>  AT <?php echo $payment['PaymentTime'] ?> </h4>
                                    <p> <?php echo $payment['StudentID'] ?> </p>
                                </div>
                            </div>
                            <h2> $<?php echo $payment['Amount'] ?> </h2>
                        </div>
                        <?php } 
                        else{
                            echo "<h3 id=no-payments> No payments found </h3>";
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="../js/script.js"></script>
    <script>
        generateChart();
        // var today = new Date().toISOString().split('T')[0];
        // document.getElementById("paymentPicker").value = today;

        document.getElementById("paymentPicker").addEventListener("change", function() {
        var selectedDate = this.value;
        var url = "payments.php?date=" + encodeURIComponent(selectedDate);
        
        window.location.href = url;
        });




    </script>
    
</body>
</html>