<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
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

    // Clean data
    $product_type = htmlspecialchars($_POST['product_type']);
    $custom_size = htmlspecialchars($_POST['custom_size']);
    $user_email = htmlspecialchars($_POST['user_email']);

    // SQL to insert new custom order
    $sql = "INSERT INTO custom_orders (product_type, custom_size, user_email) VALUES ('$product_type', '$custom_size', '$user_email')";

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
    <title>Custom Product Order</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input, button { width: 100%; padding: 10px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
    </style>
</head>
<body>
    <h2 style="text-align:center">Custom Product Order Form</h2>
    <form action="" method="post">
        <label for="product_type">Product Type:</label>
        <input type="text" id="product_type" name="product_type" value="Wooden Dining Table" readonly>
        
        <label for="custom_size">Custom Size:</label>
        <input type="text" id="custom_size" name="custom_size" placeholder="Enter custom size" required>
        
        <label for="user_email">Your Email:</label>
        <input type="email" id="user_email" name="user_email" placeholder="Enter your email" required>
        
        <button type="submit">Submit Order</button>
    </form>
</body>
</html>

<?php
// Below PHP script is for creating the necessary table if it doesn't exist. It's placed here for simplicity. In practice, it should be executed separately.
// Database configuration
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

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS custom_orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_type VARCHAR(50) NOT NULL,
custom_size VARCHAR(50) NOT NULL,
user_email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
