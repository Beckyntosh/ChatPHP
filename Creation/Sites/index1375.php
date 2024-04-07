


<?php
// Handling the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $customSize = $_POST['customSize'];
    $servername = "db";
    $username = "root";
    $password = "root"; // Consider using environment variables for sensitive information
    $dbname = "my_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO orders (productName, customSize) VALUES ('" . $productName . "', '" . $customSize . "')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully')</script>";
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
        .container { max-width: 600px; margin: auto; }
        form { display: flex; flex-direction: column; gap: 12px; }
        label { font-weight: bold; }
        input, select, button { padding: 10px; font-size: 16px; }
        button { background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add a Custom Order</h2>
        <form method="POST">
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" required>

            <label for="customSize">Custom Size:</label>
            <input type="text" id="customSize" name="customSize" required>

            <button type="submit">Add Order</button>
        </form>
    </div>
</body>
</html>

To create the necessary `orders` table in your `my_database`, run this SQL command in your MySQL environment:

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    customSize VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Please ensure that you adapt this basic example to fit into your security and architectural requirements before using it in a production environment.