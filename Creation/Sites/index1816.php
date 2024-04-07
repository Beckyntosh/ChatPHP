<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Create wishlist table if it doesn't exist
$tableQuery = "CREATE TABLE IF NOT EXISTS wishlist (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_id INT(6) UNSIGNED,
                item_name VARCHAR(30) NOT NULL,
                item_description VARCHAR(255),
                added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

if (!$mysqli->query($tableQuery)) {
    echo "Error creating table: " . $mysqli->error;
}

// Add item to wishlist
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_wishlist'])){
    $userId = 1; // Assuming a user ID is predefined. Implement user system as needed.
    $itemName = trim($_POST['item_name']);
    $itemDescription = trim($_POST['item_description']);

    $insertQuery = "INSERT INTO wishlist (user_id, item_name, item_description) VALUES (?, ?, ?)";

    if($stmt = $mysqli->prepare($insertQuery)){
        $stmt->bind_param("iss", $userId, $itemName, $itemDescription);
        
        if($stmt->execute()){
            echo "Item added successfully.";
        } else{
            echo "Error: Could not execute query: $stmt. " . $mysqli->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home Decor Wishlist</title>
</head>
<body>

<h2>Add Item to Wishlist</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <label for="item_name">Item Name:</label><br>
  <input type="text" id="item_name" name="item_name" required><br>
  <label for="item_description">Item Description:</label><br>
  <textarea id="item_description" name="item_description" required></textarea><br>
  <input type="submit" name="add_to_wishlist" value="Add to Wishlist">
</form>

<h2>Wishlist Items</h2>
<ul>
<?php
$result = $mysqli->query("SELECT item_name, item_description FROM wishlist WHERE user_id=1");

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row["item_name"]) . ": " . htmlspecialchars($row["item_description"]) . "</li>";
    }
} else {
    echo "No items in wishlist.";
}
$mysqli->close();
?>
</ul>

</body>
</html>
