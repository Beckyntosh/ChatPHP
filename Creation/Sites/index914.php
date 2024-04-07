
<?php

// Database Configuration
define('MYSQL_HOST', 'db');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');

// Connect to MySQL Database
$conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for storing document information
$tableSql = "CREATE TABLE IF NOT EXISTS documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
signature TEXT NOT NULL,
verified BOOLEAN DEFAULT FALSE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
    echo "Table documents created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Function to generate digital signature
function generateDigitalSignature($data, $privateKey) {
    openssl_sign($data, $signature, $privateKey);
    return base64_encode($signature);
}

// Function to verify digital signature
function verifyDigitalSignature($data, $signature, $publicKey) {
    $signature = base64_decode($signature);
    return openssl_verify($data, $signature, $publicKey);
}

// Handle Document Upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['document'])) {
    $filename = $_FILES['document']['name'];
    $fileData = file_get_contents($_FILES['document']['tmp_name']);
    
    // Load private key (This should be securely stored and not hardcoded in a real application)
    $privateKey = openssl_pkey_get_private("file://path/to/private.key");
    
    // Generate digital signature
    $signature = generateDigitalSignature($fileData, $privateKey);
    
    // Save document and signature to database
    $stmt = $conn->prepare("INSERT INTO documents (filename, signature) VALUES (?, ?)");
    $stmt->bind_param("ss", $filename, $signature);
    $stmt->execute();
    
    echo "Document uploaded and signed successfully.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Document Verification for Shoes Website</title>
    <style>
        body { font-family: 'Courier New', Courier, monospace; background-color: #f0f0f0; }
        .container { width: 80%; margin: 0 auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px #aaa; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; }
        .form-group input, .form-group button { width: 100%; padding: 10px; }
        .form-group button { background-color: #008cba; color: #fff; cursor: pointer; border: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Document for Digital Signature</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="document">Document:</label>
                <input type="file" id="document" name="document" required>
            </div>
            <div class="form-group">
                <button type="submit">Upload & Sign Document</button>
            </div>
        </form>
    </div>
</body>
</html>
