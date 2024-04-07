<?php
// Connect to the Database
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

// Create language table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS language_preference (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  selected_language VARCHAR(50) NOT NULL,
  reg_date TIMESTAMP
)";
$conn->query($createTable);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["language"])) {
  $selectedLanguage = $_POST["language"];

  // Insert language preference into table
  $stmt = $conn->prepare("INSERT INTO language_preference (selected_language) VALUES (?)");
  $stmt->bind_param("s", $selectedLanguage);
  $stmt->execute();
  $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Language Selection</title>
</head>
<body>

<h2>Select Your Preferred Language</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <select name="language" required>
    <option value="English">English</option>
    <option value="Spanish">Spanish</option>
  </select>
  <input type="submit" value="Save Preference">
</form>

</body>
</html>
