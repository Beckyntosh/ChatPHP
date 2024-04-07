<?php
session_start();

// Configuration for database connection
$host       = "db";
$username   = "root";
$password   = "root";
$dbname     = "my_database";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

// Create database connection
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    verification_code VARCHAR(255) NOT NULL,
    is_verified BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$pdo->exec($sql);

**
 * Sends a verification email to the user
 */
function sendVerificationEmail($email, $verification_code) {
    $subject = "Verify Your Account";
    $message = "Please click on the link below to verify your account:
    http://yourwebsite.com/verify.php?code=$verification_code";
    $headers = "From: noreply@yourwebsite.com";
    mail($email, $subject, $message, $headers);
}

**
 * Handles the registration process
 */
if (isset($_POST['register'])) {
    // Collect form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $verification_code = md5(uniqid(rand(), true));

    // Insert user into database
    $sql = "INSERT INTO users (username, email, password, verification_code) VALUES (?, ?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$username, $email, $password, $verification_code]);

    // Send verification email
    sendVerificationEmail($email, $verification_code);

    $_SESSION['message'] = "Registration successful! Please check your email to verify your account.";
}

**
 * Handles account verification
 */
if (isset($_GET['code'])) {
    $verification_code = $_GET['code'];

    // Check if code exists in the database
    $sql = "SELECT * FROM users WHERE verification_code = ?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$verification_code]);
    $user = $stmt->fetch();

    if ($user) {
        // Verify user
        $sql = "UPDATE users SET is_verified = 1 WHERE verification_code = ?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$verification_code]);

        $_SESSION['message'] = "Account verified successfully!";
    } else {
        $_SESSION['message'] = "Invalid verification code!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Electronics Website - Account Verification</title>
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
    <p><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
<?php endif; ?>
    <form action="index.php" method="post">
        <h2>Register</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>
