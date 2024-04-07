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

// Create table if it does not exist
$table = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company VARCHAR(50) NOT NULL,
    report_type VARCHAR(50) NOT NULL,
    year INT(4) NOT NULL,
    quarter VARCHAR(2) NOT NULL,
    report TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

$search = $_GET['search'] ?? '';

$sql = "SELECT company, report_type, year, quarter, report FROM financial_reports WHERE report_type LIKE '%earnings%' AND company LIKE '%tech%' AND year = 2023 AND quarter = 'Q2'";
if ($search) {
    $sql .= " AND (company LIKE '%$search%' OR report LIKE '%$search%')";
}

$result = $conn->query($sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<h2>Search Q2 Earnings Reports for Tech Companies 2023</h2>
<form action="" method="GET">
    <input type="text" name="search" placeholder="Search reports..." value="<?php echo htmlspecialchars($search); ?>">
    <button type="submit">Search</button>
</form>
<?php if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>Company</th>
            <th>Type</th>
            <th>Year</th>
            <th>Quarter</th>
            <th>Report</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['company']); ?></td>
                <td><?php echo htmlspecialchars($row['report_type']); ?></td>
                <td><?php echo htmlspecialchars($row['year']); ?></td>
                <td><?php echo htmlspecialchars($row['quarter']); ?></td>
                <td><?php echo htmlspecialchars($row['report']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No reports found.</p>
<?php endif; ?>
</body>
</html>
