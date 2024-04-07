<?php
// Database configuration
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

// Create product table if it doesn't exist
$productTable = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(30) NOT NULL,
    brand VARCHAR(30),
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($productTable) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// HTML and PHP to handle product comparison
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product1 = isset($_POST['product1']) ? $_POST['product1'] : '';
    $product2 = isset($_POST['product2']) ? $_POST['product2'] : '';

    // SQL to fetch selected products
    $sql = "SELECT * FROM products WHERE id IN (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $product1, $product2);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta viewport="width=device-width, initial-scale=1.0">
    <title>Product Comparison Tool</title>
</head>
<body>
    <h1>Compare Products</h1>
    <form action="" method="post">
        <select name="product1">
            <?php
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['product_name'] . "</option>";
                }
            ?>
        </select>
        <select name="product2">
            <?php
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['product_name'] . "</option>";
                }
            ?>
        </select>
        <button type="submit">Compare</button>
    </form>

    <?php if (!empty($products)) { ?>
        <h2>Comparison Result</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <td><?= $product['product_name'] ?></td>
                        <td><?= $product['brand'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['description'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>

</body>
</html>

<?php $conn->close(); ?>
