<?php
// Newsletter Signup with Email Confirmation

// Database connection info
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for newsletter_signups if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS newsletter_signups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(32) NOT NULL,
    confirmed TINYINT NOT NULL DEFAULT 0,
    signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

// Function to generate random token
function generateToken() {
    return md5(uniqid(rand(), true));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $token = generateToken();
    
    // Check if the email is already signed up
    $checkQuery = "SELECT * FROM newsletter_signups WHERE email = '$email'";
    $checkResult = $conn->query($checkQuery);
    
    if ($checkResult->num_rows == 0) {
        // Insert new signup
        $query = "INSERT INTO newsletter_signups (email, token) VALUES ('$email', '$token')";
        
        if ($conn->query($query) === TRUE) {
            // Prepare confirmation email
            $to = $email;
            $subject = "Confirm your subscription";
            $message = "Please click on the following link to confirm your subscription: \n\n";
            $message .= "http://yourdomain.com/confirm.php?token=$token\n\n";
            $headers = "From: no-reply@yourdomain.com\r\n";
            
            if (mail($to, $subject, $message, $headers)) {
                echo "A confirmation email has been sent to $email. Please click on the link to confirm your subscription.";
            } else {
                echo "Error sending the confirmation email.";
            }
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        echo "The email $email is already subscribed.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Newsletter Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e2e2e2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .signup-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="email"] {
            padding: 10px;
            margin: 10px 0;
            width: calc(100% - 22px);
            display: block;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
<div class="signup-container">
    <form action="" method="post">
        <label for="email">Enter your email to subscribe:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Subscribe">
    </form>
</div>
</body>
</html>
