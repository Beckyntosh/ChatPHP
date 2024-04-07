<?php
// Connection Parameters
define("DB_SERVERNAME", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "my_database");

// Create connection
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for orders if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    custom_size VARCHAR(50) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    // Table creation confirmation
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $custom_size = $_POST['custom_size'];

    // Prepare an insert statement
    $stmt = $conn->prepare("INSERT INTO orders (product_name, custom_size) VALUES (?, ?)");
    $stmt->bind_param("ss", $product_name, $custom_size);

    if ($stmt->execute()) {
        echo "Order added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add an Order</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .container {
        width: 50%;
        margin: auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-top: 50px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input[type="text"],
    .form-group input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .form-group input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .form-group input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<div class="container">
<h2>Add an Order</h2>
<form action="" method="post">
    <div class="form-group">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>
    </div>
    <div class="form-group">
        <label for="custom_size">Custom Size:</label>
        <input type="text" id="custom_size" name="custom_size" required>
    </div>
    <div class="form-group">
        <input type="submit" value="Add Order">
    </div>
</form>
</div>

</body>
</html>
