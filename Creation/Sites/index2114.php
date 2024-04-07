<?php
session_start();

// MySQL connection
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

// Create tables if they do not exist
$createWishlistItemsTable = "CREATE TABLE IF NOT EXISTS wishlist_items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_name VARCHAR(255) NOT NULL,
    product_description TEXT,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($createWishlistItemsTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Adding item to wishlist
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_wishlist'])) {
  $product_name = $conn->real_escape_string($_POST['product_name']);
  $product_description = $conn->real_escape_string($_POST['product_description']);
  $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1; // Assume user_id is 1 for this example

  $addWishlistItem = "INSERT INTO wishlist_items (user_id, product_name, product_description) VALUES ('$user_id', '$product_name', '$product_description')";

  if ($conn->query($addWishlistItem) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $addWishlistItem . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wishlist Manager</title>
</head>
<body>
    <h2>Wishlist for Health and Wellness Products</h2>
    <form method="post">
        <label for="product_name">Product Name:</label><br>
        <input type="text" id="product_name" name="product_name" required><br>
        <label for="product_description">Product Description:</label><br>
        <textarea id="product_description" name="product_description" required></textarea><br>
        <input type="submit" name="add_to_wishlist" value="Add to Wishlist">
    </form>

    <h3>Your Wishlist</h3>
    <ul>
    <?php
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1; // Assume user_id is 1 for this example
    $selectWishlistItems = "SELECT * FROM wishlist_items WHERE user_id='$user_id'";
    $result = $conn->query($selectWishlistItems);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>". $row["product_name"]. " - " . $row["product_description"]. "</li>";
        }
    } else {
        echo "<li>Your wishlist is empty</li>";
    }
    ?>
    </ul>
</body>
</html>
<?php $conn->close(); ?>
