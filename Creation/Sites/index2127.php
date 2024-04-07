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

// Create tables if they don't exist
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

$createCartsTable = "CREATE TABLE IF NOT EXISTS carts (
    cart_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

$createCartItemsTable = "CREATE TABLE IF NOT EXISTS cart_items (
    item_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cart_id INT(6) UNSIGNED,
    product_name VARCHAR(255) NOT NULL,
    quantity INT(6),
    price DECIMAL(10, 2),
    FOREIGN KEY (cart_id) REFERENCES carts(cart_id)
)";

if ($conn->query($createUsersTable) === TRUE && $conn->query($createCartsTable) === TRUE && $conn->query($createCartItemsTable) === TRUE) {
    // Tables created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// Function to save the shopping cart
function saveCart($userId, $cartItems, $conn) {
    $stmt = $conn->prepare("INSERT INTO carts (user_id) VALUES (?)");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $cartId = $stmt->insert_id;

    foreach ($cartItems as $item) {
        $stmt = $conn->prepare("INSERT INTO cart_items (cart_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isid", $cartId, $item['product_name'], $item['quantity'], $item['price']);
        $stmt->execute();
    }
    return $cartId;
}

// Function to retrieve the shopping cart
function getCart($cartId, $conn) {
    $sql = "SELECT product_name, quantity, price FROM cart_items WHERE cart_id = $cartId";
    $result = $conn->query($sql);
    $cartItems = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($cartItems, $row);
        }
    }
    return $cartItems;
}

// Example usage (Assuming user_id is 1 and you have this user in your users table)
*
$userId = 1;
$cartItems = [
    ['product_name' => 'Video Game 1', 'quantity' => 2, 'price' => 59.99],
    ['product_name' => 'Video Game 2', 'quantity' => 1, 'price' => 39.99]
];
$cartId = saveCart($userId, $cartItems, $conn);
echo "Cart saved with ID: " . $cartId;

// Retrieve and display cart
$retrievedCart = getCart($cartId, $conn);
echo "<pre>";
print_r($retrievedCart);
echo "</pre>";
*/

?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
  <h2>My Shopping Cart</h2>
Example Form to simulate adding items to cart (For demonstration purposes only, does not actually add items)
  <form action="" method="post">
    <label for="product">Product Name:</label><br>
    <input type="text" id="product" name="product" value="Video Game 3"><br>
    <label for="quantity">Quantity:</label><br>
    <input type="number" id="quantity" name="quantity" value="1"><br>
    <label for="price">Price:</label><br>
    <input type="text" id="price" name="price" value="49.99"><br><br>
    <input type="submit" value="Add to Cart">
  </form>
</body>
</html>
<?php
$conn->close();
?>
