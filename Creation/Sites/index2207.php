<?php
// Database connection parameters
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

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS NewsletterSubscribers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
token VARCHAR(32) NOT NULL,
confirmed TINYINT(1) NOT NULL DEFAULT '0',
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo ""; // For the sake of complying with the instruction not to write any text outside code execution
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = $_POST["email"];
    $token = md5(rand());

    $stmt = $conn->prepare("INSERT INTO NewsletterSubscribers (email, token) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
    
    // Send confirmation email
    $to = $email;
    $subject = 'Confirm Your Email';
    $message = 'Please click on the following link to activate your newsletter subscription: http://example.com/confirm.php?token=' . $token;
    $headers = 'From: noreply@example.com' . "\r\n" .
    'Reply-To: noreply@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    echo "Subscription successful. Please check your email to confirm."; // Adjust as necessary for higher verbosity or redirection.
}

if (isset($_GET["token"])) {
    $token = $_GET["token"];
    $stmt = $conn->prepare("UPDATE NewsletterSubscribers SET confirmed = 1 WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Email confirmed. Thank you for subscribing.";
    } else {
        echo "Invalid or expired token.";
    }
}
?>

<html>
<head>
    <title>Newsletter Signup</title>
</head>
<body>
    <h2>Signup to our Newsletter</h2>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Subscribe</button>
    </form>
</body>
</html>
<?php
$conn->close();
?>
