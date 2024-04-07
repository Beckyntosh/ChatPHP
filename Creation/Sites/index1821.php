<?php
// Connect to the database
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

// Create table for storing uploaded files information if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS uploaded_texts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    sentiment VARCHAR(50),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Function to analyze the text sentiment (dummy for this example)
function analyzeSentiment($text) {
    // Placeholder for sentiment analysis logic
    // In a real scenario, this could involve calls to an external API or an NLP library
    return 'Positive'; // This is a dummy return value
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['textfile'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["textfile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if file is a textual file
    if($fileType != "txt" && $fileType != "doc" && $fileType != "docx") {
        echo "Sorry, only TXT, DOC & DOCX files are allowed.";
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["textfile"]["tmp_name"], $target_file)) {
            // Read the file content
            $content = file_get_contents($target_file);
            // Analyze the sentiment of the content
            $sentiment = analyzeSentiment($content);
            // Save file information and analysis result into the database
            $stmt = $conn->prepare("INSERT INTO uploaded_texts (file_name, sentiment) VALUES (?, ?)");
            $stmt->bind_param("ss", $target_file, $sentiment);
            if($stmt->execute()) {
                echo "The file ". htmlspecialchars( basename( $_FILES["textfile"]["name"])). " has been uploaded and analyzed as $sentiment.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload a Text File for Sentiment Analysis</title>
</head>
<body>
    <h2>Upload a Text File for Sentiment Analysis</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="textfile" id="textfile">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>
