<?php
require("../models/user_model.php");

if (isset($_POST['login'])){
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $user = new User($email, $password);

    if ($user->validateCredentials()){
        header('Location: ../views/dashboard.php');
        exit();
    }
    else{
        header('Location: ../views/login.php');
        exit();
    }
}

?>