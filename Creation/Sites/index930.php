<?php
session_start();

// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Encryption and Decryption keys
define('ENCRYPTION_KEY', 'YourSecretKeyHere123!');

// Encrypt function
function encryptSessionData($data) {
    $encryptionKey = base64_decode(ENCRYPTION_KEY);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryptionKey, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

// Decrypt function
function decryptSessionData($data) {
    $encryptionKey = base64_decode(ENCRYPTION_KEY);
    list($encryptedData, $iv) = array_pad(explode('::', base64_decode($data), 2), 2, null);
    return openssl_decrypt($encryptedData, 'aes-256-cbc', $encryptionKey, 0, $iv);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['petName'])) {
    $username = $_POST['username'];
    $petName = $_POST['petName'];

    // Encrypt session data
    $_SESSION['encryptedSession'] = encryptSessionData("Username: $username, PetName: $petName");
    
    // Optional: Store in database
    $encryptedSessionData = $conn->real_escape_string($_SESSION['encryptedSession']);
    $sql = "INSERT INTO users_sessions (session_data) VALUES ('$encryptedSessionData')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Session data encrypted and stored successfully!')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pet Supplies - Secure Session</title>
    <style>
        body {font-family: Arial, sans-serif; background-color: #f0f0f0;}
        .container {max-width: 600px; margin: 50px auto; padding: 20px; background: #fff;}
        form {margin-top: 20px;}
        input[type=text], input[type=submit] {
            width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ddd; border-radius: 4px;
        }
        input[type=submit] {
            background-color: #4CAF50; color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Pet Supplies - Secure your Pet Session</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="petName" placeholder="Pet Name" required>
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
