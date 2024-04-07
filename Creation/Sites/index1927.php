<?php

// Database connection
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

// Create table for code reviews if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS code_reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
code TEXT NOT NULL,
submitted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
status VARCHAR(10) NOT NULL DEFAULT 'pending'
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["sourceCode"])) {
    $title = $_POST['title'];
    $code = file_get_contents($_FILES['sourceCode']['tmp_name']);

    // Escape special characters in the file content
    $code = $conn->real_escape_string($code);
    
    $sql = "INSERT INTO code_reviews (title, code) VALUES ('$title', '$code')";

    if ($conn->query($sql) === TRUE) {
        echo "Code submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Source Code Upload for Review</title>
</head>
<body>
    <h2>Upload Source Code for Review</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Title: <input type="text" name="title" required><br><br>
        Select file to upload:
        <input type="file" name="sourceCode" required>
        <input type="submit" value="Upload Code" name="submit">
    </form>

    <h2>Submissions</h2>
    <?php
    $sql = "SELECT id, title, submitted_date, status FROM code_reviews";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Title</th><th>Date</th><th>Status</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["title"]."</td><td>".$row["submitted_date"]."</td><td>".$row["status"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>
