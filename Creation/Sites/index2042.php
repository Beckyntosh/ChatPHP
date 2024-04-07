<?php
// Establishing connection to the database
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

// Create product table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(30) NOT NULL,
brandName VARCHAR(30) NOT NULL,
description TEXT,
price DECIMAL(10, 2) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Products created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// HTML Form for adding product
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
<h2>Add a New Product</h2>
<form action="" method="post">
    <label for="productName">Product Name:</label><br>
    <input type="text" id="productName" name="productName" required><br>
    <label for="brandName">Brand Name:</label><br>
    <input type="text" id="brandName" name="brandName" required><br>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" required></textarea><br>
    <label for="price">Price:</label><br>
    <input type="text" id="price" name="price" required><br><br>
    <input type="submit" value="Add Product">
</form>
</body>
</html>
<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $brandName = $_POST['brandName'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO Products (productName, brandName, description, price)
    VALUES ('$productName', '$brandName', '$description', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
