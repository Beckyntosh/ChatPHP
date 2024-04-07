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

// Create table if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS UserNotifications (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
  echo ""; // Successfully created the table
} else {
  echo "Error creating table: " . $conn->error;
}

// If the register button is clicked
if(isset($_POST['register'])) {
  $email = $_POST['email'];

  // Insert the user's email into the table
  $sql = "INSERT INTO UserNotifications (email) VALUES ('$email')";

  if ($conn->query($sql) === TRUE) {
    echo "You have successfully registered for product updates!";
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Signup for Product Updates</title>
<style>
  body {font-family: Courier, monospace; font-size: 16px;}
  form {
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  input[type=email], input[type=submit] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
  }
</style>
</head>
<body>

<h2 style="text-align:center;">Signup for Baby Products Updates</h2>

<form action="" method="post">
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <input type="submit" name="register" value="Register">
</form>

</body>
</html>
