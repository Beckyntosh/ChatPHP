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

$sql = "CREATE TABLE IF NOT EXISTS forum_users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']); // Simple hash, consider more secure options for real applications

  $sql = "INSERT INTO forum_users (username, email, password) VALUES ('$username', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
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
    <title>Signup - Tech Forum</title>
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f0f0f0; }
        .container { max-width: 600px; margin: 50px auto; background-color: #ffffff; padding: 20px; box-shadow: 0 0 10px #aaaaaa; }
        input[type="text"], input[type="password"], input[type="email"] { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { background-color: #333333; color: #ffffff; padding: 10px 20px; cursor: pointer; }
        h2 { color: #333333; }
    </style>
</head>
<body>
<div class="container">
    <h2>Join Our Technology Discussion Forum</h2>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Register">
    </form>
</div>
</body>
</html>
