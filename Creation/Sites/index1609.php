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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
price DECIMAL(10,2) NOT NULL,
category VARCHAR(50) NOT NULL,
image VARCHAR(100),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Fetch products to compare
$products = [];
if(isset($_GET['compare1']) && isset($_GET['compare2'])) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ? OR id = ?");
    $stmt->bind_param("ii", $_GET['compare1'], $_GET['compare2']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    } else {
        echo "0 results";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Product Comparison Tool</title>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 8px;
}

th {text-align: left;}
</style>
</head>
<body>

<h2>Compare Products</h2>

<table>
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Category</th>
    <th>Image</th>
  </tr>
  <?php foreach ($products as $product): ?>
  <tr>
    <td><?=htmlspecialchars($product['name'])?></td>
    <td><?=htmlspecialchars($product['description'])?></td>
    <td><?=htmlspecialchars($product['price'])?></td>
    <td><?=htmlspecialchars($product['category'])?></td>
    <td><img src="<?=htmlspecialchars($product['image'])?>" alt="<?=htmlspecialchars($product['name'])?>" style="width:100px;"></td>
  </tr>
  <?php endforeach; ?>
</table>

</body>
</html>
