<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Summer Books Blog</title>
<style>
body {
    background-color: #ffd700;
    font-family: Arial, sans-serif;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
    text-align: center;
}

.form-group {
    margin-bottom: 15px;
}

form input[type="text"],
form textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form button {
    padding: 10px;
    font-size: 16px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    padding: 10px;
    text-align: left;
}

table th {
    background-color: #4CAF50;
    color: #fff;
}
</style>
</head>
<body>
<?php

$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<div class='container'>";
echo "<h1>Welcome to Summer Books Blog</h1>";

// Create table if it does not exist
$create_products_table = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
)";

if ($conn->query($create_products_table) === TRUE) {
    echo "Products table created successfully<br>";
} else {
    echo "Error creating products table: " . $conn->error;
}

// Insert sample data into products table
$products_data = ["('Product A', 'Description of Product A', 'Category1', 19.99, 100)",
    "('Product B', 'Description of Product B', 'Category2', 29.99, 80)",
    "('Product C', 'Description of Product C', 'Category1', 39.99, 150)",
    "('Product D', 'Description of Product D', 'Category3', 49.99, 200)",
    "('Product E', 'Description of Product E', 'Category2', 59.99, 60)",
    "('Product F', 'Description of Product F', 'Category3', 69.99, 90)"
];

$insert_products_data = "INSERT INTO products (name, description, category, price, stock_quantity) VALUES ";

foreach ($products_data as $data) {
    $insert_products_data .= $data . ",";
}

$insert_products_data = rtrim($insert_products_data, ",");
$insert_products_data .= ";";

if ($conn->query($insert_products_data) === TRUE) {
    echo "Sample data inserted into products table successfully<br>";
} else {
    echo "Error inserting data into products table: " . $conn->error;
}

// Display list of products
echo "<h2>Products List</h2>";

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Category</th><th>Price</th><th>Stock Quantity</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["description"]."</td><td>".$row["category"]."</td><td>".$row["price"]."</td><td>".$row["stock_quantity"]."</td></tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

echo "</div>";

$conn->close();

?>
</body>
</html>