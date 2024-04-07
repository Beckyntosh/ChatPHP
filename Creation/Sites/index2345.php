<?php
// Simple example and not safe for production use

// Connect to MySQL
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

// Create users table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// User registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Simple hash, not secure for production

    $sql = "INSERT INTO users (username, email, password)
    VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
      header("Location: success.html"); // Redirect on success
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup for Exclusive Content</title>
    <style>
        body {font-family: Arial, sans-serif; text-align: center;}
        form {margin-top: 20px;}
        input[type=text], input[type=password], input[type=email] {width: 200px; margin-top: 10px;}
    </style>
</head>
<body>
    <h2>Signup for Access to Exclusive Member-Only Content</h2>

    <form action="" method="post">
        <input type="text" name="username" placeholder="Choose a username" required>
        <br>
        <input type="email" name="email" placeholder="Enter your email" required>
        <br>
        <input type="password" name="password" placeholder="Choose a password" required>
        <br>
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>

<?php
$conn->close();
?>
