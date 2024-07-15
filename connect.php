<?php

$server = "localhost";
$username = "root";
$pass = "";
$database = "testing";

$conn = new mysqli($server, $username, $pass, $database);
// print_r($conn);

if($conn->connect_errno > 0){
    echo "Database connection failed.";
}



?>