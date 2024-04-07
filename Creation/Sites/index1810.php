<?php
// DB configuration
$servername = "db";
$dbname = "my_database";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for uploads if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS document_analysis (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  fileName VARCHAR(255) NOT NULL,
  analysisResult TEXT,
  uploadTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// File upload and analysis
$message = '';
if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if file already exists
    if (file_exists($target_file)) {
        $message = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "txt" && $fileType != "doc" && $fileType != "docx" ) {
        $message = "Sorry, only TXT, DOC & DOCX files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message .= "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Analyze the text (dummy analysis for demo)
            $content = file_get_contents($target_file);
            $analysisResult = "Positive"; // Dummy analysis result

            // Save analysis result to database
            $stmt = $conn->prepare("INSERT INTO document_analysis (fileName, analysisResult) VALUES (?, ?)");
            $stmt->bind_param("ss", basename($_FILES["fileToUpload"]["name"]), $analysisResult);
            $stmt->execute();

            $message = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Document Sentiment Analysis</title>
</head>
<body>

<h2>Upload Document for Sentiment Analysis</h2>
<p><?php echo $message; ?></p>
<form action="" method="post" enctype="multipart/form-data">
  Select document to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Document" name="submit">
</form>

</body>
</html>
