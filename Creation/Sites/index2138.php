<?php
// Start session to track user's shopping cart
session_start();

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS saved_carts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(255) NOT NULL,
    cart_content TEXT NOT NULL,
    save_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

function saveCartToDatabase($conn, $sessionId, $cartContent) {
    $stmt = $conn->prepare("REPLACE INTO saved_carts (session_id, cart_content) VALUES (?, ?)");
    $stmt->bind_param("ss", $sessionId, $cartContent);
    $stmt->execute();
    $stmt->close();
}

function retrieveCartFromDatabase($conn, $sessionId) {
    $stmt = $conn->prepare("SELECT cart_content FROM saved_carts WHERE session_id = ?");
    $stmt->bind_param("s", $sessionId);
    $stmt->execute();
    $result = $stmt->get_result();
    $savedCart = $result->fetch_assoc();
    $stmt->close();
    return $savedCart ? $savedCart['cart_content'] : '';
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save cart to database
    if (isset($_POST['saveCart']) && !empty($_SESSION['shopping_cart'])) {
        $cartContentJson = json_encode($_SESSION['shopping_cart']);
        saveCartToDatabase($conn, session_id(), $cartContentJson);
        $message = "Cart saved successfully!";
    } elseif(isset($_POST['retrieveCart'])) {
        // Retrieve cart from database
        $savedCartJson = retrieveCartFromDatabase($conn, session_id());
        if(!empty($savedCartJson)) {
            $_SESSION['shopping_cart'] = json_decode($savedCartJson, true);
            $message = "Cart retrieved successfully!";
        } else {
            $message = "No saved cart found.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maternity Wear Shopping Cart</title>
</head>
<body>
    <h1>Maternity Wear Shopping Cart</h1>
    <?php if(!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="" method="post">
        <button type="submit" name="saveCart">Save Cart</button>
        <button type="submit" name="retrieveCart">Retrieve Cart</button>
    </form>
    <p>Add item to your shopping cart.</p>
    <form action="" method="post">
        <input type="hidden" name="addItem" value="true">
        <button type="submit">Add Item</button>
    </form>
    <?php
        // Pretend adding an item to the cart
        if(isset($_POST['addItem'])) {
            if(!isset($_SESSION['shopping_cart'])) {
                $_SESSION['shopping_cart'] = [];
            }
            array_push($_SESSION['shopping_cart'], ["itemId" => count($_SESSION['shopping_cart']) + 1, "itemName" => "Item Name", "price" => rand(1, 100)]);
            echo "<p>Item added to the cart!</p>";
        }

        // Display cart items
        if(!empty($_SESSION['shopping_cart'])) {
            echo "<h2>Cart Items</h2>";
            foreach ($_SESSION['shopping_cart'] as $item) {
                echo "<p>{$item["itemName"]} - \${$item["price"]}</p>";
            }
        }
    ?>
</body>
</html>
<?php
$conn->close();
?>
