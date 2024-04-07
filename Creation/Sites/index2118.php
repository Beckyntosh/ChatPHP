<?php
// Establish a connection to the database
$servername = "db";
$database = "my_database";
$username = "root";
$password = "root";

// Create the connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Create Wishlist and WishlistItems tables if they don't exist
$wishlistTable = "CREATE TABLE IF NOT EXISTS Wishlists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
)";

$wishlistItemTable = "CREATE TABLE IF NOT EXISTS WishlistItems (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    wishlist_id INT(6) UNSIGNED,
    item_name VARCHAR(255) NOT NULL,
    FOREIGN KEY (wishlist_id) REFERENCES Wishlists(id)
)";

if (!$conn->query($wishlistTable) || !$conn->query($wishlistItemTable)) {
    echo "Error creating table: " . $conn->error;
}

// Check for POST request to add items
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["item_name"]) && !empty($_POST["item_name"])) {
    $itemName = $conn->real_escape_string($_POST["item_name"]);
    $wishlistID = 1; // Assuming default wishlist for demo. In a real app, this would come from user input or session

    $addItemQuery = "INSERT INTO WishlistItems (wishlist_id, item_name) VALUES ('$wishlistID', '$itemName')";
    if (!$conn->query($addItemQuery)) {
        echo "Error adding item: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bedding Wishlist</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f5f5f5; color: #333; }
        .container { max-width: 600px; margin: 20px auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input[type="text"], button { padding: 10px; margin: 5px 0; display: block; width: 100%; }
        ul { list-style-type: none; padding: 0; }
        li { padding: 10px; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
<div class="container">
    <h2>Wishlist</h2>
    <form method="POST">
        <input type="text" name="item_name" placeholder="Add new item to wishlist" required>
        <button type="submit">Add item</button>
    </form>
    <h3>Your Items</h3>
    <ul>
    <?php
    // Fetch and display all wishlist items
    $fetchItems = "SELECT item_name FROM WishlistItems WHERE wishlist_id=1"; // Again, assuming default wishlist
    $result = $conn->query($fetchItems);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row["item_name"]) . "</li>";
        }
    } else {
        echo "<li>No items in wishlist yet</li>";
    }
    $conn->close();
    ?>
    </ul>
</div>
</body>
</html>
