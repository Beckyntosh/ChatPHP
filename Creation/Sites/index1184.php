<?php
// Establish database connection
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

// Creating table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_name VARCHAR(255) NOT NULL,
    company_type VARCHAR(50),
    year INT(4),
    quarter VARCHAR(50),
    report LONGTEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitReport"])) {
  $report_name = $_POST["reportName"];
  $company_type = $_POST["companyType"];
  $year = $_POST["year"];
  $quarter = $_POST["quarter"];
  $report = $_POST["report"];

  $stmt = $conn->prepare("INSERT INTO financial_reports (report_name, company_type, year, quarter, report) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("ssiss", $report_name, $company_type, $year, $quarter, $report);
  
  if($stmt->execute()){
    echo "<div>Report Submitted Successfully!</div>";
  } else {
    echo "<div>Error submitting report: " . $conn->error . "</div>";
  }
  
  $stmt->close();
}

// Handling search
$searchResults = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
  $searchQuery = "%{$_POST['searchQuery']}%";
  $stmt = $conn->prepare("SELECT * FROM financial_reports WHERE report_name LIKE ?");
  $stmt->bind_param("s", $searchQuery);
  $stmt->execute();
  $result = $stmt->get_result();
  while($row = $result->fetch_assoc()) {
    $searchResults[] = $row;
  }
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Financial Reports</title>
<style>
  body { font-family: monospace; }
  .container { width: 90%; margin: auto; }
  table, th, td { border: 1px solid black; border-collapse: collapse; }
  th, td { padding: 10px; }
  th { text-align: left; }
</style>
</head>
<body>
<div class="container">
  <h1>Search Financial Reports</h1>
  <form method="post">
    <input type="text" name="searchQuery" placeholder="Search reports...">
    <input type="submit" name="search" value="Search">
  </form>
  <h2>Search Results:</h2>
  <table>
    <tr>
      <th>Report Name</th>
      <th>Company Type</th>
      <th>Year</th>
      <th>Quarter</th>
      <th>Report</th>
    </tr>
    <?php foreach($searchResults as $row): ?>
    <tr>
      <td><?php echo $row["report_name"]; ?></td>
      <td><?php echo $row["company_type"]; ?></td>
      <td><?php echo $row["year"]; ?></td>
      <td><?php echo $row["quarter"]; ?></td>
      <td><?php echo $row["report"]; ?></td>
    </tr>
    <?php endforeach; ?>
  </table>

  <h1>Submit a Financial Report</h1>
  <form method="post">
    <input type="text" name="reportName" placeholder="Report Name" required><br>
    <input type="text" name="companyType" placeholder="Company Type" required><br>
    <input type="number" name="year" placeholder="Year" required><br>
    <select name="quarter" required>
      <option value="" disabled selected>Select Quarter</option>
      <option value="Q1">Q1</option>
      <option value="Q2">Q2</option>
      <option value="Q3">Q3</option>
      <option value="Q4">Q4</option>
    </select><br>
    <textarea name="report" placeholder="Enter report here..." required></textarea><br>
    <input type="submit" name="submitReport" value="Submit Report">
  </form>
</div>
</body>
</html>
