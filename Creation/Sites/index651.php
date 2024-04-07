<?php

// Database connection settings
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

// Execute initial SQL statements
$initSQLs = [
    "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
    )",
    "INSERT INTO products (name, description, category, price, stock_quantity) VALUES
        ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
        ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
        ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
        ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
        ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
        ('Product F', 'Description of Product F', 'Category3', 69.99, 90)",
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    )",
    "INSERT INTO users (username, name, email, password) VALUES
        ('user1', 'User One', 'user1@example.com', 'password1'),
        ('user2', 'User Two', 'user2@example.com', 'password2'),
        ('user3', 'User Three', 'user3@example.com', 'password3')"
];

foreach ($initSQLs as $sql) {
    if (!$conn->query($sql)) {
        echo "Error creating table or inserting data: " . $conn->error;
    }
}

// Handling XML File Upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['xmlfile'])) {
    libxml_use_internal_errors(true);
    $xmlData = simplexml_load_file($_FILES['xmlfile']['tmp_name']);
    if ($xmlData) {
        $stmt = $conn->prepare("INSERT INTO products (name, description, category, price, stock_quantity) VALUES (?, ?, ?, ?, ?)");
        foreach ($xmlData->product as $product) {
            $stmt->bind_param(
                "sssdi",
                $product->name,
                $product->description,
                $product->category,
                $product->price,
                $product->stock_quantity
            );
            $stmt->execute();
        }
        echo "Uploaded and parsed XML successfully.";
    } else {
        echo "Failed to parse XML: " . libxml_get_errors();
    }
    libxml_clear_errors();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wines Digital Marketing Services - XML Upload</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0ebe3; color: #333; }
        .container { width: 80%; margin: auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #8a5340; }
        form { display: flex; flex-direction: column; width: 50%; margin: auto; }
        input[type=file], input[type=submit] { margin: 10px 0; }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload XML File for Wines</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="xmlfile" accept=".xml" required>
        <input type="submit" value="Upload XML">
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>