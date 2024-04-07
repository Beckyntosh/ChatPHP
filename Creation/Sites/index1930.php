<?php

// Simple code review application for collaborative code review.

// Database connection parameters. Assuming a MySQL database.
define('DB_SERVERNAME', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    feature_name VARCHAR(255) NOT NULL,
    source_code TEXT NOT NULL,
    reviewer_comments TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload'])) {
    $featureName = $conn->real_escape_string($_POST['featureName']);
    $sourceCode = $conn->real_escape_string(file_get_contents($_FILES['sourceCode']['tmp_name']));

    $sql = "INSERT INTO code_reviews (feature_name, source_code) VALUES ('$featureName', '$sourceCode')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Code uploaded successfully!</p>";
    } else {
        echo "<p>Error uploading code: " . $conn->error . "</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Review System</title>
</head>
<body>

<h1>Upload Source Code for Feature X</h1>

<form action="" method="post" enctype="multipart/form-data">
    <label for="featureName">Feature Name:</label>
    <input type="text" id="featureName" name="featureName" required><br><br>
    
    <label for="sourceCode">Source Code:</label>
    <input type="file" id="sourceCode" name="sourceCode" accept=".php,.html,.js,.css" required><br><br>
    
    <input type="submit" name="upload" value="Upload">
</form>

<h2>Submitted Codes for Review</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Feature Name</th>
        <th>Submitted At</th>
    </tr>
    <?php
    $sql = "SELECT id, feature_name, submitted_at FROM code_reviews ORDER BY submitted_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["feature_name"]."</td><td>".$row["submitted_at"]."</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No codes submitted yet</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$conn->close();
?>
