<?php
// Connect to the database
define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_DB', 'my_database');
$servername = "db";
$username = "root";
$password = MYSQL_ROOT_PSWD;
$dbname = MYSQL_DB;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for user account linking if not exists
$createTable = "CREATE TABLE IF NOT EXISTS user_social_accounts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    social_media VARCHAR(30) NOT NULL,
    social_id VARCHAR(100) NOT NULL,
    UNIQUE KEY unique_social (user_id, social_media),
    FOREIGN KEY (user_id) REFERENCES users(id)
    )";

if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "link") {
    $userId = $_POST["user_id"]; // Assuming getting user ID from your session or authentication
    $socialMedia = $_POST["social_media"]; 
    $socialId = $_POST["social_id"]; 

    $stmt = $conn->prepare("INSERT INTO user_social_accounts (user_id, social_media, social_id) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $userId, $socialMedia, $socialId);

    if ($stmt->execute()) {
        echo "Account linked successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Link Social Media Account</title>
    <style>
        body {
            background-color: #333;
            color: #ddd;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: auto;
            margin-top: 100px;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Link Social Media Account</h2>
        <form method="POST" action="">
            <input type="hidden" name="action" value="link">
            <input type="text" name="user_id" placeholder="User ID (For Demo)">
            <input type="text" name="social_media" placeholder="Social Media (Facebook)">
            <input type="text" name="social_id" placeholder="Social Media ID">
            <input type="submit" value="Link Account">
        </form>
    </div>
</body>
</html>