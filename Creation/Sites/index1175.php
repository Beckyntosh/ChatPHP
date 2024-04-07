<?php
// Quick setup: MYSQL connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Establish a MYSQL connection
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create financial_reports table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    report_type VARCHAR(50) NOT NULL,
    year YEAR(4),
    quarter VARCHAR(5),
    report_text TEXT,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $_POST['company_name'];
    $report_type = $_POST['report_type'];
    $year = $_POST['year'];
    $quarter = $_POST['quarter'];
    $report_text = $_POST['report_text'];

    $query = $conn->prepare("INSERT INTO financial_reports (company_name, report_type, year, quarter, report_text) VALUES (?, ?, ?, ?, ?)");
    $query->bind_param("sssss", $company_name, $report_type, $year, $quarter, $report_text);

    if($query->execute()) {
        echo "<p>Report submitted successfully!</p>";
    } else {
        echo "<p>Error submitting report: " . $conn->error . "</p>";
    }
}

// Handle search
$search_result = [];
if (isset($_GET['search'])) {
    $search_term = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM financial_reports WHERE CONCAT_WS(' ', company_name, report_type, year, quarter) LIKE '%$search_term%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $search_result[] = $row;
        }
    } else {
        $search_result = "No results found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Reports Submission & Search</title>
</head>
<body>
    <h2>Submit a Financial Report</h2>
    <form method="post">
        Company Name: <input type="text" name="company_name" required><br>
        Report Type: <input type="text" name="report_type" required><br>
        Year: <input type="number" name="year" required><br>
        Quarter: <input type="text" name="quarter"><br>
        Report Text: <textarea name="report_text" required></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Search Financial Reports</h2>
    <form>
        <input type="text" name="search" placeholder="Search...">
        <input type="submit" value="Search">
    </form>

    <?php if (!empty($search_result) && is_array($search_result)) : ?>
        <h3>Search Results</h3>
        <?php foreach ($search_result as $report) : ?>
            <p>
                <strong>Company:</strong> <?= $report['company_name']; ?><br>
                <strong>Type:</strong> <?= $report['report_type']; ?><br>
                <strong>Year:</strong> <?= $report['year']; ?><br>
                <strong>Quarter:</strong> <?= $report['quarter']; ?><br>
                <strong>Report:</strong> <?= nl2br($report['report_text']); ?><br>
            </p>
        <?php endforeach; ?>
    <?php elseif ($search_result == "No results found") : ?>
        <p>No results found.</p>
    <?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
