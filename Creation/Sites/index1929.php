<?php
// Database Connection
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for code uploads if not exists
$sql = "CREATE TABLE IF NOT EXISTS code_reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
code TEXT NOT NULL,
review TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle Form Submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $code = $conn->real_escape_string($_POST['code']);
    
    $sql = "INSERT INTO code_reviews (title, code) VALUES ('$title', '$code')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // redirect to prevent resubmission
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Code Review System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        form { margin-top: 20px; }
        textarea { width: 100%; height: 120px; }
        input, textarea { margin-top: 10px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Upload Code for Review</h1>
    <form method="POST" action="">
        <label for="title">Feature Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="code">Source Code:</label><br>
        <textarea id="code" name="code" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
    <?php
    $sql = "SELECT id, title, review FROM code_reviews ORDER BY created_at DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<h2>Submitted Reviews</h2>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div><strong>Title:</strong> " . $row["title"]. " - <strong>Review:</strong> " . $row["review"]. "</div><br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</div>
</body>
</html>
