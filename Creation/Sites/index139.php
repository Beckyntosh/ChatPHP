<?php

$host = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$query = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    report_type VARCHAR(50) NOT NULL,
    year YEAR NOT NULL,
    quarter VARCHAR(2) NOT NULL,
    document MEDIUMTEXT NOT NULL
)";

$conn->query($query);

if (isset($_GET['search'])) {
    $searchTerm = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM financial_reports WHERE report_type LIKE '%earnings%' AND document LIKE '%tech%' AND year = 2023 AND quarter = 'Q2' AND company_name LIKE '%$searchTerm%'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports Search</title>
</head>
<body>
    <h1>Search Q2 Earnings Reports for Tech Companies 2023</h1>
    <form method="get">
        <input type="text" name="search" placeholder="Enter Company Name">
        <button type="submit">Search</button>
    </form>
    <?php if (isset($result) && $result->num_rows > 0): ?>
        <h2>Search Results</h2>
        <table>
            <tr>
                <th>Company Name</th>
                <th>Report Type</th>
                <th>Year</th>
                <th>Quarter</th>
                <th>Document</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['company_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['report_type']); ?></td>
                    <td><?php echo htmlspecialchars($row['year']); ?></td>
                    <td><?php echo htmlspecialchars($row['quarter']); ?></td>
                    <td><?php echo htmlspecialchars($row['document']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <?php if(isset($_GET['search'])): ?>
            <p>No results found for "<?php echo htmlspecialchars($_GET['search']); ?>". Please try a different search term.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>

<?php
$conn->close();
?>
