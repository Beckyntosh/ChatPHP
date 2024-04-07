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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS PrivacySettings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
profile_visibility BOOLEAN NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table PrivacySettings created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $profile_visibility = $_POST["profile_visibility"] == "true" ? 1 : 0;

    // Insert or Update Privacy Settings
    $stmt = $conn->prepare("INSERT INTO PrivacySettings (user_id, profile_visibility) VALUES (?, ?) ON DUPLICATE KEY UPDATE profile_visibility = ?");
    $stmt->bind_param("iii", $user_id, $profile_visibility, $profile_visibility);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Furniture Website - Privacy Settings</title>
</head>
<body>
<h2>Privacy Settings</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="user_id">User ID:</label><br>
    <input type="number" id="user_id" name="user_id" required><br>
    <label for="profile_visibility">Profile Visibility:</label><br>
    <select name="profile_visibility" id="profile_visibility" required>
        <option value="true">Visible</option>
        <option value="false">Hidden</option>
    </select><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
