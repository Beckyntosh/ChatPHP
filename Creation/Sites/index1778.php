<?php
// Connecting to the database
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

// Check if the table exists, if not, create it
$sql = "CREATE TABLE IF NOT EXISTS sentiment_analysis (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fileName VARCHAR(255) NOT NULL,
    analysisResult TEXT,
    uploadTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Check if a file is being uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["textFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["textFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "txt" && $fileType != "doc" && $fileType != "docx") {
        echo "Sorry, only TXT, DOC & DOCX files are allowed.<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["textFile"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["textFile"]["name"])). " has been uploaded.<br>";

            // Perform analysis here and get result (dummy result for demonstration)
            $analysisResult = "Positive"; // This should be replaced with actual sentiment analysis code

            // Insert file information and analysis result into the database
            $stmt = $conn->prepare("INSERT INTO sentiment_analysis (fileName, analysisResult) VALUES (?, ?)");
            $stmt->bind_param("ss", $basename, $analysisResult);
            $basename = basename($_FILES["textFile"]["name"]);

            if($stmt->execute()){
                echo "File uploaded and analyzed successfully";
            }else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload File for Sentiment Analysis</title>
</head>
<body>
<h2>Upload a text document for Sentiment Analysis</h2>
<form action="index.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="textFile" id="textFile">
    <input type="submit" value="Upload Document" name="submit">
</form>
</body>
</html>
