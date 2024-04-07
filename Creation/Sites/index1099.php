<?php

// Define database credentials
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Establish a database connection
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['encrypted_data'])) {
    $decryptedData = decrypt($_SESSION['encrypted_data']);
    $userData = unserialize($decryptedData);
} else {
    $userData = ['isLoggedIn' => false];
}

// User login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check credentials in the database
    $sql = "SELECT * FROM users WHERE username = :username";
    
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                if ($row = $stmt->fetch()) {
                    if (password_verify($password, $row['password'])) {
                        // User authenticated
                        $userData = ['isLoggedIn' => true, 'username' => $username];
                        // Encrypt user data and store in session
                        $_SESSION['encrypted_data'] = encrypt(serialize($userData));
                        header("Location: index.php");
                        exit();
                    }
                }
            }
        }
    }
}

function encrypt($data) {
    $encryption_key = openssl_random_pseudo_bytes(32);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv . '::' . $encryption_key);
}

function decrypt($data) {
    list($encrypted_data, $iv, $encryption_key) = array_pad(explode('::', base64_decode($data), 3), 3, null);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gardening Tools Website</title>
</head>
<body style="text-align:center;">
<h2>Welcome to Our Gardening Tools Website</h2>
<?php if ($userData['isLoggedIn']): ?>
    <p>Hello, <?php echo htmlspecialchars($userData['username']); ?>! You have successfully logged in.</p>
    <p><a href="logout.php">Logout</a></p>
<?php else: ?>
    <form method="POST">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit">Login</button>
    </form>
<?php endif; ?>
</body>
</html>
