<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
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

    // Insert new order into orders table
    $product_name = $_POST['product_name'];
    $custom_size = $_POST['custom_size'];
    $sql = "INSERT INTO orders (product_name, custom_size) VALUES ('$product_name', '$custom_size')";

    if ($conn->query($sql) === TRUE) {
        echo "New order created successfully";
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
    <title>Add an Order</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        form { display: flex; flex-direction: column; }
        label { margin-bottom: 10px; }
        input, textarea, button { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Product Order</h2>
        <form method="POST">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required>
            
            <label for="custom_size">Custom Size:</label>
            <input type="text" id="custom_size" name="custom_size" required>
            
            <button type="submit">Submit Order</button>
        </form>
    </div>
</body>
</html>
