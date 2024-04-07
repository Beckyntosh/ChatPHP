<?php
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

// Encrypt function
function encryptData($data, $secretKey) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encryptedData = openssl_encrypt($data, 'aes-256-cbc', $secretKey, 0, $iv);
    return base64_encode($encryptedData . '::' . $iv);
}

// Decrypt function
function decryptData($data, $secretKey) {
    list($encryptedData, $iv) = array_pad(explode('::', base64_decode($data), 2), 2, null);
    return openssl_decrypt($encryptedData, 'aes-256-cbc', $secretKey, 0, $iv);
}

$secretKey = 'yourSecretKey';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect input data
    $name = $_POST['name'];
    $address = encryptData($_POST['address'], $secretKey);
    $phone = encryptData($_POST['phone'], $secretKey);

    $sql = "INSERT INTO users (name, address, phone) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $name, $address, $phone);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Encrypt User Data</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" required><br>
        <label for="phone">Phone Number:</label><br>
        <input type="text" id="phone" name="phone" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>