<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Create database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check database connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Create table for Uploaded Files if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploaded_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    analysis_result TEXT,
    reg_date TIMESTAMP
)";
if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload and analysis
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file is a actual text file
    if(isset($_POST["submit"])) {
        $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not a text file.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "txt" ) {
        echo "Sorry, only TXT files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $content = file_get_contents($target_file);
            // Perform sentiment analysis (placeholder for actual analysis)
            $analysis_result = "Positive"; // This should be replaced with actual sentiment analysis code
            $stmt = $conn->prepare("INSERT INTO uploaded_files (file_name, analysis_result) VALUES (?, ?)");
            $stmt->bind_param("ss", $basename, $analysis_result);
            $basename = basename($_FILES["fileToUpload"]["name"]);
            $stmt->execute();
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Document for Sentiment Analysis</title>
</head>
<body>
    <h2>Upload Document for Analysis</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select document to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>
<?php
$conn->close();
?>
