<?php
// Ensure the session is started
session_start();

// Database connection details
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Function to encrypt data
function encryptData($data, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encryptedData = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encryptedData . '::' . $iv);
}

// Function to decrypt data
function decryptData($data, $key) {
    list($encryptedData, $iv) = array_pad(explode('::', base64_decode($data), 2), 2, null);
    return openssl_decrypt($encryptedData, 'aes-256-cbc', $key, 0, $iv);
}

// Use a secure key
$encryptionKey = "YOUR_SECURE_KEY_HERE"; // Recommended to store outside of the document root

// Handle login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user inputs
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);

    // Dummy validation (Replace with actual user validation)
    // This is just for demonstration purposes
    if ($username == "admin" && $password == "password") {
        // User session data
        $userData = [
            'user_id' => 1,
            'username' => $username
        ];

        // Encrypt user session data
        $_SESSION['userData'] = encryptData(json_encode($userData), $encryptionKey);

        // Redirect to homepage (dashboard)
        header("Location: dashboard.php");
        exit;
    } else {
        $errorMsg = "Invalid username or password.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Organic Foods Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-form">
    <h2>Login</h2>
    <?php if (isset($errorMsg)): ?>
        <p class="error"><?php echo $errorMsg; ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>
    </form>
</div>

</body>
</html>

Note: To make this a complete, compliable, and deployable example, you'd also need to ensure your encryption key is securely managed, which might involve more secure storage solutions and a deeper dive into user management and session handling. This is a simplified example for educational purposes.