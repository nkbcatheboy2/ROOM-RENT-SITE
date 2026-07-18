<?php

$host = "localhost";      
$user = "root";          
$pass = "";               
$dbname = "rental_db";    


$conn = new mysqli($host, $user, $pass, $dbname);

ा
if ($conn->connect_error) {
    die("कनेक्शन विफल: " . $conn->connect_error);
}


$conn->set_charset("utf8mb4");


?>
