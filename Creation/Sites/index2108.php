<?php
// Simple Wishlist Application for Home Decor Website

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

// Create tables if they don't exist
$createTablesSql = "CREATE TABLE IF NOT EXISTS items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
    );

    CREATE TABLE IF NOT EXISTS wishlists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    item_id INT(6) UNSIGNED,
    FOREIGN KEY (item_id) REFERENCES items(id),
    reg_date TIMESTAMP
    );";

if ($conn->multi_query($createTablesSql) === TRUE) {
  echo "Tables created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Wishlist - Home Decor</title>
<style>
    body { font-family: Arial, sans-serif; }
    .item { margin-bottom: 20px; }
</style>
</head>
<body>

<h2>Wishlist for Your Home Decor</h2>

<form action="" method="post">
    <label for="item_name">Item Name:</label><br>
    <input type="text" id="item_name" name="item_name" required><br>
    <label for="item_description">Description:</label><br>
    <input type="text" id="item_description" name="item_description" required><br>
    <input type="submit" name="submit" value="Add to Wishlist">
</form>

<?php
if (isset($_POST['submit'])) {
  $name = $_POST['item_name'];
  $description = $_POST['item_description'];

  // Insert item into items table
  $addItemSql = "INSERT INTO items (name, description) VALUES ('$name', '$description')";
  
  if ($conn->query($addItemSql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
  } else {
    echo "Error: " . $addItemSql . "<br>" . $conn->error;
  }
}
?>

<h3>Items in Your Wishlist</h3>
<ul>
<?php
$itemsQuery = "SELECT id, name, description FROM items";
$result = $conn->query($itemsQuery);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<li class='item'><strong>" . $row["name"]. "</strong>: " . $row["description"]."</li>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</ul>

</body>
</html>
