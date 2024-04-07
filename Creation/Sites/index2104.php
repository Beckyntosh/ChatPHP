<?php
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

$sqlCreateWishlistTable = "CREATE TABLE IF NOT EXISTS wishlists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id VARCHAR(50) NOT NULL,
  item_name VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sqlCreateWishlistTable) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["itemName"])) {
    $userId = "uniqueUserID"; // Example user ID, replace with actual user session or unique identification
    $itemName = $_POST["itemName"];

    $stmt = $conn->prepare("INSERT INTO wishlists (user_id, item_name) VALUES (?, ?)");
    $stmt->bind_param("ss", $userId, $itemName);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Craft Beers Wishlist</title>
</head>
<body>
    <h2>Add to Wishlist</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="itemName">Item Name:</label>
        <input type="text" id="itemName" name="itemName" required>
        <button type="submit">Add to Wishlist</button>
    </form>

    <h2>My Wishlist</h2>
    <ul>
        <?php
        $sql = "SELECT id, user_id, item_name FROM wishlists";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row["item_name"]) . "</li>";
          }
        } else {
          echo "0 results";
        }
        ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>
