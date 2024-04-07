<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create newsletters table if it does not exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS newsletters (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL,
  token VARCHAR(255) NOT NULL,
  is_confirmed BOOLEAN NOT NULL DEFAULT FALSE,
  sign_up_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSQL)) {
  die("Error creating table: " . $conn->error);
}

// Function to send confirmation email
function sendConfirmationEmail($email, $token) {
  $subject = "Confirm your Email";
  $message = "Please click on the link below to confirm your subscription:\n\n";
  $message .= "http://yourwebsite.com/confirm.php?email=$email&token=$token"; // Adjust the actual link
  $headers = "From: no-reply@yourwebsite.com";
  mail($email, $subject, $message, $headers);
}

if (isset($_POST["email"])) {
  // Collect and sanitize the email
  $email = $conn->real_escape_string($_POST["email"]);
  $token = bin2hex(random_bytes(50)); // Generate a unique token

  // Insert the subscriber into the database
  $insertSQL = "INSERT INTO newsletters (email, token) VALUES ('$email', '$token')";
  if ($conn->query($insertSQL)) {
    sendConfirmationEmail($email, $token); // Send a confirmation email
    echo "Subscription successful! Please check your email to confirm.";
  } else {
    echo "Error: " . $conn->error;
  }
}

if (isset($_GET['email']) && isset($_GET['token'])) {
  // Email confirmation logic
  $email = $conn->real_escape_string($_GET['email']);
  $token = $conn->real_escape_string($_GET['token']);

  $searchSQL = "SELECT * FROM newsletters WHERE email = '$email' AND token = '$token'";
  $result = $conn->query($searchSQL);
  if ($result->num_rows > 0) {
    $updateSQL = "UPDATE newsletters SET is_confirmed = TRUE WHERE email = '$email'";
    if ($conn->query($updateSQL)) {
      echo "Email confirmed successfully. Thank you for subscribing!";
    } else {
      echo "Error updating record: " . $conn->error;
    }
  } else {
    echo "Invalid link or email already confirmed.";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Newsletter Signup</title>
  <style>
    body { font-family: Arial, sans-serif; background-color: #f0f8ff; text-align: center; padding: 50px; }
    form { margin-top: 20px; }
    input[type=email], button { padding: 10px; font-size: 16px; margin: 5px; }
  </style>
</head>
<body>
  <h2>Subscribe to Our Newsletter</h2>
  <form method="POST">
    <input type="email" name="email" placeholder="Enter your email" required>
    <button type="submit">Subscribe</button>
  </form>
</body>
</html>
