<?php

// Variables for database connection
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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["textFile"]) && $_FILES["textFile"]["error"] == 0) {
        $filename = $_FILES["textFile"]["name"];
        $filetype = $_FILES["textFile"]["type"];
        $filesize = $_FILES["textFile"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if ($ext !== "txt") {
            die("Error: Please upload a TXT file.");
        }
    
        // Check file size
        if ($filesize > 500000) {
            die("Error: File size is too large.");
        }
    
        // Read the file content
        $fileContent = file_get_contents($_FILES["textFile"]["tmp_name"]);

        // TODO: Implement actual content analysis and summary generation logic here
        $summary = substr($fileContent, 0, 100) . "..."; // Placeholder summary logic
        
        // SQL to insert file content and summary into database
        $sql = "INSERT INTO text_files (filename, content, summary) VALUES (?, ?, ?)";
        
        // Prepare and bind
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $filename, $fileContent, $summary);
        
        // Execute
        if ($stmt->execute()) {
            echo "File uploaded and analyzed successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $_FILES["textFile"]["error"];
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload for Content Analysis</title>
</head>
<body>

<h2>Upload Text File for Analysis</h2>

<form action="index.php" method="post" enctype="multipart/form-data">
    Select Text File to Upload:
    <input type="file" name="textFile" id="textFile">
    <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>