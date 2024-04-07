<?php
// Database connection
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

// Create table for users if it doesn't exist
$userTableSql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
premium_features_access TINYINT(1) DEFAULT 0,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($userTableSql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle user signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = md5($_POST['password']); // Simple hashing, consider stronger options in production

  $insertSql = "INSERT INTO users (fullname, email, password, premium_features_access) VALUES ('$fullname', '$email', '$password', 1)";

  if ($conn->query($insertSql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insertSql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup for Premium File Storage Features</title>
</head>
<body>

<div style="margin: auto; width: 50%; padding: 10px;">
    <h2>Signup Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
        Full Name: <input type="text" name="fullname">
        <br><br>
        E-mail: <input type="text" name="email">
        <br><br>
        Password: <input type="password" name="password">
        <br><br>
        <input type="submit" name="submit" value="Register">  
    </form>
</div>

</body>
</html>
