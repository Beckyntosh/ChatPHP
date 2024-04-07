<?php
// Initialize Connection to the Database
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Connect to MySQL database
$conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if table 'user_cookies' exists, and create it if it doesn't
$createTableQuery = "CREATE TABLE IF NOT EXISTS user_cookies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    cookie_data TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)  ENGINE=INNODB;";
$conn->query($createTableQuery);

// Encryption and Decryption Keys
define('ENCRYPTION_KEY', 'your-secret-encryption-key'); // CHANGE THIS TO YOUR OWN KEY

// Encrypt Cookie Data Function
function encryptCookie($value){
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encryptedValue = openssl_encrypt($value, 'aes-256-cbc', ENCRYPTION_KEY, 0, $iv);
    return base64_encode($encryptedValue . '::' . $iv);
}

// Decrypt Cookie Data Function
function decryptCookie($ciphertext){
    list($encrypted_data, $iv) = explode('::', base64_decode($ciphertext), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', ENCRYPTION_KEY, 0, $iv);
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])){
    // Encrypt user data and save it to a cookie
    $encryptedCookieData = encryptCookie($_POST["username"]);
    setcookie('user_data', $encryptedCookieData, time() + (86400 * 30), "/"); // 86400 = 1 day

    // Additionally insert encrypted data into the database
    $stmt = $conn->prepare("INSERT INTO user_cookies (username, cookie_data) VALUES (?, ?)");
    $stmt->bind_param("ss", $_POST["username"], $encryptedCookieData);
    $stmt->execute();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Machiavellien Video Games</title>
</head>
<body>
<h1>Welcome to Machiavellien Video Games Website</h1>
<?php
if(!isset($_COOKIE['user_data'])) {
?>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">Login</button>
    </form>
<?php
} else {
    $decryptedUsername = decryptCookie($_COOKIE['user_data']);
    echo "<p>Welcome back, " . htmlspecialchars($decryptedUsername) . "!</p>";
}
?>
</body>
</html>
