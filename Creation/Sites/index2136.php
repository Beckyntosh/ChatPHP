<?php
// This example provides a simplified PHP code for handling a shopping cart. 
// It will showcase basic functionalities of saving and retrieving the shopping cart from a MySQL database.

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

// Create table for shopping carts if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS shopping_carts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    cart_data TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($table_sql)) {
    echo "Error creating table: " . $conn->error;
}

// Handle saving and retrieving of cart data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['action']) && $_POST['action'] === 'save') {
        $userId = $_POST['user_id'];
        $cartData = $conn->real_escape_string(json_encode($_POST['cart_items']));
        
        $saveSql = "INSERT INTO shopping_carts (user_id, cart_data) VALUES ($userId, '$cartData')";
        if ($conn->query($saveSql) === TRUE) {
            echo "Cart saved successfully!";
        } else {
            echo "Error saving cart: " . $conn->error;
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['action']) && $_GET['action'] === 'retrieve') {
        $userId = $_GET['user_id'];
        $getCartSql = "SELECT cart_data FROM shopping_carts WHERE user_id = $userId ORDER BY created_at DESC LIMIT 1";
        $result = $conn->query($getCartSql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Cart: " . $row["cart_data"];
            }
        } else {
            echo "No cart found";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skateboards Shopping Cart</title>
</head>
<body>
    <h1>Save or Retrieve your Shopping Cart</h1>
    <section>
        <h2>Save Cart</h2>
        <form method="POST">
            <input type="hidden" name="action" value="save">
            User ID: <input type="number" name="user_id" required><br>
            Cart Items (JSON): <textarea name="cart_items" required></textarea><br>
            <button type="submit">Save Cart</button>
        </form>
    </section>
    
    <section>
        <h2>Retrieve Cart</h2>
        <form method="GET">
            <input type="hidden" name="action" value="retrieve">
            User ID: <input type="number" name="user_id" required><br>
            <button type="submit">Retrieve Cart</button>
        </form>
    </section>
</body>
</html>
