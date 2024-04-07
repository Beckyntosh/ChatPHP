<?php
// Database connection
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Encryption key
define('ENCRYPTION_KEY', 'your_secret_key');

// Establishing database connection
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Encrypt function
function encryptData($data) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', ENCRYPTION_KEY, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

// Decrypt function
function decryptData($data) {
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2), 2, null);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', ENCRYPTION_KEY, 0, $iv);
}

// Handling user session data
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Encrypting user data
    $encryptedUsername = encryptData($username);
    $encryptedPassword = encryptData($password);

    try {
        $query = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $query->bindParam(':username', $encryptedUsername);
        $query->bindParam(':password', $encryptedPassword);
        $query->execute();

        $_SESSION['user_data'] = $encryptedUsername;
        header('Location: dashboard.php'); // Redirect to the dashboard after storing the session data
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School Supplies Login</title>
    <style>
        /* Sample Styles */
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .login-container { max-width: 300px; margin: 50px auto; padding: 20px; background-color: white; border: 1px solid #ddd; }
        .login-input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; }
        .login-btn { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        .login-btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<div class="login-container">
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" required class="login-input">
        <input type="password" name="password" placeholder="Password" required class="login-input">
        <button type="submit" class="login-btn">Login</button>
    </form>
</div>

</body>
</html>

<?php
// At the end of the script, close the database connection
$pdo = null;
?>