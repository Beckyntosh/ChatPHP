<?php
// Connection parameters
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

// Create products table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    brand VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// HTML and PHP script for adding products
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $brand = $_POST['brand'];

  $stmt = $conn->prepare("INSERT INTO products (name, description, brand) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $description, $brand);
  $stmt->execute();
  echo "<p>Product added successfully.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Comparison Tool</title>
</head>
<body>
    <h2>Add Product</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <label for="brand">Brand:</label><br>
        <input type="text" id="brand" name="brand" required><br><br>
        <input type="submit" value="Add">
    </form>
</body>
</html>

<?php
$conn->close();
?>
