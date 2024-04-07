<?php

// DB config
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Create subscription table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS subscriptions (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    confirmed TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
)";
mysqli_query($link, $createTable);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $token = bin2hex(random_bytes(50)); // generate a token
    $sql = "INSERT INTO subscriptions (email, token) VALUES ('$email', '$token')";
    
    if(mysqli_query($link, $sql)){
        // Send confirmation email
        $to      = $email; 
        $subject = 'Confirm Your Email'; 
        $message = 'Please click this link to confirm your newsletter subscription: http://yourwebsite.com/confirm.php?token=' . $token; 
        $headers = 'From:noreply@yourwebsite.com' . "\r\n"; 
        mail($to, $subject, $message, $headers);
        echo "Subscription successful! Please check your email to confirm.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}

// Confirm email
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['token'])) {
    $token = mysqli_real_escape_string($link,$_GET['token']);
    $sql = "UPDATE subscriptions SET confirmed = 1 WHERE token='$token'";

    if(mysqli_query($link, $sql)){
        echo "Email confirmed! Thank you for subscribing.";
    } else{
        echo "ERROR: Could not able to confirm email. " . mysqli_error($link);
    }
}

mysqli_close($link);

// HTML Form for subscription
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Newsletter Signup</title>
Your stylesheet for brave style
</head>
<body>
<h2>Subscribe to our Newsletter</h2>
<form method="post">
    <input type="email" name="email" required>
    <input type="submit" value="Subscribe">
</form>
</body>
</html>
