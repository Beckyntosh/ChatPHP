<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Creating a table for storing text files info
$table = "CREATE TABLE IF NOT EXISTS uploaded_texts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    analysis_result TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($table)) {
    die("Error creating table: " . $conn->error);
}

$message = '';

// File upload and processing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["textFile"])) {
    $filename = $_FILES["textFile"]["name"];
    $fileTmpPath = $_FILES["textFile"]["tmp_name"];
    $uploadPath = dirname(__FILE__) . '/uploads/' . $filename;

    if (move_uploaded_file($fileTmpPath, $uploadPath)) {
        $content = file_get_contents($uploadPath);

        // Dummy sentiment analysis logic
        // Real-world applications should replace this with actual analysis code
        $analysisResult = (substr_count(strtolower($content), 'good') > substr_count(strtolower($content), 'bad')) ? 'Positive' : 'Negative';
        
        // Inserting file and analysis result into database
        $stmt = $conn->prepare("INSERT INTO uploaded_texts (filename, analysis_result) VALUES (?, ?)");
        $stmt->bind_param("ss", $filename, $analysisResult);
        $stmt->execute();
        $stmt->close();

        $message = "File successfully uploaded and analyzed: " . $analysisResult;
    } else {
        $message = "There was an error uploading the file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Text File for Sentiment Analysis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-weight: bold;
        }
        form {
            margin: 20px auto;
            width: 300px;
            padding: 20px;
            border: 1px solid #333;
        }
        input[type="file"] {
            margin-bottom: 10px;
        }
        input[type="submit"] {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="textFile">Upload a text file for analysis:</label><br>
        <input type="file" name="textFile" id="textFile" required><br>
        <input type="submit" value="Analyze Text">
    </form>
    <?php if (!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif; ?>
</body>
</html>
