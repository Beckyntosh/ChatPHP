<?php
// Simple Encryption Demo
// This code is meant for educational and research purposes.
// Note: Make sure to properly secure your database credentials and consider using environment variables and secure connection methods.

// Database configuration
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "my_database");

// Attempts to establish connection to the database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Function to encrypt user data
function encryptData($data, $key){
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $cipherTextRaw = openssl_encrypt($data, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $cipherTextRaw, $key, $as_binary=true);
    return base64_encode( $iv.$hmac.$cipherTextRaw );
}

// Function to decrypt user data
function decryptData($encryptedData, $key){
    $c = base64_decode($encryptedData);
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $cipherTextRaw = substr($c, $ivlen+$sha2len);
    $originalPlaintext = openssl_decrypt($cipherTextRaw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $cipherTextRaw, $key, $as_binary=true);
    if (hash_equals($hmac, $calcmac)) return $originalPlaintext;
    return false;
}

// Secret key for encryption/decryption (in a real-world scenario, use a more secure method for handling the key)
$secretKey = 'mySecretKey12345';

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["user_address"]) && !empty($_POST["user_phone"])) {

    // Encrypt user data
    $encryptedAddress = encryptData($_POST["user_address"], $secretKey);
    $encryptedPhone = encryptData($_POST["user_phone"], $secretKey);

    // Insert encrypted data into the database
    try {
        $sql = "INSERT INTO users (address, phone) VALUES (:address, :phone)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':address', $encryptedAddress, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $encryptedPhone, PDO::PARAM_STR);
        $stmt->execute();
        echo '<p>User data encrypted and stored successfully.</p>';
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }   
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Encrypt User Data</title>
</head>
<body style="text-align: center;">
    <h2>Encrypt User Data</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="user_address">Address:</label><br>
        <input type="text" id="user_address" name="user_address" required><br>
        <label for="user_phone">Phone Number:</label><br>
        <input type="text" id="user_phone" name="user_phone" required><br><br>
        <input type="submit" value="Encrypt and Store">
    </form>
</body>
</html>

<?php
// Close the database connection
unset($pdo);
?>