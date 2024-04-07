<?php
// This script acts both as the frontend and backend part of a simple Wishlist management system.
// For simplicity and clarity, error handling is minimal, and security aspects such as input validation and output encoding are omitted.

// Define database credentials
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Wishlist and Items table if not exists
$createWishlistTable = "CREATE TABLE IF NOT EXISTS wishlists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)";

$createItemsTable = "CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    wishlist_id INT,
    item_name VARCHAR(255) NOT NULL,
    FOREIGN KEY (wishlist_id) REFERENCES wishlists(id)
)";

if (!$conn->query($createWishlistTable) || !$conn->query($createItemsTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission for adding items to wishlist
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["itemName"]) && isset($_POST["wishlistName"])) {
    $itemName = $_POST["itemName"];
    $wishlistName = $_POST["wishlistName"];

    // Insert Wishlist if not exists
    $insertWishlist = "INSERT INTO wishlists (name) VALUES ('$wishlistName') ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id)";
    
    if ($conn->query($insertWishlist)) {
        $wishlistId = $conn->insert_id;
        
        // Insert Item
        $insertItem = "INSERT INTO items (wishlist_id, item_name) VALUES ('$wishlistId', '$itemName')";
        
        if (!$conn->query($insertItem)) {
            echo "Error: " . $insertItem . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $insertWishlist . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist Manager</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 20px; }
        input, button { margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Item to Wishlist</h2>
        <form action="" method="POST">
            <input type="text" name="wishlistName" placeholder="Wishlist Name" required>
            <input type="text" name="itemName" placeholder="Item Name" required>
            <button type="submit">Add to Wishlist</button>
        </form>
    </div>
    <div class="container">
        <h2>Wishlists</h2>
        <?php
        // Fetch Wishlists and Items
        $wishlists = $conn->query("SELECT * FROM wishlists");
        if ($wishlists->num_rows > 0) {
            while($wishlist = $wishlists->fetch_assoc()) {
                echo "<h3>" . $wishlist["name"] . "</h3>";
                $items = $conn->query("SELECT * FROM items WHERE wishlist_id = " . $wishlist["id"]);
                if ($items->num_rows > 0) {
                    echo "<ul>";
                    while($item = $items->fetch_assoc()) {
                        echo "<li>" . $item["item_name"] . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No items in wishlist.</p>";
                }
            }
        } else {
            echo "No wishlists found.";
        }
        ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>
