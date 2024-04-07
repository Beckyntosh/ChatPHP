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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS subscribers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
token VARCHAR(64) NOT NULL,
confirmed TINYINT(1) NOT NULL DEFAULT 0,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
  $email = $conn->real_escape_string($_POST["email"]);
  $token = bin2hex(random_bytes(32));
  
  $sql = "INSERT INTO subscribers (email, token) VALUES ('$email', '$token')";
  
  if ($conn->query($sql) === TRUE) {
    $subject = "Confirm Your Subscription";
    $body = "Please click on the following link to confirm your subscription: 
             http://yourwebsite.com/confirm.php?token=$token";
    $headers = "From: newsletter@yourwebsite.com";
    
    if (mail($email, $subject, $body, $headers)) {
      echo "A confirmation email has been sent to $email. Please check your inbox to complete the subscription.";
    } else {
      echo "Failed to send the confirmation email. Please try again.";
    }
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
    <title>Newsletter Signup</title>
</head>
<body>
    <h1>Subscribe to Our Newsletter</h1>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Subscribe">
    </form>
</body>
</html>
