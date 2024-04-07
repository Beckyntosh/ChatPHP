<?php
// Database Connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create Financial Reports Table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  company VARCHAR(50) NOT NULL,
  quarter VARCHAR(10) NOT NULL,
  year YEAR(4) NOT NULL,
  report_content TEXT,
  reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Search and Submit Handlers
$searchResult = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["search"])) {
    $searchTerm = $conn->real_escape_string($_POST['searchTerm']);
    $searchSql = "SELECT * FROM financial_reports WHERE company LIKE '%$searchTerm%' OR (quarter LIKE '%$searchTerm%' AND year = '$searchTerm')";
    $result = $conn->query($searchSql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $searchResult .= "Company: " . $row["company"]. " - Quarter: " . $row["quarter"]. " " . $row["year"]. "<br>"."Report: ".$row["report_content"]."<br><br>";
      }
    } else {
      $searchResult = "0 results";
    }
  } elseif (isset($_POST["submitReport"])) {
    $company = $conn->real_escape_string($_POST['company']);
    $quarter = $conn->real_escape_string($_POST['quarter']);
    $year = $conn->real_escape_string($_POST['year']);
    $reportContent = $conn->real_escape_string($_POST['reportContent']);

    $insertSql = "INSERT INTO financial_reports (company, quarter, year, report_content) VALUES ('$company', '$quarter', '$year', '$reportContent')";

    if ($conn->query($insertSql) === TRUE) {
      $searchResult = "New report submitted successfully";
    } else {
      $searchResult = "Error: " . $sql . "<br>" . $conn->error;
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

<h2>Search Financial Reports</h2>
<form action="?" method="post">
  <input type="text" name="searchTerm" required>
  <input type="submit" name="search" value="Search">
</form>

<h2>Submit Financial Report</h2>
<form action="?" method="post">
  <input type="text" name="company" placeholder="Company" required><br>
  <input type="text" name="quarter" placeholder="Quarter (e.g. Q1)" required><br>
  <input type="number" name="year" placeholder="Year" required><br>
  <textarea name="reportContent" placeholder="Report Content" required></textarea><br>
  <input type="submit" name="submitReport" value="Submit Report">
</form>

<h2>Search Results</h2>
<p><?php echo $searchResult; ?></p>

</body>
</html>
