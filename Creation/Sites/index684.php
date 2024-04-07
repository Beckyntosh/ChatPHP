<?php

$host = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Connect to database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$tables = [
    'CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
    );',
    'CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    );',
    'CREATE TABLE IF NOT EXISTS uploads (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255),
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );'
];

foreach ($tables as $query) {
    if (!$conn->query($query)) {
        echo "Error creating table: " . $conn->error;
    }
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csv_file'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["csv_file"]["name"]);
    
    if (move_uploaded_file($_FILES["csv_file"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["csv_file"]["name"])) . " has been uploaded.";

        if (($open = fopen($target_file, "r")) !== FALSE) {
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                $sql = "INSERT INTO uploads (filename) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", basename($_FILES["csv_file"]["name"]));
                $stmt->execute();
            }

            fclose($open);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bedding Photography Showcase Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0e0e0;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .upload-form {
            margin-top: 20px;
        }

        input[type=file], input[type=submit] {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Upload CSV File</h1>
    <p>Upload a CSV file to showcase bedding photography.</p>

    <form class="upload-form" action="" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="csv_file" id="csv_file">
        <input type="submit" value="Upload" name="submit">
    </form>
</div>

</body>
</html>