<?php
session_start();

$MYSQL_ROOT_PSWD = 'root';
$servername = "db";
$username = "root";
$password = $MYSQL_ROOT_PSWD;
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$table = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(255) NOT NULL,
  reg_date TIMESTAMP
)";
if ($conn->query($table) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

function registerUser($username, $password, $conn) {
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $username, $hashed_password);
  if ($stmt->execute() === TRUE) {
    return true;
  } else {
    return false;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["g-recaptcha-response"])) {
  $secretKey = "YOUR_SECRET_KEY_HERE";
  $responseKey = $_POST["g-recaptcha-response"];
  $userIP = $_SERVER['REMOTE_ADDR'];
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
  
  $response = file_get_contents($url);
  $response = json_decode($response);

  if ($response->success) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (registerUser($username, $password, $conn)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "Captcha verification failed!";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <form action="" method="post">
        <div>
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY_HERE"></div>
        <button type="submit">Register</button>
    </form>
</body>
</html>