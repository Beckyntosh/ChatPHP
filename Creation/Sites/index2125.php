<?php
// Connect to the database
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

// Create tables if not exist
$cartTable = "CREATE TABLE IF NOT EXISTS carts (
    cart_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    cart_data TEXT NOT NULL,
    saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$productTable = "CREATE TABLE IF NOT EXISTS products (
    product_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
)";

if (!$conn->query($cartTable) || !$conn->query($productTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle requests
$action = $_REQUEST['action'] ?? '';

if ($action == 'saveCart') {
    $userId = intval($_POST['user_id']);
    $cartData = $conn->real_escape_string(json_encode($_POST['cart']));
    
    $query = "INSERT INTO carts (user_id, cart_data) VALUES ('$userId', '$cartData')";
    if ($conn->query($query) === TRUE) {
        echo "Cart saved successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
    
} elseif ($action == 'retrieveCart') {
    $userId = intval($_GET['user_id']);
    $query = "SELECT cart_data FROM carts WHERE user_id = '$userId' ORDER BY saved_at DESC LIMIT 1";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['cart_data'];
    } else {
        echo "No saved cart found";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prescription Medications Shopping Cart</title>
</head>
<body>
    <h2>Welcome to our Prescription Medications Store!</h2>
    <div id="cart">Your cart is empty.</div>
    <button onclick="saveCart()">Save Cart</button>
    <button onclick="retrieveCart()">Retrieve Cart</button>

    <script>
        let cart = [];

        function saveCart() {
            const userId = 1; // Example user ID
            fetch('?action=saveCart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `user_id=${userId}&cart=${JSON.stringify(cart)}`
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
            });
        }

        function retrieveCart() {
            const userId = 1; // Example user ID
            fetch(`?action=retrieveCart&user_id=${userId}`)
            .then(response => response.json())
            .then(data => {
                cart = data;
                document.getElementById('cart').innerText = JSON.stringify(cart, null, 2);
            })
            .catch(() => {
                alert('Failed to retrieve the cart.');
            });
        }
    </script>
</body>
</html>
