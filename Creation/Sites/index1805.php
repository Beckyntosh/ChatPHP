<?php

// Database connection settings
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Check if table exists and create if not
$tableCheckQuery = "SHOW TABLES LIKE 'uploaded_texts'";
$result = $mysqli->query($tableCheckQuery);
if($result->num_rows == 0) {
    // Creating a new table for uploaded texts
    $tableCreationQuery = "CREATE TABLE uploaded_texts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        content LONGTEXT NOT NULL,
        analysis_result TEXT,
        upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if (!$mysqli->query($tableCreationQuery)) {
        die("ERROR: Could not create table. " . $mysqli->error);
    }
}

// Handling file upload and analysis
$uploadStatus = "";
$analysisResult = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["textFile"])) {
    $uploadDir = 'uploads/';
    $uploadFilePath = $uploadDir . basename($_FILES["textFile"]["name"]);
    
    // Saving the uploaded file
    if (move_uploaded_file($_FILES["textFile"]["tmp_name"], $uploadFilePath)) {
        $uploadStatus = "File successfully uploaded.";
        
        // Reading the file content
        $content = file_get_contents($uploadFilePath);
        
        // Here you should implement the sentiment analysis logic
        // As a placeholder, the "analysis" will just count the words
        $wordCount = str_word_count($content);
        $analysisResult = "Word count: " . $wordCount;

        // Inserting file info and analysis result into the database
        $stmt = $mysqli->prepare("INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $_FILES["textFile"]["name"], $content, $analysisResult);
        $stmt->execute();
    } else {
        $uploadStatus = "File upload failed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Text File for Analysis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }

        .upload-container {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 50%;
            margin-top: 50px;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="upload-container">
        <h2>Upload your document for Sentiment Analysis</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="textFile" required>
            <br>
            <input type="submit" value="Upload File">
        </form>

        <?php if ($uploadStatus): ?>
            <p><?php echo $uploadStatus; ?></p>
            <p><?php echo $analysisResult; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
