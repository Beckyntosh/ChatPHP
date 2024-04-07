<?php
// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    // Create table if it does not exist
    $sql = "CREATE TABLE IF NOT EXISTS SentimentAnalysis (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fileName VARCHAR(255) NOT NULL,
        sentiment TEXT,
        uploadTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if (!$conn->query($sql) === TRUE) {
        die("Error creating table: " . $conn->error);
    }

    // Check if file was uploaded
    if (isset($_FILES['textFile']['name']) && $_FILES['textFile']['error'] == 0) {
        // Save the file to the server
        $filePath = 'uploads/' . basename($_FILES['textFile']['name']);
        
        if (move_uploaded_file($_FILES['textFile']['tmp_name'], $filePath)) {
            // File is valid and was successfully uploaded
            // TODO: Analyze the content of the file for sentiment here (as a placeholder, 'Positive' sentiment is used)
            $sentiment = 'Positive'; // Placeholder for sentiment result
            
            // Insert file information into the database
            $stmt = $conn->prepare("INSERT INTO SentimentAnalysis (fileName, sentiment) VALUES (?, ?)");
            $stmt->bind_param("ss", $filePath, $sentiment);
            
            if ($stmt->execute()) {
                echo "File uploaded and sentiment analysis saved successfully.";
            } else {
                echo "Failed to save file information.";
            }
        } else {
            echo "File upload failed.";
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Text File for Sentiment Analysis</title>
</head>
<body>

<h2>Text File Upload for Sentiment Analysis</h2>

<form action="" method="post" enctype="multipart/form-data">
    Select a text file to upload:
    <input type="file" name="textFile" id="textFile">
    <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>
