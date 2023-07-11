<?php

require_once("../models/product_model.php");

$id = $_GET['id'];
Product::deleteProductbyId($id);

header("Location: ../views/products.php");


?>