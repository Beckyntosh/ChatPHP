<?php
// Connection Information
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

// Create Cart Table if not exists
$cartTable = "CREATE TABLE IF NOT EXISTS shopping_cart (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    cart_items TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($cartTable) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = 1; // Assume a default single user system, in a real system this should be dynamic
    $cartItems = $conn->real_escape_string(json_encode($_POST['items']));

    $saveCartSQL = "INSERT INTO shopping_cart (user_id, cart_items) VALUES ('$userId', '$cartItems')";
    if ($conn->query($saveCartSQL) === TRUE) {
        echo "Cart Saved Successfully.";
    } else {
        echo "Error: " . $saveCartSQL . "<br>" . $conn->error;
    }
}

// Retrieve User's Cart
$userId = 1; // Assume a default user
$getCartSQL = "SELECT * FROM shopping_cart WHERE user_id = '$userId' ORDER BY created_at DESC LIMIT 1";
$cartResult = $conn->query($getCartSQL);
$cartItems = [];

if ($cartResult->num_rows > 0) {
    while($row = $cartResult->fetch_assoc()) {
        $cartItems = json_decode($row['cart_items'], true);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DVDs Shopping Cart</title>
</head>
<body>
    <h1>Your Shopping Cart</h1>
    <form method="POST">
        <input type="hidden" name="items[]" value="DVD1">
        <input type="hidden" name="items[]" value="DVD2">
Assume DVDs; in practice, dynamically generate this based on database content or user selection
        <input type="submit" value="Save Cart">
    </form>

    <h2>Items in Your Cart</h2>
    <ul>
    <?php
        if (!empty($cartItems)) {
            foreach ($cartItems as $item) {
                echo "<li>$item</li>";
            }
        } else {
            echo "<li>Your cart is empty.</li>";
        }
    ?>
    </ul>
</body>
</html>
<?php
$conn->close();
?>
