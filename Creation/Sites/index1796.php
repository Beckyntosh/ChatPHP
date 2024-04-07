<?php
// DISCLAIMER: This is a simplified example for educational purposes. 
// Always consult with a security expert when dealing with sensitive information.

// CONNECT TO DATABASE
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

// TABLE CREATION (RUN ONCE)
// Uncomment the following SQL query to create the necessary table
*
$sql = "CREATE TABLE payment_methods (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    card_number VARCHAR(255),
    expiry_date VARCHAR(5),
    cvv VARCHAR(5),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table payment_methods created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/

// ENCRYPTION FUNCTION
function encryptData($data, $secretKey) {
    $ivLength = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivLength);
    $encryptedData = openssl_encrypt($data, $cipher, $secretKey, $options=0, $iv);
    return base64_encode($encryptedData . '::' . $iv);
}

// DECRYPTION FUNCTION
function decryptData($data, $secretKey) {
    list($encryptedData, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
    return openssl_decrypt($encryptedData, $cipher="AES-128-CBC", $secretKey, $options=0, $iv);
}

// HANDLE POST REQUEST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['user_id'];
    $cardNumber = encryptData($_POST['card_number'], 'secretKey12345678');
    $expiryDate = encryptData($_POST['expiry_date'], 'secretKey12345678');
    $cvv = encryptData($_POST['cvv'], 'secretKey12345678');
    
    $sql = "INSERT INTO payment_methods (user_id, card_number, expiry_date, cvv) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $userId, $cardNumber, $expiryDate, $cvv);
    
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Payment Method</title>
</head>
<body>
    <form method="POST">
        User ID: <input type="number" name="user_id" required><br>
        Card Number: <input type="text" name="card_number" required><br>
        Expiry Date (MM/YY): <input type="text" name="expiry_date" required><br>
        CVV: <input type="text" name="cvv" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
