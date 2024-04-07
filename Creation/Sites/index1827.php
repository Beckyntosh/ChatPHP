<?php
$errorMsg = $successMsg = "";
$sentiments = "";

// Define database parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to create table if not exists
function createTableIfNeeded($conn) {
    $createTable = "CREATE TABLE IF NOT EXISTS uploaded_texts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        content LONGTEXT NOT NULL,
        analysis TEXT,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if (!$conn->query($createTable)) {
        die("Error creating table: " . $conn->error);
    }
}

createTableIfNeeded($conn);

function analyzeText($text) {
    // Placeholder for sentiment analysis - implement your analysis logic
    // This is a very basic implementation
    $positiveWords = ['good', 'great', 'excellent', 'happy'];
    $negativeWords = ['bad', 'sad', 'terrible', 'angry'];

    $positives = array_intersect(explode(' ', strtolower($text)), $positiveWords);
    $negatives = array_intersect(explode(' ', strtolower($text)), $negativeWords);

    if (count($positives) > count($negatives)) {
        return "Positive";
    } elseif (count($positives) < count($negatives)) {
        return "Negative";
    } else {
        return "Neutral";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['fileToUpload'])) {
        $filename = basename($_FILES['fileToUpload']['name']);
        $fileTmpName = $_FILES['fileToUpload']['tmp_name'];

        if (move_uploaded_file($fileTmpName, "uploads/" . $filename)) {
            // Read file content
            $content = file_get_contents("uploads/" . $filename);
            // Analyze text sentiment
            $analysisResult = analyzeText($content);

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO uploaded_texts (filename, content, analysis) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $filename, $content, $analysisResult);
            if ($stmt->execute()) {
                $successMsg = "File uploaded and analyzed successfully.";
                $sentiments = $analysisResult;
            } else {
                $errorMsg = "Error uploading file to database.";
            }
        } else {
            $errorMsg = "There was an error uploading your file.";
        }
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
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        .alert { padding: 15px; color: #721c24; background-color: #f8d7da; border-radius: 5px; margin-bottom: 20px; }
        .success { color: #155724; background-color: #d4edda; }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload a document for Sentiment Analysis</h2>
    <?php if ($errorMsg): ?><div class="alert"><?php echo $errorMsg; ?></div><?php endif; ?>
    <?php if ($successMsg): ?><div class="alert success"><?php echo $successMsg; ?><br>Analysis Result: <?php echo $sentiments; ?></div><?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <button type="submit">Upload File</button>
    </form>
</div>
</body>
</html>
