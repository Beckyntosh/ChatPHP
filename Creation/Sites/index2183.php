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
$table_sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert new user if form submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];

  $insert_sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

  if ($conn->query($insert_sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insert_sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Health and Wellness Products Signup</title>
</head>
<body>

<h2>User Signup</h2>

<form method="POST">
  <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br>
  <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
