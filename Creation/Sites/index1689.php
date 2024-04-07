
<?php
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(30) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";


if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productName']) && isset($_POST['description'])) {
  $productName = $_POST['productName'];
  $description = $_POST['description'];

  $stmt = $conn->prepare("INSERT INTO products (product_name, description) VALUES (?, ?)");
  $stmt->bind_param("ss", $productName, $description);

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
<title>Add Product to Comparison Tool</title>
</head>
<body>

<h2>Add a Product</h2>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <label for="productName">Product Name:</label><br>
  <input type="text" id="productName" name="productName" value=""><br>
  <label for="description">Description:</label><br>
  <textarea id="description" name="description"></textarea><br><br>
  <input type="submit" value="Submit">
</form> 

<h2>Products List</h2>
<?php
$sql = "SELECT id, product_name, description FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["product_name"]. " - Description: " . $row["description"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>

Remember, always secure your database credentials, use environment variables for sensitive information, and separate your logic into different files according to MVC or similar design patterns for a clean and maintainable codebase in a real-world project.