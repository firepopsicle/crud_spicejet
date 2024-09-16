<?php

$servername = "localhost";
$username = "root";   
$password = "";     
$dbname = "crud_db1";     

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
