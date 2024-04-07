<?php

// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(50) NOT NULL,
productType VARCHAR(30) NOT NULL,
description TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table products created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert product function
function insertProduct($conn, $productName, $productType, $description) {
    $stmt = $conn->prepare("INSERT INTO products (productName, productType, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $productName, $productType, $description);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    insertProduct($conn, $_POST['productName'], $_POST['productType'], $_POST['description']);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product to Comparison Tool</title>
</head>
<body>
<h2>Add a Product</h2>

<form action="" method="post">
    <label for="productName">Product Name:</label><br>
    <input type="text" id="productName" name="productName" required><br>
    <label for="productType">Product Type:</label><br>
    <input type="text" id="productType" name="productType" required><br>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" required></textarea><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
