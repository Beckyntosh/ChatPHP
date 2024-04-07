<?php
// Database connection
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

// Check for POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $userInfo = $_POST['userInfo'];

    // Encrypt user information
    $encryptedUserInfo = openssl_encrypt($userInfo, 'aes-256-cbc', 'encryptionKey123', 0, '1234567891011121');

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO user_emails (email, userInfo) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $encryptedUserInfo);

    if ($stmt->execute()) {
        sendEmail($email, $encryptedUserInfo);
        echo "Email sent successfully.";
    } else {
        echo "Error sending email.";
    }

    $stmt->close();
}

$conn->close();

// Function to send email
function sendEmail($to, $content) {
    $subject = 'Sensitive Information Encrypted';
    $message = 'This is your encrypted information: ' . $content;
    $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Office Supplies - Secure Email</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .container { max-width: 600px; margin: auto; background: #fff; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        input[type=email], textarea { width: 100%; padding: 8px; margin: 10px 0; display: block; border: 1px solid #ccc; box-sizing: border-box; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
    </style>
</head>
<body>

<div class="container">
    <h2>Send Encrypted Email</h2>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="userInfo">Personal Information:</label>
        <textarea id="userInfo" name="userInfo" required></textarea>
        <input type="submit" value="Send Email">
    </form>
</div>

</body>
</html>