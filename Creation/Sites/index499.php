<?php

// Simple Encryption/Decryption function based on openssl
function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';
    // hash
    $key = hash('sha256', $secret_key);
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

$db_servername = "db";
$db_username = "root";
$db_password = "root";
$db_name = "my_database";
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS UserEmails (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    encrypted_email VARCHAR(255) NOT NULL
    )";
if ($conn->query($table_sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["email"])) {
    $email = $_POST["email"];
    $encryptedEmail = encrypt_decrypt('encrypt', $email);

    $stmt = $conn->prepare("INSERT INTO UserEmails (email, encrypted_email) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $encryptedEmail);
    $stmt->execute();

    // Email sending simulation (Displaying encrypted email instead)
    echo "<p>Encrypted email sent: " . htmlentities($encryptedEmail) . "</p>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gardening Tools Website</title>
</head>
<body>
    <h1>Subscribe to Gardening Tools Newsletter</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="email">Email address:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Subscribe">
    </form>
</body>
</html>

<?php
$conn->close();
?>