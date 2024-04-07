<?php
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

// SQL to create table for User Preferences
$sql = "CREATE TABLE IF NOT EXISTS user_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
favorite_genre VARCHAR(50),
notifications_enabled BOOLEAN,
registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table user_preferences created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'] ? mysqli_real_escape_string($conn, $_POST['user_id']) : '';
    $favoriteGenre = $_POST['favorite_genre'] ? mysqli_real_escape_string($conn, $_POST['favorite_genre']) : '';
    $notificationsEnabled = isset($_POST['notifications_enabled']) ? 1 : 0;
    
    $sql = "INSERT INTO user_preferences (user_id, favorite_genre, notifications_enabled)
    VALUES ('$userId', '$favoriteGenre', '$notificationsEnabled')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New user preference record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile Setup</title>
</head>
<body>
    <h2>Customize Your Profile</h2>
    <form action="" method="POST">
In a real project, generate or fetch dynamically
        <label for="favorite_genre">Favorite Genre:</label>
        <select name="favorite_genre" id="favorite_genre">
            <option value="Action">Action</option>
            <option value="Comedy">Comedy</option>
            <option value="Drama">Drama</option>
            <option value="Horror">Horror</option>
Add more options as needed
        </select><br/><br/>
        
        <label for="notifications_enabled">Enable Notifications:</label>
        <input type="checkbox" name="notifications_enabled" id="notifications_enabled" value="1"><br/><br/>
        
        <input type="submit" value="Save Preferences">
    </form>
</body>
</html>
