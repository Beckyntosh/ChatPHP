<?php
// DB Configs
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

// Create tables products and users if not exists
$sqlInit = "CREATE TABLE IF NOT EXISTS products (
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
CREATE TABLE IF NOT EXISTS source_codes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    filename VARCHAR(255),
    code LONGTEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";

if($conn->multi_query($sqlInit)) {
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
}

// Upload functionality
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["sourceCodeFile"])) {
    $filename = $_FILES["sourceCodeFile"]["name"];
    $fileTmpName = $_FILES["sourceCodeFile"]["tmp_name"];
    $fileType = $_FILES["sourceCodeFile"]["type"];
    $fileContent = file_get_contents($fileTmpName);
    $userId = 1; // Static user ID for demo purposes

    $stmt = $conn->prepare("INSERT INTO source_codes (user_id, filename, code) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $userId, $filename, $fileContent);

    if($stmt->execute()) {
        echo "<p>File Uploaded Successfully</p>";
    } else {
        echo "<p>Failed to Upload File</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High-Tech Horizon Clothing Food and Recipe Sharing Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #E0E0E0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input, button {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Source Code Upload</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="sourceCodeFile" required>
            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>