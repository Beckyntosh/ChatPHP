<?php

// Connection parameters
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

// Create table for financial reports if it does not exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    report_type VARCHAR(50),
    year YEAR,
    content TEXT,
    submission_date DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableQuery)) {
    die("Error creating table: " . $conn->error);
}

// Handle report submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $companyName = $_POST['company_name'] ?? '';
    $reportType = $_POST['report_type'] ?? '';
    $year = $_POST['year'] ?? '';
    $content = $_POST['content'] ?? '';
    
    $insertQuery = "INSERT INTO financial_reports (company_name, report_type, year, content)
                    VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssis", $companyName, $reportType, $year, $content);
    
    if ($stmt->execute()) {
        echo "Report submitted successfully.";
    } else {
        echo "Error submitting report: " . $conn->error;
    }
}

// Handle search
$searchResults = [];
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
    $searchTerm = "%".$_GET['search']."%";
    $searchQuery = "SELECT company_name, report_type, year, content FROM financial_reports
                    WHERE CONCAT(company_name, ' ', report_type, ' ', year) LIKE ?";
    $stmt = $conn->prepare($searchQuery);
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    $searchResults = $result->fetch_all(MYSQLI_ASSOC);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School Supplies Website - Financial Reports</title>
    <style>
        .report { margin-bottom: 20px; padding: 10px; border: 1px solid #000; }
    </style>
</head>
<body>
    <h1>Financial Reports</h1>
    
    <h2>Submit a Report</h2>
    <form action="" method="post">
        <label for="company_name">Company Name:</label><br>
        <input type="text" id="company_name" name="company_name" required><br>
        
        <label for="report_type">Report Type (e.g., Q2 Earnings):</label><br>
        <input type="text" id="report_type" name="report_type" required><br>
        
        <label for="year">Year:</label><br>
        <input type="number" id="year" name="year" required><br>
        
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required></textarea><br>
        
        <input type="submit" value="Submit Report">
    </form>
    
    <h2>Search Reports</h2>
    <form action="" method="get">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" placeholder="e.g., Q2 earnings reports for tech companies 2023">
        <input type="submit" value="Search">
    </form>
    
    <?php if (!empty($searchResults)): ?>
        <h3>Search Results</h3>
        <?php foreach ($searchResults as $report): ?>
            <div class="report">
                <h4><?= htmlspecialchars($report['company_name'])  ?> - <?= htmlspecialchars($report['report_type'])  ?> (<?= $report['year'] ?>)</h4>
                <p><?= nl2br(htmlspecialchars($report['content'])) ?></p>
            </div>
        <?php endforeach; ?>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])): ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>
</html>
