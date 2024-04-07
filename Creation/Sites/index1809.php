<?php
// Define MySQL connection data
$MYSQL_HOST = 'db';
$MYSQL_USER = 'root';
$MYSQL_PASSWORD = 'root';
$MYSQL_DATABASE = 'my_database';

// Create connection
$conn = new mysqli($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASSWORD, $MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for uploads if it doesn't exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS text_analysis_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    sentiment VARCHAR(20)
)";
if (!$conn->query($createTableSQL)) {
    die("Error creating table: " . $conn->error);
}

// Handle File Upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['textFile'])) {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['textFile']['name']);

    if (move_uploaded_file($_FILES['textFile']['tmp_name'], $uploadFile)) {
        // Mock sentiment analysis result
        $sentiment = rand(0, 1) ? 'Positive' : 'Negative';
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO text_analysis_uploads (filename, sentiment) VALUES (?, ?)");
        $stmt->bind_param("ss", $uploadFile, $sentiment);
        $stmt->execute();
        echo "File uploaded and analyzed successfully.";
    } else {
        echo "File upload failed.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Text File Upload for Content Analysis</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f4e9d8;
            color: #3a3b3c;
        }
        .container {
            padding: 20px;
            max-width: 600px;
            margin: auto;
            border: 1px solid #b1a296;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .input-group {
            margin-bottom: 10px;
        }
        input[type=file] {
            font: inherit;
            padding: 5px;
        }
        input[type=submit] {
            background-color: #8c7b75;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type=submit]:hover {
            background-color: #6f635b;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload a Text File for Sentiment Analysis</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <input type="file" name="textFile" required>
        </div>
        <div class="input-group">
            <input type="submit" value="Upload File">
        </div>
    </form>
</div>
</body>
</html>
