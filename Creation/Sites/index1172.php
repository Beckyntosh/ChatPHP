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

$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company VARCHAR(255) NOT NULL,
    report_type VARCHAR(50),
    year INT,
    quarter INT,
    report TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['report'])) {
    $company = $_POST['company'] ?? '';
    $report_type = $_POST['report_type'] ?? '';
    $year = $_POST['year'] ?? date("Y");
    $quarter = $_POST['quarter'] ?? 0;
    $report = $_POST['report'] ?? '';

    $stmt = $conn->prepare("INSERT INTO financial_reports (company, report_type, year, quarter, report) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $company, $report_type, $year, $quarter, $report);
    
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$search_result = [];
if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM financial_reports WHERE CONCAT(company, ' ', report_type, ' ', year) LIKE '%$search%'";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $search_result = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $search_result = [];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Financial Reports</title>
</head>
<body>
    <h1>Search Q2 Earnings Reports for Tech Companies 2023</h1>
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Search reports...">
        <button type="submit">Search</button>
    </form>
    <br>
    <h2>Submit Report</h2>
    <form action="" method="POST">
        <input type="text" name="company" placeholder="Company" required>
        <input type="text" name="report_type" placeholder="Report Type" required>
        <input type="number" name="year" placeholder="Year" required>
        <input type="number" name="quarter" placeholder="Quarter" required>
        <textarea name="report" placeholder="Report..." required></textarea>
        <button type="submit">Submit Report</button>
    </form>
    <br>
    <?php if(!empty($search_result)): ?>
        <h2>Search Results</h2>
        <?php foreach ($search_result as $row): ?>
            <p>
                <strong>Company:</strong> <?php echo $row["company"]; ?><br>
                <strong>Report Type:</strong> <?php echo $row["report_type"]; ?><br>
                <strong>Year:</strong> <?php echo $row["year"]; ?><br>
                <strong>Quarter:</strong> <?php echo $row["quarter"]; ?><br>
                <strong>Report:</strong> <?php echo $row["report"]; ?><br>
            </p>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
