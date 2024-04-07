<?php
// This script both sets up the database and provides a basic frontend for displaying watches.
// It assumes a more complex infrastructure for handling secure storage of API keys (like HashiCorp Vault) is beyond this scope.

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_USER', 'root'); // Normally, you'd have a different user
define('MYSQL_DB', 'my_database');
define('MYSQL_SERVER', 'db');

try {
    // Create connection
    $pdo = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DB, MYSQL_USER, MYSQL_ROOT_PSWD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS Watches (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        brand VARCHAR(30) NOT NULL,
        model VARCHAR(30) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        reg_date TIMESTAMP
    )";
    
    $pdo->exec($sql);
    
} catch(PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

// Simple API Key retrieval (Example, should be replaced with a call to a secure vault/system)
function getAPIKey() {
    // This function would interact with a secure vault or environment variable to get an API key
    // Mock returning an API key for demonstration purposes
    return 'example_api_key';
}

// Fetch watches from the database (simulating usage of an API key, although here we're directly accessing the DB)
function fetchWatches($pdo) {
    $statement = $pdo->prepare("SELECT * FROM Watches");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Insert sample data if table is empty
try {
    $check = $pdo->query("SELECT COUNT(*) FROM Watches")->fetchColumn();
    if ($check == 0) {
        $pdo->exec("INSERT INTO Watches (brand, model, price) VALUES ('Rolex', 'Submariner', 7499.99), ('Omega', 'Seamaster', 4999.99)");
    }
} catch (PDOException $e) {
    die("Could not insert sample data: " . $e->getMessage());
}

// Frontend
$watches = fetchWatches($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Watches Shop</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Available Watches</h1>
    <table>
        <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($watches as $watch): ?>
            <tr>
                <td><?= htmlspecialchars($watch['brand']) ?></td>
                <td><?= htmlspecialchars($watch['model']) ?></td>
                <td>$<?= number_format($watch['price'], 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>