
<?php
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Encryption and decryption keys should be stored safely, for this example, we use these simple strings
define('ENCRYPTION_KEY', 'a1Bz20ydqelm8nh0FbRpOg7Tn1TgWbqD');
define('IV', 'fYfhHeDm239bD2E4'); // Initial vector for encryption

function encryptEmail($email){
    return openssl_encrypt($email, "AES-256-CBC", ENCRYPTION_KEY, 0, IV);
}

function decryptEmail($encryption){
    return openssl_decrypt($encryption, "AES-256-CBC", ENCRYPTION_KEY, 0, IV);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $encryptedEmail = encryptEmail($email);

    // Insert into database (assuming a table "users" with columns "id" and "email_encrypted")
    $sql = "INSERT INTO users (email_encrypted) VALUES (?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$encryptedEmail]);

    // For demonstration, we'll decrypt it right away to show how it works
    $decryptedEmail = decryptEmail($encryptedEmail);
    
    // Send email logic here (Simulation purpose)
    echo "Sending encrypted email to: $decryptedEmail ... Sent!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Email Form for Hair Care Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0efe2;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
        }
        input[type=email], input[type=submit] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Subscribe to Hair Care Products Newsletter</h2>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Subscribe">
    </form>
</div>
</body>
</html>
