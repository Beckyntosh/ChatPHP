<?php
// Server details
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
        echo "Error creating tables or inserting data: " . $conn->error;
    }
}

// Additional table for search tracking
$trackSQL = "CREATE TABLE IF NOT EXISTS track_searches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tracking_number VARCHAR(50),
    search_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

if ($conn->query($trackSQL) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Search functionality
if(isset($_POST['tracking_number'])) {
    $trackingNumber = $_POST['tracking_number'];

    // Insert tracking number into track_searches
    $stmt = $conn->prepare("INSERT INTO track_searches (tracking_number) VALUES (?)");
    $stmt->bind_param("s", $trackingNumber);
    $stmt->execute();
    $stmt->close();

    echo "<p>Tracking number <strong>". htmlspecialchars($trackingNumber) ."</strong> searched.</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skin Care Products Online Art Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e4d7;
            color: #5d5d5d;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff1e6;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Abstract Artistry - Track Your Product</h1>
        <form action="" method="post">
            <label for="tracking_number">Enter your tracking number:</label>
            <input type="text" id="tracking_number" name="tracking_number" required>
            <button type="submit">Track</button>
        </form>
    </div>
</body>
</html>