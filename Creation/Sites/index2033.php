<?php
// Establish database connection
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

// Create table for products if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  description TEXT,
  reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle product addition
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addProduct'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    $sql = "INSERT INTO products (name, description)
    VALUES ('$name', '$description')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New product added successfully<br>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product to Comparison Tool</title>
</head>
<body>
<h2>Add a New Product</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" required><br>
  Description: <textarea name="description" required></textarea><br>
  <input type="submit" name="addProduct" value="Add Product">
</form>

<h2>Product Comparison</h2>
<form method="get" action="compare.php">
    <?php
    $sql = "SELECT id, name FROM products";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<input type='checkbox' name='product[]' value='" . $row["id"] . "'>" . $row["name"] . "<br>";
        }
    } else {
        echo "0 results";
    }
    ?>
    <input type="submit" value="Compare Products">
</form>
</body>
</html>

<?php
$conn->close();
?>
