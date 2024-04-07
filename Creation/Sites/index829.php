<?php

// Display errors for development
ini_set('display_errors', 1);
error_reporting(E_ALL);

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

// Create tables if they do not exist
$tablesSql = [
    "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
    );",
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    );",
    "CREATE TABLE IF NOT EXISTS voice_recordings (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        file_path VARCHAR(255),
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );"
];

foreach ($tablesSql as $sql) {
    if (!$conn->query($sql)) {
        echo "Error creating table: " . $conn->error;
    }
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['voiceRecording'])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["voiceRecording"]["name"]);
    if (move_uploaded_file($_FILES["voiceRecording"]["tmp_name"], $targetFile)) {
        // Assume user_id is 1 for the purpose of this example
        $userId = 1;
        $insertSql = "INSERT INTO voice_recordings (user_id, file_path) VALUES (?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("is", $userId, $targetFile);
        if ($stmt->execute()) {
            echo "The file " . htmlspecialchars(basename($_FILES["voiceRecording"]["name"])) . " has been uploaded.";
        } else {
            echo "There was an error uploading your file.";
        }
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Digital Dreamscape: Skateboard Directory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #282a36;
            color: #f8f8f2;
        }
        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #6272a4;
            color: #f8f8f2;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #373844 1px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
            padding-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #44475a;
            color: #f8f8f2;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Digital Dreamscape Skateboard Directory</h1>
        </div>
    </header>

    <div class="container">
        <h2>Upload your skateboarding trick voice description</h2>
        <form action="" method="post" enctype="multipart/form-data">
            Select voice recording to upload:
            <input type="file" name="voiceRecording" id="voiceRecording">
            <input type="submit" value="Upload Voice Recording" name="submit">
        </form>
    </div>
</body>
</html>