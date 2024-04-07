<?php
// Database Connection
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

// Create products table if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    price DECIMAL(10,2) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error creating table: " . $conn->error;
}

// Add Product
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name']) && !empty($_POST['description'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, description, category, price)
    VALUES ('$name', '$description', '$category', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Product added successfully!</p>";
    } else {
        echo "<p>Error adding product: " . $conn->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Product to Comparison Tool</title>
</head>
<body>
    <h2>Add Product</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name" required><br><br>
        Description: <textarea name="description" required></textarea><br><br>
        Category: <input type="text" name="category"><br><br>
        Price: <input type="text" name="price" required><br><br>
        <input type="submit" value="Add Product">
    </form>
</body>
</html>
<?php
$conn->close();
?>
