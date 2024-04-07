<?php
// Initialize connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Create Wishlist & Wishlist Items Tables if they don't exist
$wishlistTable = "CREATE TABLE IF NOT EXISTS wishlists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$wishlistItemsTable = "CREATE TABLE IF NOT EXISTS wishlist_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    wishlist_id INT NOT NULL,
    item_name VARCHAR(100) NOT NULL,
    item_description VARCHAR(255),
    link VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (wishlist_id) REFERENCES wishlists(id)
)";

$conn->query($wishlistTable);
$conn->query($wishlistItemsTable);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["item_name"])) {
    $wishlistId = 1; // This should be dynamically obtained based on user selection or creation of new Wishlist
    $itemName = $_POST["item_name"];
    $itemDesc = $_POST["item_description"] ?? '';
    $itemLink = $_POST["item_link"] ?? '';

    $insertSql = "INSERT INTO wishlist_items (wishlist_id, item_name, item_description, link) VALUES (?, ?, ?, ?)";
    if($stmt = $conn->prepare($insertSql)){
        $stmt->bind_param("isss", $wishlistId, $itemName, $itemDesc, $itemLink);
        
        if($stmt->execute()){
            echo "<script>alert('Item added to wishlist successfully.');</script>";
        } else{
            echo "<script>alert('Error: Could not able to execute.');</script>";
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Handbags Wishlist</title>
</head>
<body>
    <h2>Handbags Wishlist</h2>
    <form action="" method="post">
        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" required><br><br>
        <label for="item_description">Item Description:</label>
        <input type="text" id="item_description" name="item_description"><br><br>
        <label for="item_link">Item Link:</label>
        <input type="text" id="item_link" name="item_link"><br><br>
        <input type="submit" value="Add to Wishlist">
    </form>
</body>
</html>
