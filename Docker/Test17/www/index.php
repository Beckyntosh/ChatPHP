// PARAMETERS: Function: Language Preference Selection during Signup: create an example feature for language preference selection during signup. Example: User selects their preferred interface language during account creation Product: Sunglasses Style: energetic
<?php
// Connection variables
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

// Create users table with language preference if not exists
$usersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
preferred_language VARCHAR(5) DEFAULT 'en',
reg_date TIMESTAMP
)";

if ($conn->query($usersTable) === TRUE) {
  echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect value of input field
  $username = $_POST['username'];
  $email = $_POST['email'];
  $preferred_language = $_POST['preferred_language'];

  $sql = "INSERT INTO users (username, email, preferred_language)
  VALUES ('$username', '$email', '$preferred_language')";

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
    <title>Signup - Sunglass Store</title>
</head>
<body style="background-color: #FFD700; font-family: Arial, sans-serif;">
    <h2 style="color: #333;">Signup To Our Sunglasses Store</h2>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="preferred_language">Preferred Language:</label><br>
        <select name="preferred_language" id="preferred_language">
            <option value="en">English</option>
            <option value="es">Spanish</option>
            <option value="fr">French</option>
            <option value="de">German</option>
        </select><br><br>
        <input type="submit" value="Signup">
    </form>
</body>
</html>
