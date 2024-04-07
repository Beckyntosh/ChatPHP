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

// Create tables if not exist
$initSQL = [
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

foreach ($initSQL as $sql) {
    if ($conn->query($sql) !== TRUE) {
        echo "Error creating table or inserting data: " . $conn->error;
    }
}

// Static tranquil-tones theme for simplicity
echo '<style>
body { background-color: #D5E4C3; color: #305D35; font-family: Arial, sans-serif; }
a, a:visited { color: #558B2F; }
input[type=text] { padding: 10px; border-radius: 5px; border: 1px solid #A5D6A7; }
input[type=submit] { padding: 10px 20px; background-color: #81C784; border: none; border-radius: 5px; cursor: pointer; color: white; }
</style>';

// Form for searching products
echo '<h2>Search for Beauty Products</h2>';
echo '<form method="POST">
        <input type="text" name="searchQuery" placeholder="Search for products...">
        <input type="submit" name="search" value="Search">
      </form>';

if (isset($_POST['search'])) {
    $searchQuery = $conn->real_escape_string($_POST['searchQuery']);

    $sql = "SELECT name, description, price FROM products WHERE name LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li><b>" . $row["name"] . "</b> - $" . $row["price"] . "<br>" . $row["description"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No results found.";
    }
}

$conn->close();
?>