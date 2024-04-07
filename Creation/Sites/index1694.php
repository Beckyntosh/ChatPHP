<?php
// DISCLAIMER: This example is simplified and not suitable for production without further security enhancements.

// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for encrypted card data if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS payment_methods (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    card_data VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
)";
if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

// Encrypt and store credit card data
function encryptAndStoreCardData($userId, $cardData) {
    global $conn;

    // Use OpenSSL for encryption
    $cipher = "aes-256-cbc";
    $encryption_key = openssl_random_pseudo_bytes(32);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
    $encryptedData = openssl_encrypt($cardData, $cipher, $encryption_key, 0, $iv);
    $combinedData = base64_encode($encryptedData . '::' . $iv);

    // Store encrypted data
    $stmt = $conn->prepare("INSERT INTO payment_methods (user_id, card_data) VALUES (?, ?)");
    $stmt->bind_param("is", $userId, $combinedData);
    $stmt->execute();
    $stmt->close();
}

// HTML and PHP for the frontend
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Method Management</title>
</head>
<body>
<h2>Add a Credit Card</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    User ID: <input type="number" name="userId" required><br>
    Card Data: <input type="text" name="cardData" required><br>
    <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simplified validation and sanitization
    $userId = intval($_POST['userId']);
    $cardData = $_POST['cardData'];

    encryptAndStoreCardData($userId, $cardData);
    echo "Credit card added successfully.";
}
?>

</body>
</html>

<?php
$conn->close();
?>
