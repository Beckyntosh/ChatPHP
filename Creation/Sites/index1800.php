<?php
// Single-file PHP script for uploading text documents for sentiment analysis

// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for storing file uploads if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS uploaded_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
analysis_result TEXT,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

$message = '';

// Check if a file has been uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["textFile"])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["textFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Allow certain file formats
    $allowTypes = array('txt', 'doc', 'docx');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to the server
        if (move_uploaded_file($_FILES["textFile"]["tmp_name"], $targetFilePath)) {
            // Save file name in the database
            $insert = $conn->query("INSERT into uploaded_files (filename) VALUES ('".$fileName."')");
            if ($insert) {
                // File path to analyse
                $filePath = $targetDir . $fileName;
                
                // Placeholder for sentiment analysis result
                $analysisResult = "Positive"; // Implement sentiment analysis logic here
                
                // Update analysis result in the database
                $update = $conn->query("UPDATE uploaded_files SET analysis_result = '".$analysisResult."' WHERE filename = '".$fileName."'");
                
                $message = "File uploaded successfully.";
            } else {
                $message = "File upload failed, please try again.";
            } 
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    } else {
        $message = "Sorry, only TXT, DOC, & DOCX files are allowed.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Text File for Analysis</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }
        input[type=file], input[type=submit] {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Upload a Text Document for Sentiment Analysis</h2>
        <input type="file" name="textFile" id="textFile">
        <input type="submit" value="Upload File" name="submit">
        <p><?php echo $message; ?></p>
    </form>
</body>
</html>
