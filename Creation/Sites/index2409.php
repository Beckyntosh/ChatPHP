<?php
// Define MySQL settings
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Connect to MySQL database
$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

// Check if the table doesn't exist, create it
$query = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    trial_start DATE,
    subscription_end DATE
)";
$mysqli->query($query);

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password
  $trialStart = date("Y-m-d"); // Set trial start date to current date
  $subscriptionEnd = date("Y-m-d", strtotime("+1 month")); // Set trial end date to 1 month after start
  
  // Insert new user into database
  $statement = $mysqli->prepare("INSERT INTO users (username, email, password, trial_start, subscription_end) VALUES (?, ?, ?, ?, ?)");
  $statement->bind_param("sssss", $username, $email, $password, $trialStart, $subscriptionEnd);
  $statement->execute();
  
  // Redirect to a confirmation page or similar
  header("Location: success.html");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup for a Free Trial</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 300px; margin: auto; }
        form { display: flex; flex-direction: column; gap: 12px; }
        input, button { padding: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Signup for a Free 1 Month Trial</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Start My Trial</button>
        </form>
    </div>
</body>
</html>
