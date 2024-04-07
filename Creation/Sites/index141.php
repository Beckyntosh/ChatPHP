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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS FinancialReports (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
company VARCHAR(50),
report_type VARCHAR(50),
year YEAR,
quarter VARCHAR(50),
content TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Searching mechanism
$search = $_POST['search'] ?? ''; // PHP 7 Null coalescing operator
$keywords = explode(' ', $search);
$whereParts = array_map(function($keyword) {
    return "content LIKE '%" . $keyword . "%'";
}, $keywords);
$where = implode(' AND ', $whereParts);

$sql = "SELECT company, report_type, year, quarter, content FROM FinancialReports WHERE $where";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Financial Reports</title>
    <style>
        input[type=text], select, button {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h2>Search for Financial Reports</h2>
    <form action="" method="post">
        <label for="search">Enter keywords (e.g., "Q2 earnings reports for tech companies 2023"):</label>
        <input type="text" id="search" name="search" placeholder="Your keywords...">
        <button type="submit">Search</button>
    </form>
    <h2>Results:</h2>
    <?php if (!empty($search) && $result->num_rows > 0): ?>
        <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <strong>Company:</strong> <?= $row["company"] ?> <br>
                <strong>Type:</strong> <?= $row["report_type"] ?> <br>
                <strong>Year:</strong> <?= $row["year"] ?> <br>
                <strong>Quarter:</strong> <?= $row["quarter"] ?> <br>
                <p><?= $row["content"] ?></p>
            </li>
        <?php endwhile; ?>
        </ul>
    <?php elseif (!empty($search)): ?>
        No results found.
    <?php endif; ?>
    <?php $conn->close(); ?>
</body>
</html>
