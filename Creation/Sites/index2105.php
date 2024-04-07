<?php
// Handle database connection
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

// Create wishlist table if it doesn't exist
$wishlistTable = "CREATE TABLE IF NOT EXISTS wishlist (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
item_name VARCHAR(30) NOT NULL,
item_description TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($wishlistTable) === TRUE) {
  // echo "Table Wishlist created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request to add item to wishlist
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $item_name = $_POST["item_name"];
  $item_description = $_POST["item_description"];

  $sql = "INSERT INTO wishlist (item_name, item_description) VALUES ('$item_name', '$item_description')";

  if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Wishlist Management</title>
<style>
body { font-family: Arial, sans-serif; background-color: #f0c040; }
.container { max-width: 600px; margin: auto; background: #fff; padding: 20px; }
input[type=text], textarea { width: 100%; padding: 12px; margin: 8px 0; box-sizing: border-box; }
input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; }
input[type=submit]:hover { background-color: #45a049; }
</style>
</head>
<body>

<div class="container">
  <h2>Add a New Item to Wishlist</h2>
  <form method="post" action="">
    <label for="item_name">Item Name:</label><br>
    <input type="text" id="item_name" name="item_name" required><br>
    <label for="item_description">Item Description:</label><br>
    <textarea id="item_description" name="item_description" required></textarea><br>
    <input type="submit" value="Add to Wishlist">
  </form>
</div>

<div class="container">
  <h2>My Wishlist</h2>
  <?php
  $sql = "SELECT id, item_name, item_description, reg_date FROM wishlist";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<p><strong>".$row["item_name"]."</strong> - " . $row["item_description"]. " <em>Added on: " . $row["reg_date"]."</em></p>";
    }
  } else {
    echo "0 results";
  }
  ?>
</div>

</body>
</html>
<?php
$conn->close();
?>
