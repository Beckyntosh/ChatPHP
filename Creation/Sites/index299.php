<?php

$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';
$servername = 'db';
$username = 'root';

// Create connection
$conn = new mysqli($servername, $username, $MYSQL_ROOT_PSWD, $MYSQL_DB);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $captcha_response = $_POST['g-recaptcha-response'];

  // Verify CAPTCHA
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = array(
    'secret' => 'YOUR_SECRET_KEY', // Replace it with your secret key
    'response' => $captcha_response
  );
  $options = array(
    'http' => array (
      'method' => 'POST',
      'content' => http_build_query($data)
    )
  );
  $context  = stream_context_create($options);
  $verify = file_get_contents($url, false, $context);
  $captcha_success=json_decode($verify);

  if ($captcha_success->success) {
    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    echo "New record created successfully";
  } else {
    echo "You are a robot!";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div>
    <h2>Register</h2>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
Replace it with your site key
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>