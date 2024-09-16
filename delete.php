<?php
include 'config.php';

$id = $_GET['id'];

// Delete the user record
$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    // Insert the ID into recycled_ids table
    $sql = "INSERT INTO recycled_ids (id) VALUES ($id)";
    $conn->query($sql);
    
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
