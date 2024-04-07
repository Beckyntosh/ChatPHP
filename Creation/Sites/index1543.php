<?php
// Simple error reporting for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Simple connection to database
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS language_content (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
module_name VARCHAR(50) NOT NULL,
vocabulary TEXT NOT NULL,
creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists

} else {
    echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["module_name"]) && isset($_POST["vocabulary"])) {
    $module_name = $_POST["module_name"];
    $vocabulary = $_POST["vocabulary"];

    // Prepare statement to insert new module
    $stmt = $conn->prepare("INSERT INTO language_content (module_name, vocabulary) VALUES (?, ?)");
    $stmt->bind_param("ss", $module_name, $vocabulary);

    if ($stmt->execute()) {
        echo "New module created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Spanish for beginners - Vocabulary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Vocabulary to "Spanish for beginners"</h2>
        <form action="" method="post">
            <label for="module_name">Module Name:</label>
            <input type="text" id="module_name" name="module_name" placeholder="Module name..." required>

            <label for="vocabulary">Vocabulary (JSON Format):</label>
            <textarea id="vocabulary" name="vocabulary" placeholder='{"hello": "hola", "wine": "vino"}' required></textarea>

            <input type="submit" value="Create Module">
        </form>
    </div>
</body>
</html>
