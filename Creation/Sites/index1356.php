<?php
// DataBase Connection
$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for custom orders if it doesn't exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS custom_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    custom_size VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($createTableSQL)) {
    die("Error creating table: " . $conn->error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $product_name = $_POST['product_name'];
    $custom_size = $_POST['custom_size'];
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO custom_orders (product_name, custom_size) VALUES (?, ?)");
    $stmt->bind_param("ss", $product_name, $custom_size);

    // Execute
    if ($stmt->execute()) {
        echo "<script>alert('Order submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting order.');</script>";
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Custom Order | Funny Travel Store</title>
</head>
<body>
    <h1>Funny Travel Store - Custom Order</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="product_name">Product Name:</label><br>
        <input type="text" id="product_name" name="product_name" value="wooden dining table" readonly><br>
        <label for="custom_size">Custom Size:</label><br>
        <input type="text" id="custom_size" name="custom_size" placeholder="Enter custom size" required><br><br>
        <input type="submit" value="Submit">
    </form> 
</body>
</html>
