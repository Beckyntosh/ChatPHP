<?php
// Database connection settings
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

// Create table if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    report_type VARCHAR(100) NOT NULL,
    year YEAR NOT NULL,
    quarter VARCHAR(50),
    content TEXT,
    report_date DATE NOT NULL
)";

if (!$conn->query($createTableSql)) {
    die("Error creating table: " . $conn->error);
}

$searchTerm = $_GET['searchTerm'] ?? '';

// Search query
$searchSql = "SELECT company_name, report_type, year, quarter, report_date, content FROM financial_reports WHERE content LIKE ?";
$stmt = $conn->prepare($searchSql);
$searchWildcard = "%" . $searchTerm . "%";
$stmt->bind_param("s", $searchWildcard);
$stmt->execute();
$result = $stmt->get_result();

// HTML + PHP for frontend
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Financial Reports</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .report { margin-bottom: 20px; padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .report h2 { margin-top: 0; }
        .search-box { margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="search-box">
    <form action="" method="get">
        <input type="text" name="searchTerm" placeholder="Search reports, e.g., 'Q2 earnings reports for tech companies 2023'" value="<?php echo htmlspecialchars($searchTerm); ?>">
        <button type="submit">Search</button>
    </form>
</div>

<?php
// Display search results
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='report'>";
        echo "<h2>" . htmlspecialchars($row['company_name']) . " - " . htmlspecialchars($row['report_type']) . " (" . htmlspecialchars($row['year']) . ", Q" . htmlspecialchars($row['quarter']) . ")</h2>";
        echo "<p>Date: " . htmlspecialchars($row['report_date']) . "</p>";
        echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No reports found. Please refine your search.</p>";
}
?>

</body>
</html>
<?php
// Close connection
$conn->close();
?>
