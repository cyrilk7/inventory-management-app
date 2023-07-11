<?php
session_start();
require_once('../models/payment_model.php');

if (isset($_SESSION['FirstName'])){

    $data = Payment::getPaymentStats();
    $monthlyData = Payment::getMonthlyPaymentStats();
    $jsonData = json_encode($data);
    $jsonData2 = json_encode($monthlyData);
    

    echo "<script> 
    window.paymentData = $jsonData; 
    window.monthlyData = $jsonData2;
    </script>";

    $curDate = date('Y-m-d');
    $payments = Payment::getPaymentByDate($curDate);



}

else{
    require_once("../views/login.php");
}



?>