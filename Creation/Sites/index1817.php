<?php
// Database Connection
define("MYSQL_ROOT_PSWD", "root");
define("MYSQL_DB", "my_database");
$servername = "db";
$username = "root";
$password = MYSQL_ROOT_PSWD;
$dbname = MYSQL_DB;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if table exists, if not create one
$tableCheckQuery = "SHOW TABLES LIKE 'content_analysis'";
$result = $conn->query($tableCheckQuery);
if ($result->num_rows == 0) {
    $createTable = "CREATE TABLE content_analysis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    sentiment VARCHAR(255) NOT NULL
    )";
    if ($conn->query($createTable) === TRUE) {
        echo "Table content_analysis created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["fileUpload"]["tmp_name"]) && $_FILES["fileUpload"]["tmp_name"] != "") {
        $filePath = $_FILES["fileUpload"]["tmp_name"];
        $filename = $_FILES["fileUpload"]["name"];

        // Read File
        $fileContent = file_get_contents($filePath);
        // Dummy sentiment analysis - replace with actual analysis logic
        $sentiment = (strlen($fileContent) % 2 == 0) ? "Positive" : "Negative";

        // Save to database
        $stmt = $conn->prepare("INSERT INTO content_analysis (filename, sentiment) VALUES (?, ?)");
        $stmt->bind_param("ss", $filename, $sentiment);
        if ($stmt->execute()) {
            $message = "File '$filename' analyzed successfully: Sentiment is $sentiment.";
        } else {
            $message = "Error: ". $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Document for Sentiment Analysis</title>
    <style>
        body{ font-family: Arial, sans-serif; }
        .container { margin: 50px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload a Text File for Sentiment Analysis</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="fileUpload" id="fileUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>
    <p><?php echo $message; ?></p>
</div>

</body>
</html>
