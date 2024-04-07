<?php
// This script is a simple example of a subscription service signup with a trial period, using PHP and MySQL.
// Before using this example, ensure you have a MySQL database set up with the necessary credentials.

// Database connection settings
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect and sanitize input data
  $name = $conn->real_escape_string($_POST['name']);
  $email = $conn->real_escape_string($_POST['email']);

  // Define the trial period
  $trialEnds = date('Y-m-d', strtotime('+1 month'));

  // Insert the new subscription into the database
  $sql = "INSERT INTO subscriptions (name, email, trial_ends) VALUES ('$name', '$email', '$trialEnds')";

  if ($conn->query($sql) === TRUE) {
    echo "You have successfully subscribed with a 1-month free trial!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Create table if it doesn't exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS subscriptions (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  trial_ends DATE NOT NULL,
  reg_date TIMESTAMP
  )";

if ($conn->query($tableCreationQuery) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subscription Signup with Free Trial</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        form { display: flex; flex-direction: column; }
        label { margin: 10px 0 5px; }
        input[type="text"], input[type="email"] { padding: 10px; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px; border: none; cursor: pointer; margin-top: 10px;}
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up for a Free 1-Month Trial</h2>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <input type="submit" value="Subscribe">
        </form>
    </div>
</body>
</html>
