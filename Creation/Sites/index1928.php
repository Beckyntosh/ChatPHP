<?php
// Establish database connection
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
    creator_name VARCHAR(30) NOT NULL,
    feature_name VARCHAR(50),
    code TEXT NOT NULL,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Upload feature code
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["upload"])) {
    $creator_name = $_POST["creator_name"];
    $feature_name = $_POST["feature_name"];
    $code = $_POST["code"];

    $stmt = $conn->prepare("INSERT INTO code_reviews (creator_name, feature_name, code) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $creator_name, $feature_name, $code);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Review Upload System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 20px; }
        .input-group { margin-bottom: 10px; }
        .input-group label { display: block; }
        .input-group input, .input-group textarea { width: 100%; }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload Source Code for Review</h2>
    <form action="" method="post">
        <div class="input-group">
            <label for="creator_name">Creator Name:</label>
            <input type="text" id="creator_name" name="creator_name" required>
        </div>
        <div class="input-group">
            <label for="feature_name">Feature Name:</label>
            <input type="text" id="feature_name" name="feature_name" required>
        </div>
        <div class="input-group">
            <label for="code">Source Code:</label>
            <textarea id="code" name="code" rows="10" required></textarea>
        </div>
        <button type="submit" name="upload">Upload Code</button>
    </form>
</div>
</body>
</html>
