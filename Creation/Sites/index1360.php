<?php
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

// Create table if doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS custom_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    dimensions VARCHAR(255) NOT NULL,
    details TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $dimensions = $_POST['dimensions'];
    $details = $_POST['details'];

    $insert_sql = $conn->prepare("INSERT INTO custom_orders (product_name, dimensions, details) VALUES (?, ?, ?)");
    $insert_sql->bind_param("sss", $product_name, $dimensions, $details);

    if ($insert_sql->execute()) {
        echo "Order successfully submitted!";
    } else {
        echo "Error: " . $insert_sql->error;
    }

    $insert_sql->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Custom Order - Wooden Dining Table</title>
</head>
<body>
    <h1>Create Your Custom Wooden Dining Table</h1>
    <form method="POST">
        <label for="product_name">Product Name:</label><br>
        <input id="product_name" type="text" name="product_name" required><br><br>

        <label for="dimensions">Dimensions (e.g., 150x90x75 cm):</label><br>
        <input id="dimensions" type="text" name="dimensions" required><br><br>

        <label for="details">Additional Details:</label><br>
        <textarea id="details" name="details"></textarea><br><br>

        <input type="submit" value="Submit Order">
    </form>
</body>
</html>
