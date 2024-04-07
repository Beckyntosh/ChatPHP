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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
description TEXT,
category VARCHAR(100),
price DECIMAL(10, 2),
stock_quantity INT
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Product A', 'Description of Product A', 'Category1', 19.99, 100),
('Product B', 'Description of Product B', 'Category2', 29.99, 80),
('Product C', 'Description of Product C', 'Category1', 39.99, 150),
('Product D', 'Description of Product D', 'Category3', 49.99, 200),
('Product E', 'Description of Product E', 'Category2', 59.99, 60),
('Product F', 'Description of Product F', 'Category3', 69.99, 90);

CREATE TABLE IF NOT EXISTS users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30),
name VARCHAR(30),
email VARCHAR(50),
password VARCHAR(255)
);

INSERT INTO users (username, name, email, password) VALUES
('user1', 'User One', 'user1@example.com', 'password1'),
('user2', 'User Two', 'user2@example.com', 'password2'),
('user3', 'User Three', 'user3@example.com', 'password3');

CREATE TABLE IF NOT EXISTS podcast_files (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
file_name VARCHAR(255),
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";

if (!$conn->multi_query($sql)) {
    echo "Error creating tables: " . $conn->error;
}

$conn->close();

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['podcastFile'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["podcastFile"]["name"]);
    if (move_uploaded_file($_FILES["podcastFile"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["podcastFile"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Podcast Upload Form</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f5f5dc;
        }
        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .upload-form {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Your Skin Care Podcast</h2>
        <form class="upload-form" action="" method="post" enctype="multipart/form-data">
            Select file to upload:
            <input type="file" name="podcastFile" id="podcastFile">
            <input type="submit" value="Upload Podcast" name="submit">
        </form>
    </div>
</body>
</html>