<?php
// Start the session
session_start();

// Database connection variables
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create encryption and decryption functions
function encryptCookie($value){
   // Ideally, use a secure method to generate and store the encryption key and IV
   $key = 'yourEncryptionKey'; // Should be 32 bytes for AES-256-CBC
   $iv = substr(hash('sha256', 'your_iv'), 0, 16); // Example IV generation, not recommended for production
   $newvalue = base64_encode(openssl_encrypt($value, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));
   return $newvalue;
}

function decryptCookie($value){
   $key = 'yourEncryptionKey';
   $iv = substr(hash('sha256', 'your_iv'), 0, 16); // Ensure this matches the IV used for encryption
   $newvalue = openssl_decrypt(base64_decode($value), 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
   return $newvalue;
}

// Example usage
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Suppose you have a users' table and verify the user exists and password is correct
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Set cookie with encrypted user information
        $cookie_name = "userLogin";
        $cookie_value = encryptCookie("username=$username&password=$password");
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Health and Wellness Products - Secure Login</title>
    <style>
        body { background-color: #f0f0f5; font-family: Arial, sans-serif; }
        .container { width: 300px; margin: 100px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        input[type="submit"] { background-color: #5cb85c; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; width: 100%; }
        input[type="submit"]:hover { background-color: #4cae4c; }
    </style>
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <form method="post">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" required><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br><br>
      <input type="submit" name="login" value="Login">
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
