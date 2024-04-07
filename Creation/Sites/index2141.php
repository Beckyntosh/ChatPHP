<?php
// Connect to database
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

// Create table for user preferences if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS UserPreferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userId VARCHAR(30) NOT NULL,
homepageLayout VARCHAR(50),
theme VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table UserPreferences created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Function to update user preferences
function updateUserPreferences($userId, $homepageLayout, $theme, $conn) {
  $stmt = $conn->prepare("INSERT INTO UserPreferences (userId, homepageLayout, theme) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE homepageLayout=?, theme=?");
  $stmt->bind_param("sssss", $userId, $homepageLayout, $theme, $homepageLayout, $theme);
  $stmt->execute();
  $stmt->close();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userId = htmlspecialchars($_POST["userId"]);
  $homepageLayout = htmlspecialchars($_POST["homepageLayout"]);
  $theme = htmlspecialchars($_POST["theme"]);
  
  updateUserPreferences($userId, $homepageLayout, $theme, $conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Preferences</title>
</head>
<body>
<h1>Set Your Preferences</h1>
<form method="post">
    <label for="userId">User ID:</label><br>
    <input type="text" id="userId" name="userId"><br>
    <label for="homepageLayout">Homepage Layout:</label><br>
    <select name="homepageLayout" id="homepageLayout">
        <option value="standard">Standard</option>
        <option value="compact">Compact</option>
        <option value="detailed">Detailed</option>
    </select><br>
    <label for="theme">Theme:</label><br>
    <select name="theme" id="theme">
        <option value="light">Light</option>
        <option value="dark">Dark</option>
        <option value="mindbending">Mind-Bending</option>
    </select><br><br>
    <input type="submit" value="Save Preferences">
</form>
</body>
</html>

<?php
$conn->close();
?>
