<?php
// Quick setup for error reporting, useful for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// MySQL Connection Setup
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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  language VARCHAR(10) NOT NULL,
  reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  die("Error creating table: " . $conn->error);
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $language = $_POST['language'];

  $stmt = $conn->prepare("INSERT INTO users (username, email, language) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $email, $language);

  if ($stmt->execute() === TRUE) {
    echo "New account created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Signup Form</title>
</head>
<body>

<h2>Signup Form</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Username: <input type="text" name="username" required>
  <br><br>
  Email: <input type="text" name="email" required>
  <br><br>
  Language Preference: <select name="language" required>
    <option value="en">English</option>
    <option value="es">Español</option>
    <option value="fr">Français</option>
    // Add more languages as per requirement
  </select>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
