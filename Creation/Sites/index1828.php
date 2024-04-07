<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    // Create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create table if it does not exist
    $sql = "CREATE TABLE IF NOT EXISTS audio_transcriptions (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        file_name VARCHAR(255) NOT NULL,
        transcription TEXT,
        upload_date TIMESTAMP
    )";

    if (!$conn->query($sql) === TRUE) {
        echo "Error creating table: " . $conn->error;
    }

    // Check if file was uploaded without errors
    if (isset($_FILES["audioFile"]) && $_FILES["audioFile"]["error"] == 0) {
        // Save the audio file to the server
        $fileName = $_FILES["audioFile"]["name"];
        $fileTmpName = $_FILES["audioFile"]["tmp_name"];
        $uploadPath = "uploads/" . basename($fileName);
        
        if (move_uploaded_file($fileTmpName, $uploadPath)) {
            // Insert file information into the database
            $stmt = $conn->prepare("INSERT INTO audio_transcriptions (file_name, upload_date) VALUES (?, NOW())");
            $stmt->bind_param("s", $fileName);
            if ($stmt->execute()) {
                echo "The file has been uploaded successfully.";
            } else {
                echo "Error uploading file.";
            }
            $stmt->close();
        } else {
            echo "Error saving file.";
        }
    } else {
        echo "Error: " . $_FILES["audioFile"]["error"];
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Upload Audio for Transcription</title>
</head>
<body>
    <h2>Upload a Lecture Recording for Transcription</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="audioFile">Select audio file:</label>
        <input type="file" name="audioFile" id="audioFile" required>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
