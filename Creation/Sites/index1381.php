<?php
// Define MySQL connection parameters
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

// SQL to create table if not exists
$orderTable = "CREATE TABLE IF NOT EXISTS orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(255) NOT NULL,
customSize VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($orderTable) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $customSize = $_POST['customSize'];

    $stmt = $conn->prepare("INSERT INTO orders (productName, customSize) VALUES (?, ?)");
    $stmt->bind_param("ss", $productName, $customSize);

    if($stmt->execute()) {
        echo "Order added successfully.";
    } else {
        echo "Error: " . $stmt->error;
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
    <title>Add Order</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        label, input { display: block; width: 100%; margin-bottom: 10px; }
        input[type='text'], textarea { padding: 8px; }
        input[type='submit'] { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; }
        input[type='submit']:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a Product Order</h2>
    <form action="" method="post">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required placeholder="e.g., Wooden Dining Table">

        <label for="customSize">Custom Size:</label>
        <input type="text" id="customSize" name="customSize" placeholder="e.g., 120x80cm">

        <input type="submit" value="Add Order">
    </form>
</div>

</body>
</html>
