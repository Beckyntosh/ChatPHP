<?php
// Check if we are in the "confirmation" phase or just handling a normal sign-up request
$isConfirming = isset($_GET['confirm']) && !empty($_GET['code']);

// Database configuration
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

// Setup - Creates the table if it does not exist
$setupSql = "CREATE TABLE IF NOT EXISTS newsletter_signup (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    confirmation_code VARCHAR(50) NOT NULL,
    confirmed TINYINT(1) DEFAULT 0,
    signup_date TIMESTAMP
)";
$conn->query($setupSql);

function generateConfirmationCode() {
    return md5(uniqid(rand(), true));
}

function sendConfirmationEmail($email, $code) {
    $confirmLink = "http://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]?confirm=true&code=$code";
    $message = "Please click this link to confirm your newsletter subscription: $confirmLink";
    mail($email, "Confirm your subscription", $message, "From: no-reply@yourwebsite.com");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !$isConfirming) {
    $email = $_POST['email'];
    $code = generateConfirmationCode();

    // Insert the signup request
    $stmt = $conn->prepare("INSERT INTO newsletter_signup (email, confirmation_code) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $code);
    $stmt->execute();
    $stmt->close();
    
    sendConfirmationEmail($email, $code);

    echo "Please check your email to confirm your subscription.";
} elseif ($isConfirming) {
    $code = $_GET['code'];

    // Verify the confirmation code and update the "confirmed" status
    $stmt = $conn->prepare("UPDATE newsletter_signup SET confirmed = 1 WHERE confirmation_code = ?");
    $stmt->bind_param("s", $code);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Thank you for confirming your subscription.";
    } else {
        echo "Invalid confirmation code.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Newsletter Signup</title>
</head>
<body>
    <?php if (!$isConfirming): ?>
    <h2>Newsletter Signup</h2>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Sign Up</button>
    </form>
    <?php endif; ?>
</body>
</html>
