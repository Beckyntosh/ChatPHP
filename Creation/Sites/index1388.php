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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Products created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_id INT(6) UNSIGNED,
quantity INT(3),
order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (product_id) REFERENCES products(id)
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Orders created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $quantity = $_POST['quantity'];

    // Insert product into products table
    $stmt = $conn->prepare("INSERT INTO products (name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $productName, $productDescription);
    $stmt->execute();

    $last_id = $conn->insert_id;

    // Insert order into orders table
    $stmt = $conn->prepare("INSERT INTO orders (product_id, quantity) VALUES (?, ?)");
    $stmt->bind_param("ii", $last_id, $quantity);
    $stmt->execute();

    echo "New record created successfully";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Order - Herbal Supplements</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f5f5dc;
        }

        .container {
            width: 70%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input, textarea {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 20px;
            background-color: #8B4513;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #734f31;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a Custom Order - <i>Sherlock Holmes Style Herbal Supplements</i></h2>
    <form method="post" action="">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" placeholder="e.g., Wooden Dining Table" required>
        
        <label for="productDescription">Product Description:</label>
        <textarea id="productDescription" name="productDescription" rows="4" placeholder="e.g., Custom-sized wooden dining table." required></textarea>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" required>

        <button type="submit">Add Order</button>
    </form>
</div>

</body>
</html>
