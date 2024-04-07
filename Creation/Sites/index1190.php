<?php
// Connection parameters
$servername = "db";
$username = "root";
$mysql_root_pswd = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $mysql_root_pswd, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_name VARCHAR(255) NOT NULL,
    report_period VARCHAR(50) NOT NULL,
    report_year INT(4) NOT NULL,
    content TEXT,
    company_sector VARCHAR(100),
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableSql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_report"])) {
    $reportName = $_POST["reportName"];
    $reportPeriod = $_POST["reportPeriod"];
    $reportYear = $_POST["reportYear"];
    $content = $_POST["content"];
    $companySector = $_POST["companySector"];

    $insertSql = "INSERT INTO financial_reports (report_name, report_period, report_year, content, company_sector) 
                  VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("ssiss", $reportName, $reportPeriod, $reportYear, $content, $companySector);

    if($stmt->execute()) {
        echo "Report submitted successfully";
    } else {
        echo "Error submitting report: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Reports Submission and Search</title>
</head>
<body>
    <h1>Submit Financial Report</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="reportName">Report Name:</label><br>
        <input type="text" id="reportName" name="reportName" required><br>
        <label for="reportPeriod">Report Period:</label><br>
        <input type="text" id="reportPeriod" name="reportPeriod" required><br>
        <label for="reportYear">Report Year:</label><br>
        <input type="number" id="reportYear" name="reportYear" required><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required></textarea><br>
        <label for="companySector">Company Sector:</label><br>
        <input type="text" id="companySector" name="companySector" required><br>
        <input type="submit" name="submit_report" value="Submit Report">
    </form> 

    <h1>Search Financial Reports</h1>
    <form method="get" action="search_results.php">
        <label for="query">Search:</label>
        <input type="text" id="query" name="query" required>
        <input type="submit" value="Search">
    </form>
</body>
</html>
