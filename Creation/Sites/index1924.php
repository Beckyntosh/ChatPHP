<?php
// Simple and minimalistic example for educational purposes only.

$mysql_host = 'db';
$mysql_username = 'root';
$mysql_password = 'root';
$mysql_database = 'my_database';

// Create connection
$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for storing code reviews if not exists
$createTableQuery = "CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    review TEXT,
    reviewed_by VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableQuery)) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
$title = $reviewedBy = $review = '';
$code = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upload'])) {
    $title = $_POST['title'];
    $code = $_POST['code'];
    $insertQuery = $conn->prepare("INSERT INTO code_reviews (title, code) VALUES (?, ?)");
    $insertQuery->bind_param("ss", $title, $code);
    if (!$insertQuery->execute()) {
        die("Error uploading code: " . $conn->error);
    }
    echo "<p>Code uploaded successfully for review.</p>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Code Review Upload</title>
</head>

<body>
    <h2>Upload Source Code for Review</h2>
    <form action="" method="post">
        <label for="title">Feature Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="code">Source Code:</label><br>
        <textarea id="code" name="code" rows="10" cols="50" required></textarea><br>
        <input type="submit" name="upload" value="Upload">
    </form>

    <h2>Uploaded Code Reviews</h2>
    <?php
    $selectQuery = "SELECT * FROM code_reviews ORDER BY created_at DESC";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>" . htmlspecialchars($row['title']) . "</strong> - <em>uploaded on " . $row['created_at'] . "</em></p>";
            echo "<pre>" . htmlspecialchars($row['code']) . "</pre>";
            if (!empty($row['review'])) {
                echo "<p><strong>Review by " . htmlspecialchars($row['reviewed_by']) . ":</strong> " . htmlspecialchars($row['review']) . "</p>";
            }
        }
    } else {
        echo "<p>No code reviews uploaded yet.</p>";
    }
    $conn->close();
    ?>
</body>

</html>
