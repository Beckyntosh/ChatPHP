<?php
// Database configuration
define('DB_HOST', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for uploads if it doesn't exist
$table = "CREATE TABLE IF NOT EXISTS vector_uploads (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    file_name VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($table)) {
    die("Error creating table: " . $conn->error);
}

// File upload logic
$uploadStatus = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["vectorFile"])) {
        $targetDirectory = "uploads/";
        $fileName = basename($_FILES["vectorFile"]["name"]);
        $targetFilePath = $targetDirectory . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('ai', 'eps', 'svg', 'pdf');
        if (in_array(strtolower($fileType), $allowTypes)) {
            // Upload file to the server
            if (move_uploaded_file($_FILES["vectorFile"]["tmp_name"], $targetFilePath)) {
                // Insert file info into the database
                $insert = $conn->query("INSERT INTO vector_uploads (file_name) VALUES ('$fileName')");
                if ($insert) {
                    $uploadStatus = "The file has been uploaded successfully.";
                } else {
                    $uploadStatus = "File upload failed, please try again.";
                }
            } else {
                $uploadStatus = "Sorry, there was an error uploading your file.";
            }
        } else {
            $uploadStatus = "Sorry, only AI, EPS, SVG, & PDF files are allowed to upload.";
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vector File Upload for Design Sharing</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 30px auto; }
        .upload-section { margin-top: 20px; }
        .status { margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Company Logo</h2>
        <form action="" method="post" enctype="multipart/form-data" class="upload-form">
            <label for="vectorFile">Select Vector File (AI, EPS, SVG, PDF):</label>
            <input type="file" name="vectorFile" id="vectorFile" required>
            <input type="submit" value="Upload Logo" name="submit">
        </form>
        <div class="status">
            <?php echo $uploadStatus; ?>
        </div>
        <div class="upload-section">
            <h3>Uploaded Logos</h3>
            <?php
            // Display all uploaded files
            $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            $sql = "SELECT file_name FROM vector_uploads";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<p>" . $row["file_name"] . "</p>";
                }
            } else {
                echo "<p>No uploads found</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
