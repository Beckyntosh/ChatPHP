<?php

// Connection Variables
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

// Create table for language modules if not exists
$sql = "CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_name VARCHAR(50),
    language VARCHAR(50),
    level VARCHAR(50),
    vocab_list TEXT,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $module_name = $_POST['module_name'];
    $language = $_POST['language'];
    $level = $_POST['level'];
    $vocab_list = $_POST['vocab_list'];

    $sql = "INSERT INTO language_modules (module_name, language, level, vocab_list)
    VALUES ('$module_name', '$language', '$level', '$vocab_list')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Language Module</title>
</head>
<body>
    <h2>Add Language Learning Module</h2>
    <form method="POST">
        Module Name: <input type="text" name="module_name" required><br>
        Language: <input type="text" name="language" required><br>
        Level: <input type="text" name="level" required><br>
        Vocabulary List (comma separated): <textarea name="vocab_list" required></textarea><br>
        <input type="submit">
    </form>
</body>
</html>
