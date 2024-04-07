<?php
// Connect to MySQL Database
$servername = "db";
$username = "root"; // Warning: Default credentials should be changed for production
$password = "root"; // Warning: Default credentials should be changed for production
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
verified TINYINT(1) NOT NULL DEFAULT '0',
verification_code VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle Form Submission for account creation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $verification_code = md5(rand());

  $sql = "INSERT INTO users (username, email, verification_code) VALUES ('". $username ."', '". $email ."', '". $verification_code ."')";

  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $verify_link = "http://yourdomain.com/verify.php?email=$email&code=$verification_code";
    $message = "Please click on the following link to verify your email: <a href='". $verify_link ."'>Verify Email</a>";
    // mail($email, "Verify your email address", $message);
    // For demonstration purposes, we'll echo the link instead of sending an email
    echo "A verification link has been sent to your email. Please check your email to verify your account.<br>";
    echo "Verification Link: <a href='$verify_link'>$verify_link</a>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Form</title>
    <style>
        body { background: #333; color: #ddd; font-family: Arial, sans-serif; }
        .container { width: 300px; margin: 100px auto; padding: 20px; background: #444; border-radius: 5px; }
        input[type=text], input[type=email], input[type=submit] { margin-top: 10px; padding: 10px; width: 95%; }
        input[type=submit] { background: #555; color: #fff; }
    </style>
</head>
<body>
<div class="container">
    <h2>Signup</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required/><br>
        <input type="email" name="email" placeholder="Email" required/><br>
        <input type="submit" value="Create Account"/>
    </form>
</div>
</body>
</html>
