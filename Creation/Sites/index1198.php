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

// Create the Financial Reports Table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
report_title VARCHAR(255) NOT NULL,
report_content TEXT NOT NULL,
report_year INT(4) NOT NULL,
report_quarter VARCHAR(2) NOT NULL,
report_category VARCHAR(100) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table financial_reports created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Search for reports
$search = $_GET['search'] ?? '';

if ($search) {
    $sql = "SELECT * FROM financial_reports WHERE 
    report_title LIKE ? OR 
    report_content LIKE ? AND
    report_year = ? AND
    report_category = 'tech'";

    $stmt = $conn->prepare($sql);
    $like_search = "%{$search}%";
    $year = 2023;
    $stmt->bind_param("ssi", $like_search, $like_search, $year);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = null;
}

// Insert a report
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_title = $_POST["report_title"];
    $report_content = $_POST["report_content"];
    $report_year = $_POST["report_year"];
    $report_quarter = $_POST["report_quarter"];
    $report_category = $_POST["report_category"];

    $sql = "INSERT INTO financial_reports (report_title, report_content, report_year, report_quarter, report_category)
    VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $report_title, $report_content, $report_year, $report_quarter, $report_category);
    $stmt->execute();

    echo "New record created successfully";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports Search</title>
</head>
<body>
<h2>Search Financial Reports</h2>
<form action="" method="get">
    <input type="text" name="search" placeholder="Search reports" value="<?php echo htmlspecialchars($search); ?>">
    <input type="submit" value="Search">
</form>

<h2>Submit a Financial Report</h2>
<form action="" method="post">
    <input type="text" name="report_title" placeholder="Title" required><br>
    <textarea name="report_content" placeholder="Content" required></textarea><br>
    <input type="number" name="report_year" placeholder="Year" required><br>
    <input type="text" name="report_quarter" placeholder="Quarter (Q1, Q2, Q3, Q4)" required><br>
    <input type="text" name="report_category" placeholder="Category (e.g., tech)" required><br>
    <input type="submit" value="Submit Report">
</form>

<?php if ($result && $result->num_rows > 0): ?>
    <h2>Search Results</h2>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li><?php echo htmlspecialchars($row["report_title"]); ?> - <?php echo htmlspecialchars($row["report_year"]); ?></li>
        <?php endwhile; ?>
    </ul>
<?php elseif($result): ?>
    <p>No results found!</p>
<?php endif; ?>
</body>
</html>
