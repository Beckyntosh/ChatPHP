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

// Create a table for legal documents if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS legal_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
content TEXT NOT NULL,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle document search
$searchResult = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $searchKeyword = $conn->real_escape_string($_POST['searchKeyword']);

    $sql = "SELECT * FROM legal_documents WHERE title LIKE '%$searchKeyword%' OR content LIKE '%$searchKeyword%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $searchResult .= '<div><h3>'.htmlspecialchars($row["title"]).'</h3><p>'.nl2br(htmlspecialchars($row["content"])).'</p></div>';
        }
    } else {
        $searchResult = "<p>No documents found.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Legal Documents Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            padding: 20px;
        }
        h1 {
            color: #0073e6;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], button {
            padding: 10px;
            margin: 5px 0;
        }
        div {
            background-color: #fff;
            padding: 15px;
            margin-top: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h1>Search Legal Documents</h1>
    <form method="post">
        <input type="text" name="searchKeyword" placeholder="Search by title or content">
        <button type="submit" name="search">Search</button>
    </form>
    <?= $searchResult ?>
</body>
</html>