<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection details
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

    // Create table for products comparison if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS products_comparison (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    features TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    reg_date TIMESTAMP
    )";

    if (!$conn->query($sql) === TRUE) {
        echo "Error creating table: " . $conn->error;
    }

    // Sanitize and prepare the data
    $productName = $conn->real_escape_string($_POST['product_name']);
    $features = $conn->real_escape_string($_POST['features']);
    $price = $conn->real_escape_string($_POST['price']);

    // Insert the submitted product
    $sql = "INSERT INTO products_comparison (product_name, features, price)
    VALUES ('$productName', '$features', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product to Comparison Tool</title>
</head>
<body>
<h2>Add a Product</h2>
<form method="post" action="">
    <label for="product_name">Product Name:</label><br>
    <input type="text" id="product_name" name="product_name" required><br>
    <label for="features">Features:</label><br>
    <textarea id="features" name="features" required></textarea><br>
    <label for="price">Price:</label><br>
    <input type="number" id="price" name="price" step="0.01" required><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>