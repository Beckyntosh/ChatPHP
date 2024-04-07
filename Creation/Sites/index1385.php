<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maternity Wear Webshop Order Page</title>
</head>
<body>
    <h1>Add an Order for Custom Maternity Wear</h1>
    <form method="post">
        <label for="productName">Product Name:</label><br>
        <input type="text" id="productName" name="productName" required><br>
        <label for="productSize">Size:</label><br>
        <input type="text" id="productSize" name="productSize" required><br>
        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity" min="1" required><br>
        <label for="customerName">Customer Name:</label><br>
        <input type="text" id="customerName" name="customerName" required><br>
        <input type="submit" value="Add Order">
    </form>

<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $productSize = $_POST['productSize'];
    $quantity = $_POST['quantity'];
    $customerName = $_POST['customerName'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // sql to create table if not exists
    $sqlTable = "CREATE TABLE IF NOT EXISTS orders (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        productName VARCHAR(255) NOT NULL,
        productSize VARCHAR(50) NOT NULL,
        quantity INT(10) NOT NULL,
        customerName VARCHAR(255),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

    if ($conn->query($sqlTable) !== TRUE) {
        echo "Error creating table: " . $conn->error;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO orders (productName, productSize, quantity, customerName) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $productName, $productSize, $quantity, $customerName);

    // set parameters and execute
    if ($stmt->execute()) {
        echo "New order added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
</body>
</html>
