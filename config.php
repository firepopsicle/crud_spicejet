<?php
// Database configuration
$servername = "localhost"; // Since you're using XAMPP, the host is localhost
$username = "root";        // Default username for MySQL on XAMPP is "root"
$password = "";            // Default password for root is empty
$dbname = "crud_db1";       // The database you created earlier

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
