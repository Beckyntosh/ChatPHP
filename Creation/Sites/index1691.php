<?php
// Connect to database
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

// Create product table if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  description TEXT,
  brand VARCHAR(30) NOT NULL,
  category VARCHAR(30) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Products created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Function to add product
function addProduct($name, $description, $brand, $category, $price) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO products (name, description, brand, category, price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $name, $description, $brand, $category, $price);
    $stmt->execute();
    return $stmt->insert_id;
}

// Handle product submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addProduct'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    
    $productId = addProduct($name, $description, $brand, $category, $price);
    echo "New product added successfully. Product ID is: " . $productId;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Product to Comparison Tool</title>
</head>
<body>
<h2>Add Product</h2>
<form method="post">
    Name: <input type="text" name="name" required><br>
    Description:<br> <textarea name="description"></textarea><br>
    Brand: <input type="text" name="brand" required><br>
    Category: <input type="text" name="category" required><br>
    Price: <input type="number" step="0.01" name="price" required><br>
    <input type="submit" name="addProduct" value="Add Product">
</form>

</body>
</html>
<?php
$conn->close();
?>
