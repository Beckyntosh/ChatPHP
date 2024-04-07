<?php
// Set-up: This is a simplified setup assuming PHP 7.4 or above and OpenSSL extension for PHP enabled.

// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for storing digital signatures if it doesn't exist
$table = "CREATE TABLE IF NOT EXISTS document_signatures (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    document_name VARCHAR(255) NOT NULL,
    signature TEXT NOT NULL,
    reg_date TIMESTAMP
)";
$conn->query($table);

// HTML and PHP code to upload and verify documents
?>
<!DOCTYPE html>
<html>
<head>
    <title>Document Authenticity Verification</title>
</head>
<body>
    <h1>Upload Document for Verification</h1>
    <form method="post" enctype="multipart/form-data">
        Select document to upload:
        <input type="file" name="document" id="document">
        <input type="submit" value="Upload Document" name="submit">
    </form>

<?php
// Function to sign the document
function signTheDocument($document, $privateKey) {
    openssl_sign($document, $signature, $privateKey, OPENSSL_ALGO_SHA256);
    return base64_encode($signature);
}

// Function to verify the document
function verifyDocument($document, $signature, $publicKey) {
    $signature = base64_decode($signature);
    $result = openssl_verify($document, $signature, $publicKey, OPENSSL_ALGO_SHA256);
    return $result === 1; // Returns true if verification is successful
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Upload document and create a digital signature
    if (isset($_FILES['document'])) {
        $documentName = $_FILES['document']['name'];
        $documentTmpName = $_FILES['document']['tmp_name'];
        $documentContent = file_get_contents($documentTmpName);

        // Generate a new private and public key for demonstration purposes
        $privateKey = openssl_pkey_new([
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ]);
        $publicKey = openssl_pkey_get_details($privateKey)['key'];

        // Create a signature
        $signature = signTheDocument($documentContent, $privateKey);

        // Store the document and its signature in the database
        $stmt = $conn->prepare("INSERT INTO document_signatures (document_name, signature) VALUES (?, ?)");
        $stmt->bind_param("ss", $documentName, $signature);
        $stmt->execute();

        echo "Document uploaded and signed successfully.<br>";
    }
}

$conn->close();
?>
</body>
</html>

**Note**: This example is simplified and lacks many crucial features needed for a real application, such as error handling, security considerations (e.g., SQL injections, XSS protections), and comprehensive document management functionalities. Remember to handle file uploads securely and manage your private keys with utmost security in a production environment.