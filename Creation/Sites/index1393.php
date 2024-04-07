<?php
// This code snippet will create a simple web application for adding a product order to a sporting goods website in a romantic style.
// Frontend + Backend in a single-file approach.
// Note: This is a simplified example for educational purposes.

// Check if the script is handling a form submission.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract the product details from the POST data.
    $productName = $_POST['productName'];
    $productSize = $_POST['productSize'];

    // Database credentials
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    try {
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create order table if it doesn't exist
        $sql = "CREATE TABLE IF NOT EXISTS orders (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            productName VARCHAR(30) NOT NULL,
            productSize VARCHAR(30) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

        $conn->exec($sql);
        
        // Insert new order
        $sql = "INSERT INTO orders (productName, productSize) VALUES (?, ?)";
        
        // Prepare statement
        $stmt = $conn->prepare($sql);
        
        // Execute the statement
        $stmt->execute([$productName, $productSize]);
        
        echo "<script>alert('Order successfully added!');</script>";
    } catch(PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }

    // Close connection
    $conn = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta viewport="content=width=device-width, initial-scale=1.0">
    <title>Add Order - Sporting Goods</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #faeaf3;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group button {
            background-color: #e91e63;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #c2185b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add an Order</h2>
        <form method="POST">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="productSize">Product Size</label>
                <input type="text" id="productSize" name="productSize" required>
            </div>
            <div class="form-group">
                <button type="submit">Add Order</button>
            </div>
        </form>
    </div>
</body>
</html>
