<?php
// Define MySQL connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Attempt MySQL server connection
$link = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt to create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS language_modules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    module_name VARCHAR(255) NOT NULL,
    language VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
)";

if(!$link->query($sql)){
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $moduleName = $_POST['moduleName'];
    $language = $_POST['language'];
    $content = $_POST['content'];

    $stmt = $link->prepare("INSERT INTO language_modules (module_name, language, content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $moduleName, $language, $content);
    $stmt->execute();

    echo "<p>Module created successfully!</p>";
}

// Disconnect from the database
$link->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Language Module</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
        input[type=submit] { background-color: #4CAF50; color: white; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add a New Language Module</h2>
        <form action="" method="post">
            <div>
                <input type="text" name="moduleName" placeholder="Module Name" required>
            </div>
            <div>
                <input type="text" name="language" placeholder="Language" required>
            </div>
            <div>
                <textarea name="content" placeholder="Content" rows="10" required></textarea>
            </div>
            <input type="submit" value="Create Module">
        </form>
    </div>
</body>
</html>
