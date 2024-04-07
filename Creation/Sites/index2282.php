<?php

// Define database connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Create database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create user table if it doesn't exist
$createUserTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    activation_code VARCHAR(255) NOT NULL,
    is_active BOOLEAN NOT NULL DEFAULT FALSE,
    UNIQUE(email)
)";

if (!$conn->query($createUserTable)) {
    die("Error creating table: " . $conn->error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Generate a unique activation code
    $activation_code = md5(rand());

    // Insert the new user into the database
    $sql = "INSERT INTO users (username, email, password, activation_code) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $password, $activation_code);
    if($stmt->execute()) {
        // Send verification email
        $to = $email;
        $subject = 'Signup | Verification';
        $message = '
            Thanks for signing up!
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
            
            ------------------------
            Username: '.$username.'
            ------------------------
            
            Please click this link to activate your account:
            http://yourwebsite.com/verify.php?email='.$email.'&code='.$activation_code;
        
        $headers = 'From:noreply@yourwebsite.com' . "\r\n";
        mail($to, $subject, $message, $headers);
        echo 'Please check your email to activate your account.';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup - Fitness Equipment</title>
</head>
<body>
    <h2>Signup</h2>
    <form method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>
