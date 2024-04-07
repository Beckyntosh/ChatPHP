<?php

// Database settings
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for custom orders if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS custom_orders (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  product_type VARCHAR(50) NOT NULL,
  dimensions VARCHAR(50),
  details TEXT,
  reg_date TIMESTAMP
)";

if ($conn->query($tableSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $conn->real_escape_string($_POST['customer_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $product_type = $conn->real_escape_string($_POST['product_type']);
    $dimensions = $conn->real_escape_string($_POST['dimensions']);
    $details = $conn->real_escape_string($_POST['details']);

    $sql = "INSERT INTO custom_orders (customer_name, email, product_type, dimensions, details) 
            VALUES ('$customer_name', '$email', '$product_type', '$dimensions', '$details')";

    if ($conn->query($sql) === TRUE) {
      echo "<p>Your custom order request has been submitted successfully.</p>";
    } else {
      echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Custom Order - Retro Clothing Shop</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0e6d2; color: #333;}
        .container { max-width: 600px; margin: 20px auto; background: #fff8f0; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        label { display: block; margin-bottom: 8px; }
        input, textarea { width: 100%; padding: 8px; margin-bottom: 20px; border-radius: 4px; border: 1px solid #ccc; box-sizing: border-box; }
        button { background-color: #8B4513; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #darken(#8B4513, 10%); }
    </style>
</head>
<body>

<div class="container">
    <h2>Custom Order Form</h2>
    <form method="POST" action="">
        <label for="customer_name">Name:</label>
        <input type="text" id="customer_name" name="customer_name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="product_type">Product Type:</label>
        <input type="text" id="product_type" name="product_type" value="Wooden Dining Table" required>
        
        <label for="dimensions">Dimensions:</label>
        <input type="text" id="dimensions" name="dimensions">
        
        <label for="details">Details:</label>
        <textarea id="details" name="details"></textarea>
        
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
