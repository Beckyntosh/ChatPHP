<?php
// =========================================================
// Secure Watches Website Using Vault for API Key Management
// =========================================================

session_start();
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Check if vault_keys table exists, if not create it
$sql = "CREATE TABLE IF NOT EXISTS vault_keys (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    api_key_name VARCHAR(50) NOT NULL,
    api_key_value TEXT NOT NULL,
    reg_date TIMESTAMP
)";
if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

/**
 * Fetch API Key from Vault (Simulated as Database for this Example)
 *
 * @param string $keyName
 * @return string|null
 */
function fetchApiKeyFromVault($keyName) {
    global $conn;
    $stmt = $conn->prepare("SELECT api_key_value FROM vault_keys WHERE api_key_name=?");
    $stmt->bind_param("s", $keyName);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['api_key_value'];
    } else {
        return null;
    }
}

/**
 * Insert API Key into Vault (For Initial Setup)
 *
 * @param string $keyName
 * @param string $keyValue
 * @return void
 */
function insertApiKeyIntoVault($keyName, $keyValue) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO vault_keys (api_key_name, api_key_value) VALUES (?, ?)");
    $stmt->bind_param("ss", $keyName, $keyValue);
    $stmt->execute();
}

// Example to Add or Update API Key in Vault (comment out after first run)
// insertApiKeyIntoVault("ExampleAPIKey", "S3cureK3y!");

// HTML and PHP Frontend
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Watches Website</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        h2 { color: #333; text-align: center; }
        .watch-list { margin-top: 20px; }
        .watch { border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
        .watch img { max-width: 100%; }
        .watch h3 { margin-top: 0; }
    </style>
</head>
<body>
<div class="container">
    <h2>Secure Watches Collection</h2>
    <div class="watch-list">
        <?php
        // Dynamic content would be fetched and displayed here, e.g., fetching data from an API
        // assuming API Key retrieval for demonstration
        $apiKey = fetchApiKeyFromVault("ExampleAPIKey");
        if ($apiKey) {
            // Simulate API Call with API Key (In real scenario, use cURL or similar)
            echo "<div class='watch'><h3>Watch 1</h3><p>API Key used successfully.</p></div>";
        } else {
            echo "<p>Failed to retrieve API Key.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>

<?php
$conn->close();
?>