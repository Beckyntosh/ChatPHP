<?php
// Initialize connection variables.
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
$tableQuery = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_title VARCHAR(255) NOT NULL,
    year VARCHAR(4) NOT NULL,
    quarter VARCHAR(2) NOT NULL,
    company_sector VARCHAR(50),
    report TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($tableQuery) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for search
    if (isset($_POST["search"])) {
        $keyword = '%' . $conn->real_escape_string($_POST['keyword']) . '%';
        $searchQuery = "SELECT * FROM financial_reports WHERE report_title LIKE ? OR company_sector LIKE ?";
        $stmt = $conn->prepare($searchQuery);
        $stmt->bind_param("ss", $keyword, $keyword);
        $stmt->execute();
        $result = $stmt->get_result();
        $searchResults = $result->fetch_all(MYSQLI_ASSOC);
    } elseif (isset($_POST["submit_report"])) {
        // Handle form submission for report submission
        $report_title = $_POST['report_title'];
        $year = $_POST['year'];
        $quarter = $_POST['quarter'];
        $company_sector = $_POST['company_sector'];
        $report = $_POST['report'];
        
        $insertQuery = "INSERT INTO financial_reports (report_title, year, quarter, company_sector, report) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sssss", $report_title, $year, $quarter, $company_sector, $report);
        
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
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

<h2>Search for Financial Reports</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <label for="keyword">Search:</label><br>
  <input type="text" id="keyword" name="keyword" value=""><br><br>
  <input type="submit" name="search" value="Search">
</form>

<?php if (!empty($searchResults)) : ?>
    <h3>Search Results</h3>
    <ul>
    <?php foreach ($searchResults as $row) : ?>
        <li><?= htmlspecialchars($row["report_title"]) ?> - <?= htmlspecialchars($row["company_sector"]) ?> (<?= htmlspecialchars($row["year"]) ?> Q<?= htmlspecialchars($row["quarter"]) ?>)</li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

<h2>Submit a Financial Report</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <label for="report_title">Report Title:</label><br>
  <input type="text" id="report_title" name="report_title" value=""><br>
  <label for="year">Year:</label><br>
  <input type="text" id="year" name="year" value=""><br>
  <label for="quarter">Quarter:</label><br>
  <input type="text" id="quarter" name="quarter" value=""><br>
  <label for="company_sector">Company Sector:</label><br>
  <input type="text" id="company_sector" name="company_sector" value=""><br>
  <label for="report">Report:</label><br>
  <textarea id="report" name="report" rows="4" cols="50"></textarea><br><br>
  <input type="submit" name="submit_report" value="Submit Report">
</form>

</body>
</html>
