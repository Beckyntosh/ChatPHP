<?php
// Define connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Establish connection with the database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create table for uploaded audios if it doesn't exist
try {
    $sql = "CREATE TABLE IF NOT EXISTS audios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        file_name VARCHAR(255) NOT NULL,
        transcription TEXT,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
} catch(PDOException $e){
    die("ERROR: Could not execute $sql. " . $e->getMessage());
}

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["audioFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["audioFile"]["name"]);
    $audioFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is an audio file
    if($audioFileType != "mp3" && $audioFileType != "wav" && $audioFileType != "ogg") {
        echo "Sorry, only MP3, WAV & OGG files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file)) {
            // Insert file info into database
            try {
                $sql = "INSERT INTO audios (file_name) VALUES (:file_name)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':file_name', $target_file);
                $stmt->execute();
                
                echo "The file ". htmlspecialchars(basename($_FILES["audioFile"]["name"])). " has been uploaded.";
                // Here you would call your transcription service to handle the uploaded file
                
            } catch(PDOException $e) {
                die("ERROR: Could not able to execute $sql. " . $e->getMessage());
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Audio for Transcription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        form {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
        }
        input[type=file] {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <h2>Upload Audio File</h2>
        <input type="file" name="audioFile" required>
        <input type="submit" value="Upload Audio" name="submit">
    </form>
</body>
</html>