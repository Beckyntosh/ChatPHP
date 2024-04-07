<?php 

// Assuming this PHP code is saved as index.php in the web root directory

// Database credentials
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

// Create table for code uploads if it doesn't exist
$codeUploadsTable = "CREATE TABLE IF NOT EXISTS code_uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
creatorName VARCHAR(30) NOT NULL,
fileName VARCHAR(50),
code LONGTEXT,
uploadTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($codeUploadsTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["sourceCode"])) {
    $creatorName = $_POST["creatorName"];
    $fileName = basename($_FILES["sourceCode"]["name"]);
    $fileContent = file_get_contents($_FILES["sourceCode"]["tmp_name"]);
    
    // sanitize file content
    $fileContent = $conn->real_escape_string($fileContent);

    $sql = "INSERT INTO code_uploads (creatorName, fileName, code) VALUES ('$creatorName', '$fileName', '$fileContent')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>File uploaded successfully.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Source Code for Review</title>
</head>
<body>

<h2>Source Code Upload for Review</h2>
<form action="index.php" method="post" enctype="multipart/form-data">
    <label for="creatorName">Creator Name:</label>
    <input type="text" id="creatorName" name="creatorName" required><br><br>
    <label for="sourceCode">Upload Source Code:</label>
    <input type="file" id="sourceCode" name="sourceCode" accept=".php,.js" required><br><br>
    <input type="submit" value="Upload Code">
</form>

</body>
</html>
