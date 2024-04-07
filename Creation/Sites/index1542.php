<?php

// Connect to database
$servername = "db";
$username = "root";
$password = "root"; // It's generally not recommended to use root passwords like this in your code for security reasons.
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$createTableSql = "CREATE TABLE IF NOT EXISTS language_content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    language VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSql)) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $language = $conn->real_escape_string($_POST['language']);
    $content = $conn->real_escape_string($_POST['content']);

    $insertSql = "INSERT INTO language_content (language, content) VALUES ('$language', '$content')";

    if ($conn->query($insertSql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Language Learning Content</title>
</head>
<body>
    <h2>Add New Language Module</h2>
    <form method="post" action="">
        Language: <input type="text" name="language" required><br>
        Content:<br>
        <textarea name="content" rows="10" cols="30" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
// Close connection
$conn->close();
?>
