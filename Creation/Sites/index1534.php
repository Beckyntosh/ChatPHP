<?php

// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists for storing file analysis
$sql = "CREATE TABLE IF NOT EXISTS file_analysis (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    analysis_result TEXT NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Function to analyze the content of the file
function analyzeContent($text) {
    // Implement sentiment analysis (dummy function for illustration)
    $positiveWords = ['excellent', 'good', 'great'];
    $negativeWords = ['bad', 'poor', 'terrible'];

    $positives = 0;
    $negatives = 0;

    $words = explode(' ', $text);

    foreach ($words as $word) {
        if (in_array(strtolower($word), $positiveWords)) {
            $positives++;
        } elseif (in_array(strtolower($word), $negativeWords)) {
            $negatives++;
        }
    }

    if ($positives > $negatives) {
        return "Positive";
    } elseif ($negatives > $positives) {
        return "Negative";
    } else {
        return "Neutral";
    }
}

// Handling file upload and analysis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["document"])) {
    $fileName = $_FILES["document"]["name"];
    $fileTmpName = $_FILES["document"]["tmp_name"];
    $fileContent = file_get_contents($fileTmpName);

    $analysis = analyzeContent($fileContent);

    // Save the result in the database
    $stmt = $conn->prepare("INSERT INTO file_analysis (file_name, analysis_result) VALUES (?, ?)");
    $stmt->bind_param("ss", $fileName, $analysis);
    $stmt->execute();
    $stmt->close();

    echo "<p>File uploaded successfully. Analysis Result: $analysis</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Document for Sentiment Analysis</title>
</head>
<body>
    <h2>Upload Document for Sentiment Analysis</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="document" required>
        <button type="submit">Upload and Analyze</button>
    </form>
</body>
</html>
