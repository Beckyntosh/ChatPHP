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

// create the signup table if it doesn't exist
$query = "CREATE TABLE IF NOT EXISTS newsletter_signups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    token VARCHAR(32) NOT NULL,
    confirmed TINYINT DEFAULT 0,
    reg_date TIMESTAMP
)";
$conn->query($query);

function generateToken() {
    return md5(uniqid(mt_rand(), true));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = $_POST["email"];
    $token = generateToken();

    // Insert the email and a unique token
    $stmt = $conn->prepare("INSERT INTO newsletter_signups (email, token) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $token);

    if($stmt->execute()) {
        // Send Email
        $to = $email;
        $subject = "Confirm your Subscription";
        $message = "Please click on the link below to confirm your subscription:\n\n";
        $message .= "http://yourwebsite.com/confirm.php?token=" . $token;
        mail($to, $subject, $message);
        echo 'Please check your email to confirm your subscription.';
    } else {
        echo 'This email is already registered.';
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Newsletter SignUp</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="email" name="email" required="required" placeholder="Enter your email">
        <button type="submit">Subscribe</button>
    </form>
</body>
</html>

<?php
// confirm.php - place this logic in a separate file called 'confirm.php' on your server
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $updateQuery = "UPDATE newsletter_signups SET confirmed = 1 WHERE token = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("s", $token);

    if ($stmt->execute()) {
        echo "Subscription confirmed. Thank you!";
    } else {
        echo "Invalid token.";
    }

    $stmt->close();
    $conn->close();
}
?>
