<?php
// Simple collaborative code review system for a shoes website

// Database configurations
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

// Create table for code uploads if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    code TEXT NOT NULL,
    comment TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["sourceCode"])) {
    $title = htmlspecialchars($_POST['title']);
    $code = file_get_contents($_FILES['sourceCode']['tmp_name']);
    $escaped_code = $conn->real_escape_string($code);

    $sql = "INSERT INTO code_reviews (title, code) VALUES ('$title', '$escaped_code')";

    if ($conn->query($sql) === TRUE) {
        echo "Code uploaded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Review System</title>
</head>
<body>
    <h2>Upload Source Code for Review</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Title: <input type="text" name="title" required><br>
        Source Code: <input type="file" name="sourceCode" accept=".php,.js,.html" required><br>
        <input type="submit" value="Upload">
    </form>

    <h3>Uploaded Codes for Review</h3>
    <?php
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Fetch uploaded codes
    $sql = "SELECT id, title, upload_time FROM code_reviews ORDER BY upload_time DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div><strong>" . $row["title"]. "</strong> - " . $row["upload_time"]. "</div>";
        }
    } else {
        echo "No code reviews yet";
    }
    $conn->close();
    ?>
</body>
</html>
