<?php
// Establish database connection
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

// Create tables if they don't exist
$createTables = "
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS carts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cart_id INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (cart_id) REFERENCES carts(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);
";

if ($conn->multi_query($createTables)) {
    do {
        // Clear all result sets so next query can run
        if ($res = $conn->store_result()) {
            $res->free();
        }
    } while ($conn->more_results() && $conn->next_result());
}

session_start();

// Save Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveCart'])) {
    
    $sessionId = session_id();
    $cartQuery = $conn->prepare("INSERT INTO carts (session_id) VALUES (?)");
    $cartQuery->bind_param("s", $sessionId);
    if ($cartQuery->execute()) {
        $cartId = $cartQuery->insert_id;
        foreach ($_SESSION['cart'] as $productId => $quantity) {
            $itemQuery = $conn->prepare("INSERT INTO cart_items (cart_id, product_id, quantity) VALUES (?, ?, ?)");
            $itemQuery->bind_param("iii", $cartId, $productId, $quantity);
            $itemQuery->execute();
        }

        echo "<p>Cart saved successfully.</p>";
    } else {
        echo "<p>Failed to save cart.</p>";
    }
}

// Retrieve Cart
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['retrieveCart'])) {
    $sessionId = session_id();
    $retrieveQuery = $conn->prepare("
    SELECT p.id, p.name, p.price, ci.quantity
    FROM cart_items ci
    JOIN carts c ON ci.cart_id = c.id
    JOIN products p ON ci.product_id = p.id
    WHERE c.session_id = ?
    ");
    $retrieveQuery->bind_param("s", $sessionId);
    $retrieveQuery->execute();
    $result = $retrieveQuery->get_result();
    
    while ($row = $result->fetch_assoc()) {
        echo "<p>{$row['name']} ({$row['quantity']}) - {$row['price']}</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vitamins Shopping Cart</title>
</head>
<body>
<form action="" method="post">
    <input type="hidden" name="saveCart" value="1">
    <button type="submit">Save Cart</button>
</form>
<form action="" method="get">
    <input type="hidden" name="retrieveCart" value="1">
    <button type="submit">Retrieve Cart</button>
</form>
</body>
</html>
