<?php
// Database connection parameters
$host = 'db';
$username = 'root';
$password = 'root';
$database = 'my_database';

// Establish a connection to the MySQL database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create products table if not exists
$products_table = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
);";

// Create users table if not exists
$users_table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);";

// Execute table creation queries
if (!$conn->query($products_table) || !$conn->query($users_table)) {
    echo "Error creating tables: " . $conn->error;
}

// Sample SQL insert commands
$insert_products = "INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Product A', 'Description of Product A', 'Category1', 19.99, 100),
('Product B', 'Description of Product B', 'Category2', 29.99, 80),
('Product C', 'Description of Product C', 'Category1', 39.99, 150),
('Product D', 'Description of Product D', 'Category3', 49.99, 200),
('Product E', 'Description of Product E', 'Category2', 59.99, 60),
('Product F', 'Description of Product F', 'Category3', 69.99, 90);";

$insert_users = "INSERT INTO users (username, name, email, password) VALUES
('user1', 'User One', 'user1@example.com', 'password1'),
('user2', 'User Two', 'user2@example.com', 'password2'),
('user3', 'User Three', 'user3@example.com', 'password3');";

// Execute insert queries only if the tables are empty to avoid duplicate entries
$result = $conn->query("SELECT count(*) FROM products");
$row = $result->fetch_row();
if ($row[0] == 0) {
    if (!$conn->query($insert_products)) {
        echo "Error inserting products: " . $conn->error;
    }
}

$result = $conn->query("SELECT count(*) FROM users");
$row = $result->fetch_row();
if ($row[0] == 0) {
    if (!$conn->query($insert_users)) {
        echo "Error inserting users: " . $conn->error;
    }
}

// HTML and Accessibility Features
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oceanic Oasis - Hair Care Language Learning</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            color: #0277bd;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #26a69a;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0277bd 3px solid;
        }
        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        .main-content {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .product {
            background: #b2dfdb;
            padding: 20px;
            margin: 20px;
        }
        h2 {
            text-align: center;
        }
        /* Accessibility-specific styles */
        a:focus, button:focus, input:focus {
            outline: 3px solid #f57f17;
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Oceanic Oasis</h1>
            <nav>
                <a href="#">Home</a> |
                <a href="#">Products</a> |
                <a href="#">Languages</a>
            </nav>
        </div>
    </header>
    <div class="container main-content">
        <section>
            <h2>Featured Products</h2>
            <?php
            $sql = "SELECT id, name, description, price FROM products ORDER BY id DESC LIMIT 3";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
                    echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
                    echo '<p>Price: $' . htmlspecialchars($row["price"]) . '</p>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </section>
        <aside>
            <h2>Contact Us</h2>
            <p>Please use the form on our site to contact us regarding any queries.</p>
        </aside>
    </div>
    <footer>
        <div class="container">
            <p>&copy; 2023 Oceanic Oasis Hair Care Language Learning Site</p>
        </div>
    </footer>
</body>
</html>