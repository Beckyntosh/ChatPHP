<?php
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $customSize = $_POST['customSize'];
    $quantity = $_POST['quantity'];

    // Insert the order into database
    $sql = "INSERT INTO orders (product_name, custom_size, quantity) VALUES ('$productName', '$customSize', '$quantity')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Create orders table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    custom_size VARCHAR(100) NOT NULL,
    quantity INT(11) NOT NULL,
    reg_date TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add an Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        input[type=text], input[type=number] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Add Your Custom Order</h2>
    <form action="" method="post">
        <label for="productName">Product Name:</label><br>
        <input type="text" id="productName" name="productName" required><br>
        <label for="customSize">Custom Size:</label><br>
        <input type="text" id="customSize" name="customSize" required><br>
        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity" min="1" required><br>
        <button type="submit">Submit Order</button>
    </form>
</div>
</body>
</html>
