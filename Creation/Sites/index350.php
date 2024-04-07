<?php
// Check if the PHP session already exists, start if not
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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
$createTableSql = "
CREATE TABLE IF NOT EXISTS products (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS shopping_cart (
user_id INT(11) NOT NULL,
product_id INT(11) NOT NULL,
quantity INT(11) NOT NULL,
FOREIGN KEY (product_id) REFERENCES products(id)
);
";

if (!$conn->multi_query($createTableSql)) {
    echo "Error creating table: " . $conn->error;
}

// Wait for multi queries to finish
do {
    if ($res = $conn->store_result()) {
        $res->free();
    }
} while ($conn->more_results() && $conn->next_result());

// Add product to cart
function addToCart($userId, $productId, $quantity) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $userId, $productId, $quantity);
    $stmt->execute();
    $stmt->close();
}

// Get products from cart
function getCart($userId) {
    global $conn;
    $products = array();
    $stmt = $conn->prepare("SELECT p.id, p.name, p.price, sc.quantity FROM shopping_cart sc JOIN products p ON sc.product_id = p.id WHERE sc.user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    $stmt->close();
    return $products;
}

// Handle requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['addToCart'])) {
        addToCart($_SESSION['userId'], $_POST['productId'], $_POST['quantity']);
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Assume a user ID for example
    $_SESSION['userId'] = 1;
    $cartItems = getCart($_SESSION['userId']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>

<h1>Products</h1>

Simplified Example Products
<?php foreach ($cartItems as $item): ?>
    <div>
        <h4><?php echo $item['name']; ?></h4>
        <p>$<?php echo $item['price']; ?></p>
        <p>Quantity: <?php echo $item['quantity']; ?></p>
    </div>
<?php endforeach; ?>

<form action="" method="post">
    <input type="hidden" name="productId" value="1">
    <input type="number" name="quantity" value="1">
    <input type="submit" name="addToCart" value="Add To Cart">
</form>

</body>
</html>

<?php
$conn->close();
?>