<?php
// Simple Subscription Service Signup with Trial Period

// Set up database connection
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

// Create tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
trial_start_date DATE,
subscription_status VARCHAR(10) DEFAULT 'inactive',
reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle user signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $trialStartDate = date('Y-m-d');
  $trialEndDate = date('Y-m-d', strtotime('+1 month', strtotime($trialStartDate)));
  $subscriptionStatus = 'inactive'; // Default state until they choose to continue post-trial
  
  // Insert user into database
  $sql = "INSERT INTO users (username, email, password, trial_start_date, subscription_status) VALUES (?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssss", $username, $email, $password, $trialStartDate, $subscriptionStatus);

  if ($stmt->execute()) {
    echo "User registered successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign up for a Free Trial</title>
<style>
  body { font-family: Arial, sans-serif; }
  .container { max-width: 400px; margin: auto; padding: 20px; }
  input[type=text], input[type=password], input[type=email] { width: 100%; padding: 15px; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1; }
  input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; opacity: 0.9; }
  input[type=submit]:hover { opacity:1; }
</style>
</head>
<body>

<div class="container">
  <h2>Sign Up for a Free Month Trial</h2>
  <form method="post" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Sign Up">
  </form>
</div>

</body>
</html>
