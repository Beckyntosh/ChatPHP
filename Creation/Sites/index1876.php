<?php

// Setting up connection variables
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

// SQL to create table for users if it does not exist
$sqlUserTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL, 
email VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sqlUserTable) === TRUE) {
  echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// SQL to create table for event registration if it does not exist
$sqlEventTable = "CREATE TABLE IF NOT EXISTS event_registration (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
user_id INT(6) UNSIGNED,
event_name VARCHAR(50) NOT NULL,
register_date TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sqlEventTable) === TRUE) {
  echo "Table Event Registration created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle user registration and event signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute() === TRUE) {
      echo "New account created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
  }
  
  if(isset($_POST['registerEvent'])) {
    $user_id = $_POST['user_id'];
    $event_name = $_POST['event_name'];
    
    $sql = "INSERT INTO event_registration (user_id, event_name) VALUES (?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $event_name);

    if ($stmt->execute() === TRUE) {
      echo "Registered for event successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Registration Platform</title>
</head>
<body>

<h2>Sign Up</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Username: <input type="text" name="username" required><br>
  Email: <input type="email" name="email" required><br>
  Password: <input type="password" name="password" required><br>
  <input type="submit" name="register" value="Sign Up">
</form>

<h2>Register for an Event</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  User ID: <input type="number" name="user_id" required><br>
  Event Name: <input type="text" name="event_name" required><br>
  <input type="submit" name="registerEvent" value="Register for Event">
</form>

</body>
</html>
