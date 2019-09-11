<?php

require_once 'includes/config.php';
require_once 'class/calculator.class.php';
require_once 'class/storage.class.php';

// Creating objects
$calculator = new Calculator();
$storage = new Storage($conn);

// Data preparation
if (isset($_POST['factor1']) && isset($_POST['factor2'])) {
    $factor1 = $_POST['factor1'];
    $factor2 = $_POST['factor2'];
    $result = $calculator->multiply($factor1, $factor2);
    $operation = "*";

// Storing info in database
    $storage->storeResult($factor1, $factor2, $operation, $result);

    echo json_encode($result);
}
