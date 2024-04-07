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

// Create tables if they don't exist
$initSql = [
    "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
    );",
    "INSERT INTO products (name, description, category, price, stock_quantity) VALUES
        ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
        ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
        ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
        ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
        ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
        ('Product F', 'Description of Product F', 'Category3', 69.99, 90);",
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    );",
    "INSERT INTO users (username, name, email, password) VALUES
        ('user1', 'User One', 'user1@example.com', 'password1'),
        ('user2', 'User Two', 'user2@example.com', 'password2'),
        ('user3', 'User Three', 'user3@example.com', 'password3');"
];

foreach ($initSql as $sql) {
    if ($conn->query($sql) === TRUE) {
        // Table created successfully or already exists
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Electric Elegance Baby Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #232323;
            color: #f0f0f0;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        h1, h2 {
            color: #ffca08;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .product {
            background-color: #333;
            margin: 10px;
            padding: 20px;
            border-radius: 8px;
            width: calc(33.333% - 20px);
        }
        .product h3 {
            color: #ffca08;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Electric Elegance Baby Products</h1>
        <h2>Featured Products</h2>
        <div class="product-list">
            <?php
            $sql = "SELECT name, description, price FROM products ORDER BY price DESC LIMIT 6";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<h3>'. $row["name"]. '</h3>';
                    echo '<p>'. $row["description"]. '</p>';
                    echo '<p><strong>'. $row["price"]. '$</strong></p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No products found.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>