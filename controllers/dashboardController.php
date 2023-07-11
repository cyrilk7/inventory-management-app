<?php
// session_start();
require_once("../models/product_model.php");
require_once("../models/user_model.php");
require_once("../models/payment_model.php");

if (isset($_SESSION['FirstName'])){

    $numProducts = Product::getNumProducts();
    $numUsers = User::getNumUsers();
    $totalRevenue = Payment::getTotalRevenue();
    $dailyRevenue = Payment::getDailyRevenue();
    $payments = Payment::retrievePayments();
    
    // require_once("../views/dashboard.php");

}

else{
    require_once("../views/login.php");
}





?>