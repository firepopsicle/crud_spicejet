<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Check if there is a recycled ID
    $sql = "SELECT id FROM recycled_ids ORDER BY id ASC LIMIT 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Reuse recycled ID
        $row = $result->fetch_assoc();
        $id = $row['id'];

        // Remove the recycled ID from the table
        $sql = "DELETE FROM recycled_ids WHERE id = $id";
        $conn->query($sql);
    } else {
        // No recycled ID, use the next auto-increment ID
        $sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";
        $conn->query($sql);
        $id = $conn->insert_id;
    }

    // Insert the new user with the recycled ID
    $sql = "INSERT INTO users (id, name, email, phone) VALUES ($id, '$name', '$email', '$phone')";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Add New User</h1>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone"><br>
            <input type="submit" value="Add User">
        </form>
        <div class="actions">
            <a href="index.php">Back to List</a>
        </div>
    </div>
</body>
</html>
