<?php

// Simple encryption and decryption demo for storing user data securely
// WARNING: This code is provided for educational purposes and might require additional security measures for production use.

$secretKey = 'mySecretKey'; // Change this to your unique secret key
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

// Database connection parameters
$MYSQL_HOST = 'db';
$MYSQL_USER = 'root';
$MYSQL_PASS = 'root';
$MYSQL_DB = 'my_database';

// Connect to MySQL database
$conn = new mysqli($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS user_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL
)";

if (!$conn->query($tableCreationQuery)) {
    echo "Error creating table: " . $conn->error;
}

function encryptData($data, $key, $iv){
    return openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
}

function decryptData($data, $key, $iv){
    return openssl_decrypt($data, 'aes-256-cbc', $key, 0, $iv);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $address = encryptData($_POST['address'], $secretKey, $iv);
    $phone = encryptData($_POST['phone'], $secretKey, $iv);

    $stmt = $conn->prepare("INSERT INTO user_data (fullname, address, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $address, $phone);
    
    if ($stmt->execute()) {
        echo "Record saved successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Watches Website</title>
<style>
    body { font-family: 'Arial', sans-serif; background-color: #f0f0f0; }
    form, h2 { background-color: #ffffff; padding: 20px; margin: 20px auto; width: 300px; border-radius: 8px; }
    input[type="text"] { width: 100%; margin: 10px 0; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
    input[type="submit"] { background-color: #009688; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; }
    input[type="submit"]:hover { background-color: #00796b; }
</style>
</head>
<body>

<h2>Register your product</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="fullname">Full Name:</label>
  <input type="text" id="fullname" name="fullname" required>

  <label for="address">Address:</label>
  <input type="text" id="address" name="address" required>

  <label for="phone">Phone Number:</label>
  <input type="text" id="phone" name="phone" required>

  <input type="submit" value="Submit">
</form>

</body>
</html>
<?php
$conn->close();
?>