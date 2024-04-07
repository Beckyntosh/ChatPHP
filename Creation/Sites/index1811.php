<?php
// Define MySQL connection parameters
define("MYSQL_ROOT_PSWD", 'root');
define("MYSQL_DB", 'my_database');
define("SERVERNAME", 'db');

// Connect to MySQL database
$conn = new mysqli(SERVERNAME, 'root', MYSQL_ROOT_PSWD, MYSQL_DB);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['textFile'])) {
    $fileName = $_FILES['textFile']['name'];
    $fileTmpName = $_FILES['textFile']['tmp_name'];
    $fileType = $_FILES['textFile']['type'];

    // Check if the file is a text file
    if ($fileType === 'text/plain') {
        $content = file_get_contents($fileTmpName);
        
        // Perform sentiment analysis on the content, for simplicity, we'll simulate it
        // In a real scenario, you might integrate with a sentiment analysis API or library
        $sentimentResult = rand(0, 1) ? 'Positive' : 'Negative';

        // Save the result in the database
        $stmt = $conn->prepare("INSERT INTO sentiment_analysis (filename, sentiment) VALUES (?, ?)");
        $stmt->bind_param("ss", $fileName, $sentimentResult);
        $stmt->execute();

        echo "<div>File uploaded successfully. Sentiment: " . $sentimentResult . "</div>";
    } else {
        echo "<div>Only text files are allowed.</div>";
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skateboard Sentiment Analysis</title>
</head>
<body style="background-color:#f0db4f; color:#664d00; font-family:Arial, sans-serif; text-align:center;">
    <h1>Skateboard Text Upload for Sentiment Analysis</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="textFile">Upload a text file:</label>
        <input type="file" name="textFile" id="textFile" required>
        <button type="submit">Analyze Text</button>
    </form>
</body>
</html>

Note: This example simulates the sentiment analysis part for simplicity and is ready to be expanded with actual sentiment analysis logic or integration. Make sure your MySQL server is running, and you've created the required MySQL table before running this. For a complete working solution, additional PHP extensions for MySQL and file processing may need to be enabled or installed depending on your PHP setup. Additionally, comprehensive security and error handling measures (e.g., file size limit, type checking, database injection prevention) should be implemented for a production environment.