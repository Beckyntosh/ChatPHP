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

// Create table for user preferences if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS user_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
homepage_layout VARCHAR(30) NOT NULL,
theme VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table user_preferences created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle post request to save user preferences
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $homepage_layout = $_POST["homepage_layout"];
  $theme = $_POST["theme"];

  $sql = "INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES ('1', '$homepage_layout', '$theme')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>User Preferences</title>
</head>
<body style="font-family: Arial, sans-serif;">
<h2>Set Your Preferences</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <label for="homepage_layout">Choose Homepage Layout:</label>
  <select name="homepage_layout" id="homepage_layout">
    <option value="default">Default</option>
    <option value="mathematical">Mathematical</option>
    <option value="compact">Compact</option>
  </select>
  <br><br>
  <label for="theme">Choose Theme:</label>
  <select name="theme" id="theme">
    <option value="light">Light</option>
    <option value="dark">Dark</option>
    <option value="math_style">Math Style</option>
  </select>
  <br><br>
  <input type="submit" value="Save Preferences">
</form>

</body>
</html>
