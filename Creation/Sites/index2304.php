<?php

// Connect to MySQL database
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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS Users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP,
  loyalty_member BOOLEAN NOT NULL DEFAULT FALSE
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $loyalty_member = isset($_POST['loyalty']) ? 1 : 0;

  $stmt = $conn->prepare("INSERT INTO Users (firstname, lastname, email, loyalty_member) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sssi", $firstname, $lastname, $email, $loyalty_member);

  if ($stmt->execute() === TRUE) {
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
  <title>Sign Up for Our Loyalty Program!</title>
  <style>
    body { font-family: Arial, sans-serif; background-color: #f5f5f5; }
    .container { max-width: 400px; margin: auto; padding: 20px; background-color: white; margin-top: 50px; box-shadow: 0 0 5px rgba(0,0,0,0.2); }
    input[type="text"], input[type="email"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; }
    input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; }
    input[type="submit"]:hover { opacity: 0.8; }
  </style>
</head>
<body>

<div class="container">
  <h2>Join Our Loyalty Program</h2>
  <p>Register now and don't miss out on our exclusive offers!</p>
  <form method="post">
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname" required>
    
    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label><input type="checkbox" name="loyalty" checked> Sign up for the loyalty program</label>
    
    <input type="submit" value="Register">
  </form>
</div>

</body>
</html>
