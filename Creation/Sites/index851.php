<?php

$servername = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$createProducts = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
)";

$createUsers = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
)";

$conn->query($createProducts);
$conn->query($createUsers);

$initProducts = "INSERT INTO products (name, description, category, price, stock_quantity) VALUES
    ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
    ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
    ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
    ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
    ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
    ('Product F', 'Description of Product F', 'Category3', 69.99, 90)";
 
$initUsers = "INSERT INTO users (username, name, email, password) VALUES
    ('user1', 'User One', 'user1@example.com', 'password1'),
    ('user2', 'User Two', 'user2@example.com', 'password2'),
    ('user3', 'User Three', 'user3@example.com', 'password3')";

$conn->query($initProducts);
$conn->query($initUsers);

?>

<html>
<head>
    <title>Bedding Blog</title>
    <style>
        body {
            background-color: pink;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Bedding Blog!</h1>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select plugin to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Plugin" name="submit">
    </form>

    <form action="search.php" method="get">
        Search projects: <input type="text" name="search">
        <input type="submit" value="Search">
    </form>

    <form action="reminder.php" method="post">
        Add reminder: <input type="text" name="reminder">
        <input type="submit" value="Add Reminder">
    </form>

    <form action="certificate.php" method="post" enctype="multipart/form-data">
        Upload certificate: 
        <input type="file" name="certificateUpload" id="certificateUpload">
        <input type="submit" value="Upload Certificate" name="certificateSubmit">
    </form>
</body>
</html>