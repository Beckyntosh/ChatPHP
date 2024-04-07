<?php
// Connection settings
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$createTable = "
CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(255),
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

// Insert products if they do not exist (Assuming inserting iPhone 13 and Samsung Galaxy S21)
$insertProducts = "
INSERT INTO products (name, description, category, price) VALUES
('iPhone 13', 'Apple iPhone 13, latest model.', 'Smartphones', 799.99),
('Samsung Galaxy S21', 'Samsung Galaxy S21, high-end model.', 'Smartphones', 699.99)
ON DUPLICATE KEY UPDATE name=name;
";

if (!$conn->query($insertProducts)) {
    echo "Error inserting products: " . $conn->error;
}

// HTML and PHP to display the products in form
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Compare Products</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .product { margin-bottom: 20px; }
        .comparison { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
<h2>Select Products to Compare</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="product">
        <label for="product1">Product 1:</label>
        <select name="product1" id="product1">
            <?php
            $result = $conn->query("SELECT id, name FROM products");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }
            }
            ?>
        </select>
    </div>
    <div class="product">
        <label for="product2">Product 2:</label>
        <select name="product2" id="product2">
            <?php
            $result->data_seek(0); // Reset result pointer
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }
            }
            $result->close();
            ?>
        </select>
    </div>
    <input type="submit" value="Compare">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product1 = $_POST['product1'];
    $product2 = $_POST['product2'];

    $query = "SELECT name, description, price FROM products WHERE id IN (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $product1, $product2);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 2) {
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            array_push($rows, $row);
        }

        echo "<div class='comparison'><h2>Comparison</h2><table><tr><th>Feature</th><th>{$rows[0]['name']}</th><th>{$rows[1]['name']}</th></tr>";
        echo "<tr><td>Description</td><td>{$rows[0]['description']}</td><td>{$rows[1]['description']}</td></tr>";
        echo "<tr><td>Price</td><td>\${$rows[0]['price']}</td><td>\${$rows[1]['price']}</td></tr>";
        echo "</table></div>";
    }
    $stmt->close();
}
$conn->close();
?>
</body>
</html>
