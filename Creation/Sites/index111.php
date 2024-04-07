

<?php
// Simple example - ensure to expand, secure, and validate for production use

$host = "db"; // Use "localhost" if running without Docker or specific environment
$dbname = "my_database";
$username = "root";
$password = "root"; // Strongly recommend using environment variables or secured credentials management for passwords

// Connect to the database
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

// Create tables if not exist (Simplified structure)
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    report_type VARCHAR(50) NOT NULL,
    year INT(4) NOT NULL,
    report_details TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->exec($tableCreationQuery);

$search = $_GET['search'] ?? '';

// Assuming user searches with 'Q2 earnings reports for tech companies 2023'
if (!empty($search)) {
    $searchQuery = "SELECT * FROM financial_reports WHERE report_type='Q2' AND year=2023 AND company_name LIKE '%tech%'";
    $stmt = $conn->prepare($searchQuery);
    $stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $results = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Financial Reports</title>
</head>
<body>
<h2>Q2 Earnings Reports for Tech Companies 2023</h2>
<form>
    <input type="text" name="search" placeholder="Type 'search' to simulate">
    <button type="submit">Search</button>
</form>

<?php if (!empty($results)): ?>
    <ul>
        <?php foreach ($results as $report): ?>
            <li>
                <?= htmlspecialchars($report['company_name']) ?>: 
                <?= htmlspecialchars($report['report_details']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No results found</p>
<?php endif; ?>

</body>
</html>

