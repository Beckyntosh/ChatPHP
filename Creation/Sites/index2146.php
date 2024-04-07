<?php
// Initialize session and check if user is logged in
session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

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

// Create table for user preferences if not exists
$sql = "CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) UNSIGNED NOT NULL,
    homepage_layout VARCHAR(50) NOT NULL,
    theme VARCHAR(50) NOT NULL,
    UNIQUE KEY unique_user (userid),
    FOREIGN KEY (userid) REFERENCES users(id) ON DELETE CASCADE
    )";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Update or insert user preferences
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_SESSION['userid'];
    $homepage_layout = $conn->real_escape_string($_POST['homepage_layout']);
    $theme = $conn->real_escape_string($_POST['theme']);

    $checkExist = "SELECT id FROM user_preferences WHERE userid = $userid";
    $result = $conn->query($checkExist);

    if ($result->num_rows > 0) {
        $sql = "UPDATE user_preferences SET homepage_layout='$homepage_layout', theme='$theme' WHERE userid=$userid";
    } else {
        $sql = "INSERT INTO user_preferences (userid, homepage_layout, theme) VALUES ('$userid', '$homepage_layout', '$theme')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Preferences updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Preferences</title>
</head>
<body>

<h2>Set Your Preferences</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="homepage_layout">Homepage Layout:</label>
  <select name="homepage_layout" id="homepage_layout">
    <option value="classic">Classic</option>
    <option value="modern">Modern</option>
  </select>
  <br><br>
  <label for="theme">Theme:</label>
  <select name="theme" id="theme">
    <option value="light">Light</option>
    <option value="dark">Dark</option>
  </select>
  <br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
