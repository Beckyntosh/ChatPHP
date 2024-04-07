<?php
// This code is a simplistic example and might not follow best security practices.
// Avoid using the root account for MySQL in a real application.
// Always sanitize and validate your inputs in production code.

$host = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Attempt to connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS UploadedTexts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    content LONGTEXT,
    sentiment VARCHAR(30),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sentimentAnalysisResult = "";

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["textFile"])) {
    // Perform sentiment analysis (Mock Function)
    $filePath = $_FILES["textFile"]["tmp_name"];
    $content = file_get_contents($filePath);
    // For the purpose of this example, we simply assume positive sentiment.
    $sentimentAnalysisResult = "Positive"; 

    // Save the content and analysis result into the database
    $stmt = $conn->prepare("INSERT INTO UploadedTexts (content, sentiment) VALUES (?, ?)");
    $stmt->bind_param("ss", $content, $sentimentAnalysisResult);
    $stmt->execute();

    echo "File uploaded successfully!";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bath Products Sentiment Analysis</title>
</head>
<body style="background-color: black; color: lime;">
    <h1>Upload a Text File for Sentiment Analysis</h1>
    <form action="" method="post" enctype="multipart/form-data">
        Select document to upload:
        <input type="file" name="textFile" id="textFile">
        <input type="submit" value="Upload File" name="submit">
    </form>

    <?php if ($sentimentAnalysisResult): ?>
        <h2>Sentiment Analysis Result: <?php echo $sentimentAnalysisResult; ?></h2>
    <?php endif; ?>
</body>
</html>
