<?php

require_once 'includes/config.php';
require_once 'class/calculator.class.php';
require_once 'class/storage.class.php';


$calculator = new Calculator();
$storage = new Storage($conn);

if (isset($_POST['factor1']) && isset($_POST['factor2'])) {
    $factor1 = $_POST['factor1'];
    $factor2 = $_POST['factor2'];
    $result = $calculator->multiply($factor1, $factor2);
    $operation = "*";

    // Pohrani info u database
    $storage->storeResult($factor1, $factor2, $operation, $result);

    echo json_encode($result);
}
