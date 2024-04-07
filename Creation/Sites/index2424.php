<?php
// Initialize a session.
session_start();

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

// Create tables if not exists
$sql1 = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    subscription_status BOOLEAN DEFAULT FALSE,
    trial_end_date DATE NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sql2 = "CREATE TABLE IF NOT EXISTS subscriptions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sql1) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}
if ($conn->query($sql2) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Check if user exists
    $checkUser = $conn->prepare("SELECT id FROM users WHERE username=? LIMIT 1");
    $checkUser->bind_param("s", $username);
    $checkUser->execute();
    $result = $checkUser->get_result();
    if ($result->num_rows == 0) {
        // If user does not exist, insert and start trial period
        $trialEndDate = date("Y-m-d", strtotime("+1 month"));
        $insertUser = $conn->prepare("INSERT INTO users (username, email, subscription_status, trial_end_date) VALUES (?, ?, FALSE, ?)");
        $insertUser->bind_param("sss", $username, $email, $trialEndDate);
        if ($insertUser->execute()) {
            echo "<p>Welcome, ".$username."! Your free trial ends on ".$trialEndDate.".</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    } else {
        echo "<p>Username already exists. Please choose a different username.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Supplies Subscription Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type=text], input[type=email] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Sign Up for a Free Trial</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Sign Up</button>
    </form>
</div>

</body>
</html>
