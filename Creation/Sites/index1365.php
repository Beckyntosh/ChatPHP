<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crafty Tables Orders</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #fafafa; color: #333; padding: 20px; }
        .container { background-color: #fff; border: 1px solid #ddd; padding: 20px; border-radius: 8px; }
        input, button { padding: 10px; margin-top: 5px; }
        button { cursor: pointer; background-color: #005aa7; color: #fff; border: none; border-radius: 4px; }
        h1 { color: #005aa7; }
    </style>
</head>
<body>
<div class="container">
    <h1>Funny Crafty Tables Orders</h1>
    <form method="post">
        <div>
            <label for="productName">Product Name:</label><br>
            <input type="text" id="productName" name="productName" required placeholder="e.g., Custom Wooden Dining Table">
        </div>
        <div>
            <label for="dimensions">Dimensions:</label><br>
            <input type="text" id="dimensions" name="dimensions" required placeholder="Length x Width x Height in cm">
        </div>
        <div>
            <label for="customerName">Your Name:</label><br>
            <input type="text" id="customerName" name="customerName" required placeholder="Your Full Name">
        </div>
        <div>
            <label for="customerEmail">Your Email:</label><br>
            <input type="email" id="customerEmail" name="customerEmail" required placeholder="your.email@example.com">
        </div>
        <button type="submit" name="submitOrder">Place Order</button>
    </form>
</div>

<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error)  {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    dimensions VARCHAR(100) NOT NULL,
    customerName VARCHAR(255) NOT NULL,
    customerEmail VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
    //echo "Table orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if(isset($_POST['submitOrder'])) {
    $productName = $_POST['productName'];
    $dimensions = $_POST['dimensions'];
    $customerName = $_POST['customerName'];
    $customerEmail = $_POST['customerEmail'];

    $stmt = $conn->prepare("INSERT INTO orders (productName, dimensions, customerName, customerEmail) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $productName, $dimensions, $customerName, $customerEmail);

    if ($stmt->execute() === TRUE) {
        echo "<p>Order placed successfully! We will be in touch.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
    $stmt->close();
}
$conn->close();
?>
</body>
</html>
