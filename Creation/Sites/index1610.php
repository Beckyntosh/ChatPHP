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

// Create table for uploaded files if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploaded_texts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
content TEXT NOT NULL,
analysis_result TEXT,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Silent success
} else {
  echo "Error creating table: " . $conn->error;
}

function analyzeTextSentiment($text) {
    // A fake sentiment analysis function for this example
    // (should be replaced with actual analysis code or API call)
    if (strpos(strtolower($text), 'happy') !== false) {
        return "Positive";
    } elseif (strpos(strtolower($text), 'sad') !== false) {
        return "Negative";
    } else {
        return "Neutral";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["textFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["textFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($fileType != "txt") {
        echo "Sorry, only TXT files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["textFile"]["tmp_name"], $target_file)) {
            $content = file_get_contents($target_file);
            $analysisResult = analyzeTextSentiment($content);

            $stmt = $conn->prepare("INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $filename, $content, $analysisResult);
            $filename = basename($_FILES["textFile"]["name"]);

            if ($stmt->execute()) {
                echo "The file ". htmlspecialchars( basename( $_FILES["textFile"]["name"])). " has been uploaded and analyzed.";
            } else {
                echo "Error uploading and analyzing file.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Text File for Sentiment Analysis</title>
</head>
<body>
<h2>Upload Text Document for Sentiment Analysis</h2>
<form action="" method="post" enctype="multipart/form-data">
    Select text file to upload:
    <input type="file" name="textFile" id="fileToUpload">
    <input type="submit" value="Upload Text" name="submit">
</form>
</body>
</html>
