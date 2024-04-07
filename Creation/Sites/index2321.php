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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handling the form request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];

        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT id, password FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                echo "Login successful";
            } else {
                echo "Invalid username or password";
            }
        } else {
            echo "Invalid username or password";
        }
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

<form method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email"><br>
  <input type="submit" name="register" value="Sign Up">
</form>

<h2>Login</h2>

<form method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br>
  <input type="submit" name="login" value="Login">
</form>

</body>
</html>
