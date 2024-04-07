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

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
trial_end_date DATETIME NULL,
status ENUM('active', 'trial', 'expired') DEFAULT 'trial'
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $trialEndDate = date("Y-m-d H:i:s", strtotime("+1 month"));

    $stmt = $conn->prepare("INSERT INTO users (username, email, trial_end_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $trialEndDate);
    
    if ($stmt->execute() === TRUE) {
      echo "<p>Successfully signed up for a free trial!</p>";
    } else {
      echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up for Our Subscription Service</title>
    <style>
        body { font-family: Arial, sans-serif; }
    </style>
</head>
<body>
    <h2 style="color: #ff4081;">Children's Clothing Club - Sign Up</h2>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
