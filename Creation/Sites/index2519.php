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
$sql = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
language VARCHAR(10) DEFAULT 'en',
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Signup process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $language = $_POST['language'];

  $stmt = $conn->prepare("INSERT INTO Users (username, email, language) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $email, $language);

  if ($stmt->execute()) {
    echo "New record created successfully";
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
  <title>Signup Form</title>
</head>

<body>
  <h2>Signup Form</h2>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="language">Preferred Language:</label><br>
    <select name="language" id="language" required>
      <option value="en">English</option>
      <option value="fr">French</option>
      <option value="de">German</option>
      <option value="es">Spanish</option>
    </select><br><br>
    <input type="submit" value="Signup">
  </form>
</body>

</html>
