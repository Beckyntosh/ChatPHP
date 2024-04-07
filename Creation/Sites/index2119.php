<?php
// Database Connection
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

// Create Wishlist and Wishlist Items Table if it doesn't exist
$createWishlistTable = "CREATE TABLE IF NOT EXISTS wishlists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$createWishlistItemsTable = "CREATE TABLE IF NOT EXISTS wishlist_items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    wishlist_id INT(6) UNSIGNED,
    item_name VARCHAR(255) NOT NULL,
    item_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (wishlist_id) REFERENCES wishlists(id)
)";

$conn->query($createWishlistTable);
$conn->query($createWishlistItemsTable);

// Handle Form Submission for New Wishlist Item
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addItem"])) {
    $item_name = $_POST["item_name"];
    $item_price = $_POST["item_price"];
    $wishlist_id = $_POST["wishlist_id"]; // Assuming there's a wishlist ID to associate items with

    $addItemSql = "INSERT INTO wishlist_items (wishlist_id, item_name, item_price) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($addItemSql);
    $stmt->bind_param("isd", $wishlist_id, $item_name, $item_price);
    $stmt->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wishlist Creator</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 90%; margin: 0 auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        form { margin-top: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Wishlist Manager</h1>

    <form method="POST">
Static wishlist ID for demo
        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" required>
        
        <label for="item_price">Item Price:</label>
        <input type="text" id="item_price" name="item_price" required>

        <button type="submit" name="addItem">Add Item</button>
    </form>

    <h2>Wishlist Items</h2>
    <table>
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Item Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $wishlistQuery = "SELECT * FROM wishlist_items WHERE wishlist_id = 1"; // Static wishlist ID for demo
                $result = $conn->query($wishlistQuery);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["item_name"] . "</td>";
                        echo "<td>$" . $row["item_price"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No items in wishlist</td></tr>";
                }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
<?php
$conn->close();
?>
