<?php
// Database configuration
$host = 'db';
$dbname = 'my_database';
$username = 'root';
$password = 'root';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$sqlInit = [
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
    "CREATE TABLE IF NOT EXISTS tracking_numbers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        tracking_number VARCHAR(50),
        FOREIGN KEY (user_id) REFERENCES users(id)
    );"
];

foreach ($sqlInit as $sql) {
    if (!$conn->query($sql)) {
        echo "Error creating table: " . $conn->error;
    }
}

// Check for tracking number POST submission
$trackingNumber = '';
$searchResult = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trackingNumber = $_POST['trackingNumber'];

    $trackingNumber = $conn->real_escape_string($trackingNumber);
    $sql = "SELECT * FROM tracking_numbers WHERE tracking_number = '$trackingNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $searchResult = "Tracking Number: ".$trackingNumber." found.";
    } else {
        $searchResult = "Tracking Number: ".$trackingNumber." not found.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Celestial Charm Instrument Library</title>
<style>
    body {
        background: #0e1a35;
        color: #fff;
        font-family: Arial, sans-serif;
    }
    .container {
        width: 80%;
        margin: 0 auto;
        text-align: center;
    }
    input[type="text"], input[type="submit"] {
        padding: 10px;
        margin: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="submit"] {
        cursor: pointer;
        background-color: #4b79a1;
        color: white;
    }
    input[type="submit"]:hover {
        background-color: #3a5f7d;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Search Tracking Number</h1>
    <form method="POST">
        <input type="text" name="trackingNumber" placeholder="Enter tracking number">
        <input type="submit" value="Search">
    </form>
    <?php if($searchResult): ?>
        <p><?= $searchResult ?></p>
    <?php endif; ?>
</div>
</body>
</html>