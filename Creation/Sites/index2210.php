<?php
// This example illustrates a simple single-file approach to a newsletter signup with email verification for educational purposes.

// Connecting to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create users table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(50) NOT NULL,
    verified TINYINT(1) NOT NULL DEFAULT '0',
    reg_date TIMESTAMP
)";

if (!$conn->query($createTable)) {
    die("Error creating table: " . $conn->error);
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $token = bin2hex(random_bytes(24));

    // Check if email already exists
    $checkEmail = "SELECT email FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows == 0) {
        $sql = "INSERT INTO users (email, token) VALUES ('$email', '$token')";

        if ($conn->query($sql) === TRUE) {
            $to = $email;
            $subject = "Confirm Your Email";
            $txt = "Thank you for signing up! Click this link to confirm your email: http://yourwebsite.com/confirm.php?token=$token";
            $headers = "From: no-reply@yourwebsite.com";

            mail($to, $subject, $txt, $headers);
            $message = "Confirmation email sent. Please check your inbox.";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $message = "This email is already registered.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sunglasses Newsletter Signup</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Subscribe to Our Newsletter</h2>
        <p>Please enter your email to subscribe</p>
        <?php if($message != ""): ?>
            <p><?= $message; ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <input type="submit" value="Subscribe">
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>
