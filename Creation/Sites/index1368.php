<!DOCTYPE html>
<html>
<head>
    <title>Musical Instruments Webshop</title>
</head>
<body>

<h2>Order Your Custom-Sized Musical Instrument</h2>

<form method="post">
    Product Name: <input type="text" name="productName" required><br>
    Custom Size: <input type="text" name="customSize" required><br>
    Quantity: <input type="number" name="quantity" required><br>
    <input type="submit" name="submit" value="Add Order">
</form>

<?php
if (isset($_POST['submit'])) {

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
    
    // SQL to create table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    customSize VARCHAR(255) NOT NULL,
    quantity INT(11) NOT NULL,
    reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table 'orders' created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error."<br>";
    }

    $productName = $_POST['productName'];
    $customSize = $_POST['customSize'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO orders (productName, customSize, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $productName, $customSize, $quantity);

    if ($stmt->execute() === TRUE) {
        echo "New order created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>

</body>
</html>
