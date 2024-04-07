<?php

$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';
$servername = 'db';

// Create connection
$conn = new mysqli($servername, 'root', $MYSQL_ROOT_PSWD, $MYSQL_DB);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$table = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  
  $sql = "INSERT INTO Users (name, email) VALUES ('$name', '$email')";
  
  if ($conn->query($sql) === TRUE) {
    echo "<br>New record created successfully";
  } else {
    echo "<br>Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup for Whiffy's Perfumes</title>
</head>
<body style="background-color: lavender; text-align: center;">

    <h2>Welcome to Whiffy's - The Perfume Paradise</h2>
    <p>Where your nose finds its joy!</p>

    <form action="" method="post">
       <label for="name">Name:</label><br>
       <input type="text" id="name" name="name" required><br>
       <label for="email">Email:</label><br>
       <input type="email" id="email" name="email" required><br><br>
       <input type="submit" value="Signup">
    </form>

</body>
</html>
