<?php

// Constants for database connection
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for code submissions if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS code_reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  feature_name VARCHAR(255) NOT NULL,
  code TEXT NOT NULL,
  submitted_by VARCHAR(255),
  submission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if (!$conn->query($createTable)) {
    die("Error creating table: " . $conn->error);
}

// Handling file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["sourceCode"])) {
    $featureName = $conn->real_escape_string($_POST['featureName']);
    $submittedBy = $conn->real_escape_string($_POST['submittedBy']);
    $sourceCode = file_get_contents($_FILES['sourceCode']['tmp_name']);
    $sourceCode = $conn->real_escape_string($sourceCode);

    $sql = "INSERT INTO code_reviews (feature_name, code, submitted_by) VALUES ('$featureName', '$sourceCode', '$submittedBy')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Code submitted successfully for review.</p>";
    } else {
        echo "<p>Error submitting code for review: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Code for Review</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { margin: 20px; max-width: 600px; }
        .form-control { margin-bottom: 10px; }
        .form-control label { display: block; font-weight: bold; }
        .form-control input, .form-control textarea, .form-control button { width: 100%; padding: 10px; }
        .form-control textarea { height: 200px; }
    </style>
</head>
<body>
    <h2>Submit Feature X Source Code for Review</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-control">
            <label for="featureName">Feature Name</label>
            <input type="text" id="featureName" name="featureName" required>
        </div>
        <div class="form-control">
            <label for="submittedBy">Submitted By</label>
            <input type="text" id="submittedBy" name="submittedBy" required>
        </div>
        <div class="form-control">
            <label for="sourceCode">Source Code File (.txt only)</label>
            <input type="file" id="sourceCode" name="sourceCode" accept=".txt" required>
        </div>
        <div class="form-control">
            <button type="submit">Submit for Review</button>
        </div>
    </form>
Optional: Implement code to fetch and display submissions for review
</body>
</html>
