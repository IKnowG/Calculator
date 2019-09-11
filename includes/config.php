<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "calculator";


// Creating connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

//Cheking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset('utf8');
