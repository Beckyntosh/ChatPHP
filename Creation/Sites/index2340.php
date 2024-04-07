<?php
// Set up connection credentials
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
$table = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  // Table creation success
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $conn->real_escape_string($_POST['firstname']);
  $lastname = $conn->real_escape_string($_POST['lastname']);
  $email = $conn->real_escape_string($_POST['email']);
  $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
  
  $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";
  
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Signup for Exclusive Content</title>
</head>
<body>

<h2>Sign Up for Access to Exclusive Member-Only Content</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="firstname">First Name:</label><br>
  <input type="text" id="firstname" name="firstname" required><br>
  <label for="lastname">Last Name:</label><br>
  <input type="text" id="lastname" name="lastname" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br><br>
  <input type="submit" value="Sign Up">
</form> 

</body>
</html>
