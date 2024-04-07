<?php
// This script acts both as the frontend and the backend of the signup process for a subscription service with a trial period.

// Connect to MySQL database
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    trial_end_date DATE NOT NULL,
    subscription_status TINYINT(1) NOT NULL DEFAULT 0,
    UNIQUE KEY unique_email (email)
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle the signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $email = $conn->real_escape_string($_POST['email']);

    // Calculate trial end date (1 month from today)
    $trial_end_date = date('Y-m-d', strtotime('+1 month'));

    // Insert user into the database
    $sql = "INSERT INTO users (firstname, email, trial_end_date) VALUES ('$firstname', '$email', '$trial_end_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Thank you for signing up! Your trial ends on $trial_end_date.</p>";
    } else {
        if ($conn->errno == 1062) {
            echo "<p>Sorry, that email is already registered for a trial.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Service Signup</title>
</head>
<body>
    <h1>Sign up for our Clothing Subscription Service with 1 Month Free Trial</h1>
    <form method="post" action="">
        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
