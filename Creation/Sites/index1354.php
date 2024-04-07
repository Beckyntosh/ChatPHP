<!DOCTYPE html>
<html>
<head>
    <title>Custom Order Form</title>
</head>
<body>
    <h2>Custom Hair Care Product Order Form</h2>
    <form action="custom_order.php" method="post">
        <label for="product_name">Product Name:</label><br>
        <input type="text" id="product_name" name="product_name" required><br>

        <label for="customization_details">Customization Details:</label><br>
        <textarea id="customization_details" name="customization_details" required></textarea><br>

        <label for="customer_email">Your Email:</label><br>
        <input type="email" id="customer_email" name="customer_email" required><br><br>

        <input type="submit" value="Submit Order">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $product_name = $_POST['product_name'];
    $customization_details = $_POST['customization_details'];
    $customer_email = $_POST['customer_email'];

    // Create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS custom_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    customization_details TEXT NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table custom_orders created successfully.<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Insert data
    $sql = "INSERT INTO custom_orders (product_name, customization_details, customer_email) VALUES ('$product_name', '$customization_details', '$customer_email')";

    if ($conn->query($sql) === TRUE) {
        echo "New custom order created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>
</body>
</html>
