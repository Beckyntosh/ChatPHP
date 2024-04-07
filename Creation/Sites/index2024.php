<?php
// Connection settings
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
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"], $_POST["description"], $_POST["price"])) {
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $description, $price, $image);

    // Parameters
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image = $_POST["image"]; // Assume you handle file upload before and get the image link

    // Execute
    $stmt->execute();
    echo "New record created successfully";
    $stmt->close();
}

// Fetch all products
$products = [];
$query = "SELECT * FROM products";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
  echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Comparison Tool</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { text-align: left; padding: 8px; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>Add Product</h2>
<form method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" required></textarea><br>
    <label for="price">Price:</label><br>
    <input type="text" id="price" name="price" required><br>
    <label for="image">Image URL:</label><br>
    <input type="text" id="image" name="image"><br><br>
    <input type="submit" value="Submit">
</form>

<h2>Products</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= htmlspecialchars($product['name']); ?></td>
        <td><?= htmlspecialchars($product['description']); ?></td>
        <td>$<?= htmlspecialchars($product['price']); ?></td>
        <td><img src="<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>" style="height: 100px;"></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
