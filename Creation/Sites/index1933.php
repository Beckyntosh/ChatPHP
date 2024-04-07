<?php
// Simple Source Code Upload and Review System

// Database Configuration
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "my_database");

// Establishing Connection to Database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    reviewed TINYINT(1) DEFAULT 0,
    review_comments TEXT
)";

if (!$conn->query($createTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle File Upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["sourceCode"])) {
    $filename = $conn->real_escape_string($_FILES["sourceCode"]["name"]);
    $code = $conn->real_escape_string(file_get_contents($_FILES["sourceCode"]["tmp_name"]));
  
    $insertQuery = "INSERT INTO reviews (filename, code) VALUES ('$filename', '$code')";
  
    if ($conn->query($insertQuery)) {
        echo "<p>File uploaded successfully!</p>";
    } else {
        echo "<p>Failed to upload file.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Source Code Review System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        textarea { width: 100%; height: 200px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Upload Source Code for Review</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="sourceCode" required>
        <button type="submit">Upload</button>
    </form>
    
    <h2>Submitted Reviews</h2>
    <div>
        <?php
        $selectQuery = "SELECT id, filename, submitted_at, reviewed FROM reviews ORDER BY submitted_at DESC";
        $result = $conn->query($selectQuery);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<p>";
                echo "<strong>Filename:</strong> " . htmlspecialchars($row["filename"]) . "<br>";
                echo "<strong>Submitted At:</strong> " . $row["submitted_at"] . "<br>";
                echo "<strong>Reviewed:</strong> " . ($row["reviewed"] ? "Yes" : "No");
                echo "</p>";
            }
        } else {
            echo "No reviews submitted yet.";
        }
        ?>
    </div>
</div>
</body>
</html>

<?php
$conn->close();
?>
