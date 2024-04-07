<?php
// Database Connection
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

// Create table for language modules if it does not exist
$languageModuleTable = "CREATE TABLE IF NOT EXISTS language_modules (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
language VARCHAR(30) NOT NULL,
content TEXT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($languageModuleTable) === TRUE) {
    //echo "Table 'language_modules' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form data for new language module creation
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $language = $_POST['language'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO language_modules (title, language, content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $language, $content);

    if ($stmt->execute() === TRUE) {
        //echo "New record created successfully";
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Language Learning Content</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f8ff; }
        .container { max-width: 600px; margin: 50px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        input[type=text], textarea { width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
        h2 { color: #2f4f4f; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Spanish for Beginners Module</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="title">Module Title</label>
        <input type="text" id="title" name="title" required>
        
        <label for="language">Language</label>
        <input type="text" id="language" name="language" value="Spanish" required>
        
        <label for="content">Content (Vocabulary list, phrases etc.)</label>
        <textarea id="content" name="content" required></textarea>
        
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
