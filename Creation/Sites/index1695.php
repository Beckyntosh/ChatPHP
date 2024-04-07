<?php
// Database Connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Product Table if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
productName VARCHAR(30) NOT NULL,
productType VARCHAR(30) NOT NULL,
price DECIMAL(10,2) NOT NULL,
description TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // echo "Table Products created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insertion code
$productName = isset($_POST['productName']) ? $_POST['productName'] : '';
$productType = isset($_POST['productType']) ? $_POST['productType'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';

if(isset($_POST['submit'])){
    $sql = "INSERT INTO products (productName, productType, price, description)
    VALUES ('$productName', '$productType', '$price', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Comparison Tool</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .product { margin-bottom: 20px; }
    </style>
</head>
<body>

<h1>Add Product to Comparison Tool</h1>
<form action="" method="post">
    <div class="product">
        <label>Product Name: </label><br>
        <input type="text" name="productName" required><br>
        <label>Product Type: </label><br>
        <input type="text" name="productType" required><br>
        <label>Price: </label><br>
        <input type="number" step="0.01" name="price" required><br>
        <label>Description: </label><br>
        <textarea name="description"></textarea><br>
        <input type="submit" name="submit" value="Add Product">
    </div>
</form>

</body>
</html>

<?php $conn->close(); ?>
