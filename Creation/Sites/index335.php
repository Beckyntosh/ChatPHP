<?php
session_start();

// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create necessary tables if not exist
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    recovery_code VARCHAR(6)
);";

$conn->query($createUsersTable);

function sendRecoveryCode($email, $code) {
    // Placeholder for sending email logic
    // In a real-world scenario, you would integrate an email sending service here
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $recoveryCode = rand(100000, 999999);

        // Update user's recovery code
        $stmt = $conn->prepare("UPDATE users SET recovery_code = ? WHERE email = ?");
        $stmt->bind_param("ss", $recoveryCode, $email);
        $stmt->execute();

        // Send recovery code to user's email
        sendRecoveryCode($email, $recoveryCode);

        $_SESSION['email'] = $email;
        header('Location: verify.php');
        exit();
    }
}

if (isset($_GET['verify'])) {
    if ($_GET['verify'] == 'true' && isset($_SESSION['email'], $_POST['recovery_code'])) {
        $email = $_SESSION['email'];
        $recoveryCode = $_POST['recovery_code'];

        // Verify the recovery code
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND recovery_code = ?");
        $stmt->bind_param("ss", $email, $recoveryCode);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Code verified, redirect to reset password page or similar
            header('Location: reset_password.php');
            exit();
        } else {
            echo "<p>Invalid recovery code.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Account Recovery</title>
</head>

<body>
    <h1>Account Recovery</h1>
    <form method="POST" action="">
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>
        <input type="submit" value="Send Recovery Code">
    </form>
    <?php if (isset($_GET['verify']) && $_GET['verify'] == 'true') : ?>
        <form method="POST" action="?verify=true">
            <label for="recovery_code">Recovery Code:</label><br>
            <input type="text" id="recovery_code" name="recovery_code"><br>
            <input type="submit" value="Verify Code">
        </form>
    <?php endif; ?>
</body>

</html>

<?php $conn->close(); ?>