<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
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

    // Sanitize input
    $product_name = $conn->real_escape_string($_POST['product_name']);
    $custom_size = $conn->real_escape_string($_POST['custom_size']);
    $quantity = (int)$_POST['quantity'];

    // Create the orders table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY, 
        product_name VARCHAR(255) NOT NULL, 
        custom_size VARCHAR(255) NOT NULL, 
        quantity INT NOT NULL,
        order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if (!$conn->query($sql) === TRUE) {
        die("Error creating table: " . $conn->error);
    }

    // Insert the order into the table
    $sql = "INSERT INTO orders (product_name, custom_size, quantity) VALUES ('$product_name', '$custom_size', $quantity)";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Order placed successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Order</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        form { display: flex; flex-direction: column; gap: 10px; }
        input, button { padding: 10px; font-size: 16px; }
        button { background-color: #4CAF50; color: white; cursor: pointer; border: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add a Custom Product Order</h2>
        <form action="" method="post">
            <input type="text" name="product_name" placeholder="Product Name" required>
            <input type="text" name="custom_size" placeholder="Custom Size (e.g., 200x100 cm)" required>
            <input type="number" name="quantity" placeholder="Quantity" required min="1">
            <button type="submit">Place Order</button>
        </form>
    </div> 
</body>
</html>
