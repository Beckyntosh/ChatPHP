<?php
// Initialize a session and database connection
session_start();

$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create wishlist and wishlist_items tables if they don't exist
$sqlWishlistTable = "CREATE TABLE IF NOT EXISTS wishlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$sqlWishlistItemsTable = "CREATE TABLE IF NOT EXISTS wishlist_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    wishlist_id INT,
    product_name VARCHAR(255) NOT NULL,
    product_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (wishlist_id) REFERENCES wishlist (id) ON DELETE CASCADE
)";

if (!$conn->query($sqlWishlistTable) || !$conn->query($sqlWishlistItemsTable)) {
    echo "Error creating table: " . $conn->error;
}

// Insert a new wishlist item if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_wishlist'])) {
    $wishlistId = $_POST['wishlist_id'];
    $productName = $_POST['product_name'];
    $productId = $_POST['product_id'];

    $stmt = $conn->prepare("INSERT INTO wishlist_items (wishlist_id, product_name, product_id) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $wishlistId, $productName, $productId);

    if ($stmt->execute()) {
        echo "<script>alert('Product added to wishlist successfully!');</script>";
    } else {
        echo "<script>alert('Error adding product to wishlist.');</script>";
    }
    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
</head>
<body>

<h2>Baby Products Wishlist</h2>

Sample Form for Adding a Product to Wishlist
<form action="" method="post">
Assuming wishlist_id is 1 for demonstration
    <label for="product_name">Product Name:</label>
    <input type="text" id="product_name" name="product_name" required><br><br>
    <label for="product_id">Product ID:</label>
    <input type="number" id="product_id" name="product_id" required><br><br>
    <input type="submit" name="add_to_wishlist" value="Add to Wishlist">
</form>

Display Wishlist Items
<?php
$result = $conn->query("SELECT * FROM wishlist_items WHERE wishlist_id = 1");

if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row["product_name"]) . " (Product ID: " . htmlspecialchars($row["product_id"]) . ")</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No items in wishlist.</p>";
}
?>

</body>
</html>

<?php
$conn->close();
?>
