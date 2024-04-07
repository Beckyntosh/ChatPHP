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

// Create tables and insert initial data if not exists
function initializeDatabase($conn) {
    $sqlScripts = [
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
        ('user3', 'User Three', 'user3@example.com', 'password3');",
    ];

    foreach ($sqlScripts as $script) {
        if (!$conn->query($script)) {
            echo "Error initializing database: " . $conn->error;
        }
    }
}

// Calling the function to initialize database
initializeDatabase($conn);

// Social Media Integration functionality HTML output
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health and Wellness Charity Organization</title>
    <style>
        body {
            background-color: #eae7dc;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #8e8d8a;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
            margin-bottom: 20px;
        }

        .product {
            background-color: #d8c3a5;
            border: 1px solid #8e8d8a;
            padding: 10px;
            margin-bottom: 20px;
        }

        .product h2 {
            color: #e98074;
        }

        .footer {
            background-color: #8e8d8a;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Mountain Majesty Themed Health & Wellness Products</h1>
        <p>Support our charity by purchasing high-quality health products</p>
    </div>

    <?php
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="product">';
            echo '<h2>'. $row["name"] .'</h2>';
            echo '<p>'. $row["description"] .'</p>';
            echo '<p>Category: <strong>'. $row["category"] .'</strong></p>';
            echo '<p>Price: <strong>$'. number_format($row["price"], 2) .'</strong></p>';
            echo '<p>In Stock: <strong>'. $row["stock_quantity"] .'</strong></p>';
            echo '</div>';
        }
    } else {
        echo "<p>No products found.</p>";
    }
    ?>

    <div class="footer">
        <p>Follow us on Social Media!</p>
        <a href="https://twitter.com">Twitter</a> | 
        <a href="https://facebook.com">Facebook</a> | 
        <a href="https://instagram.com">Instagram</a>
    </div>
</div>

</body>
</html>
<?php
$conn->close();
?>