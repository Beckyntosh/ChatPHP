<?php
// Assuming a basic understanding of PHP and SQL, error handling, and security measures (like password hashing and form validation) are simplified for brevity.

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

// Attempt to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    trial_end_date TIMESTAMP NOT NULL,
    UNIQUE(email)
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists.
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    // Set trial_end_date to 1 month from today
    $trial_end_date = date('Y-m-d H:i:s', strtotime('+1 month'));

    $sql = "INSERT INTO users (username, email, trial_end_date) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
      $stmt->bind_param("sss", $username, $email, $trial_end_date);
      if ($stmt->execute()) {
        echo "<p>Thanks for signing up, {$username}! Enjoy your 1-month free trial.</p>";
      } else {
        echo "<p>Error: " . $stmt->error . "</p>";
      }
      $stmt->close();
    } else {
      echo "<p>Database error: " . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Subscription Signup with Trial</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { max-width: 300px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; }
        input, button { margin-top: 10px; }
    </style>
</head>
<body>
    <h2>Sign Up for Your Free Trial</h2>
    <form method="POST">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>
