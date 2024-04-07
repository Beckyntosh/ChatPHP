<?php
// Define variables for database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt to connect to the database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create table for custom orders if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS custom_orders (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        product_name VARCHAR(255) NOT NULL,
        dimensions VARCHAR(255) NOT NULL,
        user_email VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    // Execute query
    $conn->exec($sql);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $dimensions = $_POST['dimensions'];
    $user_email = $_POST['user_email'];

    try {
        // Prepare SQL and bind parameters
        $stmt = $conn->prepare("INSERT INTO custom_orders (product_name, dimensions, user_email) 
        VALUES (:product_name, :dimensions, :user_email)");
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':dimensions', $dimensions);
        $stmt->bindParam(':user_email', $user_email);

        // Execute query
        $stmt->execute();
        echo "Order placed successfully!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Custom Order - Kitchenware Webshop</title>
</head>
<body>
<h2>Custom Order - Wooden Dining Table</h2>
<form method="POST" action="">
    <label for="product_name">Product Name:</label><br>
    <input type="text" id="product_name" name="product_name" value="Wooden Dining Table" readonly><br>
    <label for="dimensions">Dimensions (Length x Width x Height in cm):</label><br>
    <input type="text" id="dimensions" name="dimensions" required><br>
    <label for="user_email">Your Email:</label><br>
    <input type="email" id="user_email" name="user_email" required><br><br>
    <input type="submit" value="Place Order">
</form>
</body>
</html>
