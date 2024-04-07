<?php
// Handle frontend and backend in the same file for simplicity

// Attempt to establish a database connection
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create subscribers table if not exists
$sql = "CREATE TABLE IF NOT EXISTS subscribers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
token VARCHAR(32) NOT NULL,
confirmed BOOLEAN DEFAULT 0,
reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

function generateToken() {
  return md5(uniqid(rand(), true));
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['email'])) {
  $email = $conn->real_escape_string($_POST['email']);
  $token = generateToken();
  
  // Insert subscriber
  $stmt = $conn->prepare("INSERT INTO subscribers (email, token) VALUES (?, ?)");
  $stmt->bind_param("ss", $email, $token);
  
  if ($stmt->execute()) {
    // Send confirmation email
    $confirmLink = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?token=".$token;
    $to = $email;
    $subject = "Confirm Subscription";
    $txt = "Please click this link to confirm your subscription: ".$confirmLink;
    $headers = "From: newsletter@gardeningtools.com";

    mail($to,$subject,$txt,$headers);
    echo "Subscription successful. Please check your email to confirm.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

if (isset($_GET['token'])) {
  $token = $conn->real_escape_string($_GET['token']);
  $stmt = $conn->prepare("UPDATE subscribers SET confirmed=1 WHERE token=?");
  $stmt->bind_param("s", $token);
  
  if ($stmt->execute()) {
    echo "Email confirmed. Thank you for subscribing.";
  } else {
    echo "Email confirmation failed.";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Gardening Tools Newsletter Signup</title>
</head>
<body>
<h2>Subscribe to our Newsletter</h2>
<form action="" method="post">
  Email: <input type="email" name="email" required>
  <input type="submit" value="Subscribe">
</form>
</body>
</html>
