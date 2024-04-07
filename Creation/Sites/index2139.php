<?php
// Define MySQL connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Create a connection to the database
$conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$cartTableSql = "CREATE TABLE IF NOT EXISTS carts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$itemsTableSql = "CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->query($cartTableSql);
$conn->query($itemsTableSql);

// Helper function to fetch a cart
function fetchCart($userId) {
    global $conn;
    $stmt = $conn->prepare("SELECT content FROM carts WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $cart = $result->fetch_assoc();
    return $cart ? json_decode($cart['content'], true) : [];
}

// Handle save and retrieve actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $userId = $_POST['userId'] ? (int)$_POST['userId'] : 0;
    if ($userId <= 0) {
        echo "Invalid user ID.";
        exit;
    }
    
    // Save cart
    if ($_POST['action'] === 'save') {
        $content = json_encode($_POST['cart']);
        $stmt = $conn->prepare("INSERT INTO carts (user_id, content) VALUES (?, ?) ON DUPLICATE KEY UPDATE content = ?");
        $stmt->bind_param("iss", $userId, $content, $content);
        $stmt->execute();
        echo "Cart saved successfully.";
    }
    
    if ($_POST['action'] === 'retrieve') {
        $cart = fetchCart($userId);
        echo json_encode($cart);
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gardening Tools - Shopping Cart</title>
</head>
<body style="font-family: 'Courier New', Courier, monospace;">

<h2>Sherlock Holmes Gardening Tools Cart</h2>

<div id="cartContents"></div>

<script>
function saveCart() {
    var cart = {1: 'Spade', 2: 'Rake'};
    var formData = new FormData();
    formData.append('action', 'save');
    formData.append('userId', 1);
    formData.append('cart', JSON.stringify(cart));
    
    fetch("", {method: 'POST', body: formData})
        .then(response => response.text())
        .then(data => alert(data))
        .catch(error => console.error('Error:', error));
}

function retrieveCart() {
    var formData = new FormData();
    formData.append('action', 'retrieve');
    formData.append('userId', 1);
    
    fetch("", {method: 'POST', body: formData})
        .then(response => response.json())
        .then(cart => {
            var cartContents = 'Cart contents: <ul>';
            for (var item in cart) {
                cartContents += '<li>' + cart[item] + '</li>';
            }
            cartContents += '</ul>';
            document.getElementById('cartContents').innerHTML = cartContents;
        })
        .catch(error => console.error('Error:', error));
}

retrieveCart();
</script>

<button onclick="saveCart()">Save Cart</button>

</body>
</html>
