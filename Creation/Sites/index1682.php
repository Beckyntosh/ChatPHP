<?php
// Connecting to database
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
$createProductsTable = "CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  category VARCHAR(50),
  reg_date TIMESTAMP
)";

$createComparisonTable = "CREATE TABLE IF NOT EXISTS comparisons (
  comparison_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product1_id INT(6) UNSIGNED,
  product2_id INT(6) UNSIGNED,
  compare_date TIMESTAMP,
  FOREIGN KEY (product1_id) REFERENCES products(id),
  FOREIGN KEY (product2_id) REFERENCES products(id)
)";

if (!$conn->query($createProductsTable) || !$conn->query($createComparisonTable)) {
  echo "Error creating tables: " . $conn->error;
}

// Add products to database function
function addProduct($name, $description, $price, $category, $conn) {
  $stmt = $conn->prepare("INSERT INTO products (name, description, price, category) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssds", $name, $description, $price, $category);
  $stmt->execute();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product1']) && isset($_POST['product2'])) {
  $product1 = $_POST['product1'];
  $product2 = $_POST['product2'];

  // Insert comparison to database
  $stmt = $conn->prepare("INSERT INTO comparisons (product1_id, product2_id) VALUES (?, ?)");
  $stmt->bind_param("ii", $product1, $product2);
  $stmt->execute();
  echo "Comparison added successfully";
}

// Fetch all products to display in options
$productsQuery = "SELECT id, name FROM products";
$result = $conn->query($productsQuery);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Bath Products Comparison</title>
</head>
<body>
    <h1>Compare Bath Products</h1>
    <form action="" method="post">
        <div>
            <label for="product1">Product 1:</label>
            <select name="product1">
                <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                        }
                    } else {
                        echo '<option>No products found</option>';
                    }
                ?>
            </select>
        </div>
        <div>
            <label for="product2">Product 2:</label>
            <select name="product2">
                <?php
                    // Reset result pointer and reiterate
                    $result->data_seek(0);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                        }
                    } else {
                        echo '<option>No products found</option>';
                    }
                ?>
            </select>
        </div>
        <button type="submit">Compare</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
