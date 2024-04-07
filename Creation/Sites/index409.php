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

$sql = "CREATE TABLE IF NOT EXISTS languages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language_name VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Languages created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
preferred_language INT(6) UNSIGNED,
FOREIGN KEY (preferred_language) REFERENCES languages(id),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $preferred_language = $_POST['preferred_language'];

  $sql = "INSERT INTO users (username, email, preferred_language)
  VALUES ('$username', '$email', '$preferred_language')";

  if ($conn->query($sql) === TRUE) {
    $message = "New record created successfully";
  } else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Signup - Gardening Tools Website</title>
</head>
<body>

<h2>Signup Form</h2>
<p><?php echo $message; ?></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Username: <input type="text" name="username" required>
  <br><br>
  Email: <input type="email" name="email" required>
  <br><br>
  Preferred Language: <select name="preferred_language" required>
    <option value="1">English</option>
    <option value="2">Spanish</option>
    <option value="3">French</option>
  </select>
  <br><br>
  <input type="submit" name="submit" value="Signup">
</form>

</body>
</html>