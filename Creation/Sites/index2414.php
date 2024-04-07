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

$sql = "
CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    trial_start_date DATE NOT NULL,
    trial_end_date DATE NOT NULL,
    subscribed TINYINT(1) NOT NULL DEFAULT '0',
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $currentDate = date("Y-m-d");
    $trialEndDate = date("Y-m-d", strtotime($currentDate. ' + 30 days'));
    
    $stmt = $conn->prepare("INSERT INTO users (email, trial_start_date, trial_end_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $currentDate, $trialEndDate);

    if ($stmt->execute() === TRUE) {
      echo "New record created successfully";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up for Free Trial</title>
</head>
<body>
    <h2>Sign Up for a 1-Month Free Trial</h2>
    <form method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
