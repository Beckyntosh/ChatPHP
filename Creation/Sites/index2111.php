<?php
// Simple Wishlist Application For Laptops Website

// Database connection
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
$wishlistTable = "CREATE TABLE IF NOT EXISTS wishlist (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
item_name VARCHAR(50) NOT NULL,
item_link VARCHAR(100) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($wishlistTable) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Add item to wishlist
function addToWishlist($userId, $itemName, $itemLink, $conn) {
  $stmt = $conn->prepare("INSERT INTO wishlist (user_id, item_name, item_link) VALUES (?, ?, ?)");
  $stmt->bind_param("iss", $userId, $itemName, $itemLink);
  $stmt->execute();
}

// Display wishlist
function displayWishlist($userId, $conn) {
  $sql = "SELECT item_name, item_link FROM wishlist WHERE user_id = $userId";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<li><a href='" . $row["item_link"]. "'>" . $row["item_name"]. "</a></li>";
    }
  } else {
    echo "0 items in wishlist";
  }
}

// Handling form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userId = 1; // Static user_id for example purposes
  $itemName = $_POST["item_name"];
  $itemLink = $_POST["item_link"];
  addToWishlist($userId, $itemName, $itemLink, $conn);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Laptop Wishlist</title>
</head>
<body>
    <h2>Add Item to Wishlist</h2>
    <form action="" method="post">
        <label for="item_name">Item Name:</label><br>
        <input type="text" id="item_name" name="item_name" required><br>
        <label for="item_link">Item Link:</label><br>
        <input type="text" id="item_link" name="item_link" required><br><br>
        <input type="submit" value="Add to Wishlist">
    </form>

    <h2>Your Wishlist</h2>
    <ul>
        <?php
        $userId = 1; // Static user_id for example purposes
        displayWishlist($userId, $conn);
        ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>
