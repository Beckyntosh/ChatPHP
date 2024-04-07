<?php
// Check if session is started, if not then start
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

// MySQLi connection parameters
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

// Create Products Table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    img_url VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating products table: " . $conn->error;
}

// Create Cart Table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS carts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    total DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    user_id INT(6)
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating carts table: " . $conn->error;
}

// Create Cart_Items Table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS cart_items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cart_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    quantity INT(6),
    FOREIGN KEY (cart_id) REFERENCES carts(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating cart_items table: " . $conn->error;
}

// Save cart
if (isset($_POST['saveCart'])) {
    $userId = $_SESSION['user_id']; // Assuming user_id is saved in session after user logs in
    $cartId = $_SESSION['cart_id']; // Assuming cart_id is saved in session when the shopping cart is created
    $total = $_POST['total'];

    $sql = "UPDATE carts SET total = '$total' WHERE id = '$cartId' AND user_id = '$userId'";
    if ($conn->query($sql) === TRUE) {
        echo "Cart saved successfully";
    } else {
        echo "Error saving cart: " . $conn->error;
    }
}

// Retrieve cart
if (isset($_POST['loadCart'])) {
    $userId = $_SESSION['user_id'];   
    $sql = "SELECT * FROM carts WHERE user_id = '$userId' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Cart ID: " . $row["id"]. " - Total: " . $row["total"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>

<form action="" method="post">
    <input type="hidden" name="total" value="100.50">
    <button type="submit" name="saveCart">Save Cart</button>
</form>

<form action="" method="post">
    <button type="submit" name="loadCart">Load Cart</button>
</form>

</body>
</html>
