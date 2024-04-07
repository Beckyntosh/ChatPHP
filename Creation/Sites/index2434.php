<?php
// Connection to the database
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

// Create tables if they do not exist
$sql = "CREATE TABLE IF NOT EXISTS Users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(50) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Preferences (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  preference_type VARCHAR(50) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table Preferences created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = md5($_POST['password']); // Basic encryption, consider using password_hash in a real application
  $email = $_POST['email'];
  $preferences = $_POST['preferences'];

  $sql = "INSERT INTO Users (username, password, email) VALUES ('$username', '$password', '$email')";

  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    foreach($preferences as $preference) {
      $sql = "INSERT INTO Preferences (user_id, preference_type) VALUES ('$last_id', '$preference')";
      $conn->query($sql);
    }
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sign Up for Customized News Feed</title>
</head>
<body>

<h2>User Registration for Art Supplies News Feed</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Email: <input type="email" name="email"><br>
    Preferences:<br>
    <input type="checkbox" name="preferences[]" value="Painting"> Painting<br>
    <input type="checkbox" name="preferences[]" value="Drawing"> Drawing<br>
    <input type="checkbox" name="preferences[]" value="Sculpture"> Sculpture<br>
    <input type="checkbox" name="preferences[]" value="Photography"> Photography<br>
    <input type="submit" value="Register">
</form>

</body>
</html>
