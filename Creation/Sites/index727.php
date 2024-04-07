<?php
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

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    file_name VARCHAR(255),
    uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(user_id) REFERENCES users(id)
    ON DELETE CASCADE
);";

if ($conn->multi_query($sql) === TRUE) {
    echo "Tables created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload form submission
if (isset($_POST['upload'])) {
    $userId = $_POST['user_id']; // assuming a user id is posted with form
    $fileName = $_FILES['file']['name'];
    $filePath = 'uploads/' . basename($fileName);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
        $sql = $conn->prepare("INSERT INTO uploads (user_id, file_name) VALUES (?, ?)");
        $sql->bind_param("is", $userId, $fileName);
        
        if ($sql->execute()) {
            echo "File uploaded successfully";
        } else {
            echo "Error: " . $sql->error;
        }
    } else {
        echo "Failed to upload file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload File | Home Decor Travel and Tourism Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f5;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type=file], input[type=submit] {
            margin: 10px 0;
        }
        .futuristic-bg {
            background-color: #8a2be2;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Futuristic Flair: File Upload</h2>
    <form action="" method="post" enctype="multipart/form-data">
Example value, should use actual logged in user's id
        <label for="file">Choose file to upload:</label>
        <input type="file" name="file" id="file">
        <input type="submit" name="upload" value="Upload File" class="futuristic-bg">
    </form>
</div>
</body>
</html>