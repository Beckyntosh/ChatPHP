<?php
// Simple Vector File Upload and Sharing System for Gardening Tools Website

// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for storing file information if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS vector_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  die("Error creating table: " . $conn->error);
}

// Check if a file was uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["vectorFile"])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["vectorFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('svg', 'ai', 'eps', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to the server
        if (move_uploaded_file($_FILES["vectorFile"]["tmp_name"], $targetFilePath)) {
            // Insert file info into the database
            $insert = $conn->query("INSERT into vector_files (file_name) VALUES ('".$fileName."')");
            if ($insert) {
                $statusMsg = "The file ".$fileName. " has been uploaded.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            } 
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = 'Sorry, only SVG, AI, EPS, & PDF files are allowed to upload.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vector File Upload for Gardening Tools</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #a6f1a6; color: #333; }
        .container { max-width: 500px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 10px; }
        input[type="file"] { margin-bottom: 20px; }
        .btn { background-color: #4CAF50; color: #fff; padding: 10px 20px; border: none; cursor: pointer; }
        .btn:hover { background-color: #45a049; }
        .msg { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Vector File</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="vectorFile">Select file to upload:</label>
            <input type="file" name="vectorFile" id="vectorFile">
            <input type="submit" value="Upload" name="submit" class="btn">
        </form>
        <?php if (isset($statusMsg)) { ?>
            <p class="msg"><?php echo $statusMsg; ?></p>
        <?php } ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>