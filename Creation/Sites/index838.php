<?php
// Create connection
$conn = new mysqli("db", "root", "root", "my_database");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Run initial SQL
$initSql = file_get_contents('init.sql');
if (!$conn->multi_query($initSql)) {
    echo "Multi query failed: (" . $conn->errno . ") " . $conn->error;
}

do {
    $conn->use_result();
} while ($conn->more_results() && $conn->next_result());

// Check if folders table exists, if not create
$tableExists = $conn->query("SHOW TABLES LIKE 'folders'");
if(!$tableExists || $tableExists->num_rows == 0) {
    $createFoldersTable = "CREATE TABLE IF NOT EXISTS folders (
                                id INT AUTO_INCREMENT PRIMARY KEY,
                                name VARCHAR(255) UNIQUE NOT NULL
                            );";
    if (!$conn->query($createFoldersTable)) {
        echo "Error creating table: " . $conn->error;
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["folderName"])) {
    $folderName = $conn->real_escape_string($_POST["folderName"]);
    $insertFolder = "INSERT INTO folders (name) VALUES ('$folderName')";
    
    if ($conn->query($insertFolder)) {
        echo "Folder created successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Adventure Awaits - Create Folder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e6d6;
            color: #333;
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
        .form-input {
            margin: 20px 0;
        }
        input[type="text"], button {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #8c704c;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #755948;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Adventure Awaits - Create a New Folder</h1>
    <form action="" method="post">
        <div class="form-input">
            <label for="folderName">Folder Name:</label>
            <input type="text" id="folderName" name="folderName" required>
        </div>
        <button type="submit">Create Folder</button>
    </form>
</div>
</body>
</html>