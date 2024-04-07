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

// Create orders table if not exists
$sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    custom_size VARCHAR(50),
    quantity INT(3) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $custom_size = $_POST['custom_size'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO orders (product_name, custom_size, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $product_name, $custom_size, $quantity);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add an Order</title>
</head>
<body>
    <h2>Order a Product</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Product Name: <input type="text" name="product_name" required><br><br>
        Custom Size: <input type="text" name="custom_size"><br><br>
        Quantity: <input type="number" name="quantity" min="1" max="100" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
