<?php
$conn = new mysqli('db', 'root', 'root', 'my_database');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS wishlist (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT NOT NULL,
item_name VARCHAR(255) NOT NULL,
item_price DECIMAL(10, 2) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableQuery)) {
    die("Error creating table: " . $conn->error);
}

$msg = "";

// Add item to wishlist
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["itemName"]) && isset($_POST["itemPrice"]) && isset($_POST["userId"])) {
    $itemName = $conn->real_escape_string($_POST["itemName"]);
    $itemPrice = $conn->real_escape_string($_POST["itemPrice"]);
    $userId = $conn->real_escape_string($_POST["userId"]);

    $addItemQuery = "INSERT INTO wishlist (user_id, item_name, item_price) VALUES ('$userId', '$itemName', '$itemPrice')";

    if ($conn->query($addItemQuery) === TRUE) {
        $msg = "Item added successfully!";
    } else {
        $msg = "Error adding item: " . $conn->error;
    }
}

// Fetch wishlist items
$wishlistItems = [];
$fetchItemsQuery = "SELECT id, item_name, item_price FROM wishlist ORDER BY created_at DESC";
$result = $conn->query($fetchItemsQuery);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $wishlistItems[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist Manager</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { margin-bottom: 2rem; }
        .wishlist-item { margin-bottom: 1rem; padding: 1rem; border: 1px solid #ddd; }
        .msg { margin-bottom: 1rem; padding: 1rem; background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h1>Wishlist Manager</h1>
    <?php if ($msg): ?>
        <div class="msg"><?php echo $msg; ?></div>
    <?php endif; ?>
    <form method="post">
Assuming user ID is 1 for this example
        <p>
            <label for="itemName">Item Name:</label><br>
            <input type="text" id="itemName" name="itemName" required>
        </p>
        <p>
            <label for="itemPrice">Item Price:</label><br>
            <input type="number" step="0.01" id="itemPrice" name="itemPrice" required>
        </p>
        <button type="submit">Add to Wishlist</button>
    </form>
    
    <h2>My Wishlist</h2>
    <?php foreach ($wishlistItems as $item): ?>
        <div class="wishlist-item">
            <h3><?php echo htmlspecialchars($item["item_name"]); ?></h3>
            <p>$<?php echo htmlspecialchars($item["item_price"]); ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>
