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

// Create table for subscribers
$subscriberTableSql = "CREATE TABLE IF NOT EXISTS subscribers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
start_date TIMESTAMP,
trial_end_date DATE NOT NULL,
active_subscription BOOLEAN DEFAULT FALSE,
UNIQUE (email)
)";

if ($conn->query($subscriberTableSql) === TRUE) {
    echo "Table subscribers created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $startDate = date("Y-m-d H:i:s");
    $trialEndDate = date("Y-m-d", strtotime("+1 month"));

    $insertSql = $conn->prepare("INSERT INTO subscribers (email, start_date, trial_end_date) VALUES (?, ?, ?)");
    $insertSql->bind_param("sss", $email, $startDate, $trialEndDate);

    if ($insertSql->execute()) {
        echo "Subscriber added successfully. Enjoy your 1-month free trial!";
    } else {
        echo "Error: " . $insertSql->error;
    }

    $insertSql->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mind-bending Desktop Computers - Free Trial Signup</title>
<style>
    body { font-family: Arial, sans-serif; background: #f0f0f0; }
    .container { max-width: 600px; margin: 50px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    input[type=email], button { width: 100%; padding: 10px; margin: 10px 0; }
</style>
</head>
<body>

<div class="container">
    <h2>Sign Up for a 1-Month Free Trial</h2>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Sign Up</button>
    </form>
</div>

</body>
</html>
