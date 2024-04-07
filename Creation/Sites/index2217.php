<?php
// Connect to database
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

// Create table for newsletter subscribers if it doesn't already exist
$sql = "CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    code VARCHAR(64) NOT NULL,
    confirmed BOOLEAN DEFAULT 0,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

$message = "";
$showForm = true;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = $conn->real_escape_string($_POST["email"]);
    $code = bin2hex(random_bytes(32));

    $sql = "INSERT INTO subscribers (email, code) VALUES ('$email', '$code')";

    if ($conn->query($sql) === TRUE) {
        // Send confirmation email
        $to = $email;
        $subject = "Confirm Your Subscription";
        $message = "Please click on the following link to confirm your subscription: ";
        $message .= "http://yourdomain.com/confirm.php?email=$email&code=$code";
        $headers = "From: noreply@yourdomain.com\r\n";
        if (mail($to, $subject, $message, $headers)) {
            $message = "Confirmation email sent. Please check your email.";
        } else {
            $message = "Error sending confirmation email.";
        }
    } else {
        $message = "Error subscribing: " . $conn->error;
    }
    $showForm = false;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Newsletter Signup</title>
</head>
<body>
    <h1>Subscribe to our Newsletter</h1>
    <p><?php echo $message; ?></p>
    <?php if ($showForm): ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Subscribe</button>
        </form>
    <?php endif; ?>
</body>
</html>
