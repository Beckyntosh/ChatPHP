<?php

// Database connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["document"])) {
    $filename = basename($_FILES["document"]["name"]);
    $fileType = pathinfo($filename, PATHINFO_EXTENSION);
    $allowedTypes = array('pdf', 'doc', 'docx');
    if (in_array($fileType, $allowedTypes)) {
        $tmp_name = $_FILES["document"]["tmp_name"];
        $newFilePath = 'uploads/' . $filename;
        // Ensure uploads directory is exist
        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }
        if(move_uploaded_file($tmp_name, $newFilePath)) {
            $sql = "INSERT INTO documents (filename) VALUES (?)";
            
            if($stmt = $mysqli->prepare($sql)){
                $stmt->bind_param("s", $param_filename);
                $param_filename = $filename;
                
                if($stmt->execute()){
                    echo '<script>alert("Document uploaded successfully!")</script>';
                } else {
                    echo '<script>alert("Something went wrong. Please try again later.")</script>';
                }
                $stmt->close();
            }
        } else {
            echo '<script>alert("Failed to upload document.")</script>';
        }
    } else {
        echo '<script>alert("Invalid file type. Only PDF, DOC, and DOCX are allowed.")</script>';
    }
}

// Create table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if(!$mysqli->query($createTable)) {
    echo "ERROR: Could not able to execute $createTable. " . $mysqli->error;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Legal Document for e-Signing</title>
</head>
<body>
    <h2>Upload Document for e-Signing</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="document">Choose document (PDF, DOC, DOCX):</label>
        <input type="file" id="document" name="document" required>
        <button type="submit">Upload Document</button>
    </form>
</body>
</html>

<?php
$mysqli->close();
?>
