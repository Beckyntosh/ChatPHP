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

$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table Products created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert sample data
$products = [
    "('iPhone 13', 'Latest iPhone model', 'Smartphone', '799.99', CURRENT_TIMESTAMP)",
    "('Samsung Galaxy S21', 'Latest Samsung model', 'Smartphone', '699.99', CURRENT_TIMESTAMP)"
];

foreach ($products as $product) {
    $sql = "INSERT INTO products (name, description, category, price, reg_date) VALUES $product";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handling form submission for comparison
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product1_id = $_POST['product1'];
    $product2_id = $_POST['product2'];

    // Fetch products from database
    $sql = "SELECT * FROM products WHERE id IN ($product1_id, $product2_id)";
    $result = $conn->query($sql);
    $compareProducts = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $compareProducts[] = $row;
        }
    } else {
        echo "0 results";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Comparison Tool</title>
</head>
<body>

<h2>Compare Products</h2>

<form method="post">
  <label for="product1">Choose product 1:</label>
  <select name="product1" id="product1">
    <?php
    $result = $conn->query("SELECT id, name FROM products");
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
    }
    ?>
  </select>

  <label for="product2">Choose product 2:</label>
  <select name="product2" id="product2">
    <?php
    $result = $conn->query("SELECT id, name FROM products");
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
    }
    ?>
  </select>

  <input type="submit" value="Compare">
</form>

<?php if(!empty($compareProducts)): ?>
    <h3>Comparison Result</h3>
    <table>
        <thead>
            <tr>
                <th>Feature</th>
                <?php foreach ($compareProducts as $product): ?>
                    <th><?php echo $product['name']; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Price</td>
                <?php foreach ($compareProducts as $product): ?>
                    <td><?php echo $product['price']; ?></td>
                <?php endforeach; ?>
            </tr>
Add more features as needed
        </tbody>
    </table>
<?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
