<?php
// Simple web application for adding an order of a custom-sized wooden dining table for a Board Games website

// Database connection details
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

// Create table if it does not exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(50) NOT NULL,
    dimensions VARCHAR(50) NOT NULL,
    orderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($tableCreationQuery)) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['productName'];
    $dimensions = $_POST['dimensions'];

    $stmt = $conn->prepare("INSERT INTO orders (productName, dimensions) VALUES (?, ?)");
    $stmt->bind_param("ss", $productName, $dimensions);

    if ($stmt->execute()) {
        echo "Order successfully added.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Add a Custom Order for a Wooden Dining Table</h2>
    <form action="" method="post">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" placeholder="Wooden Dining Table" required>
        
        <label for="dimensions">Custom Dimensions:</label>
        <input type="text" id="dimensions" name="dimensions" placeholder="Length x Width x Height" required>
        
        <input type="submit" value="Add Order">
    </form>
</div>
</body>
</html>
