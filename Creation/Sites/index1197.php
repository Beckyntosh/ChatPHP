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
company VARCHAR(30) NOT NULL,
quarter VARCHAR(10) NOT NULL,
year YEAR(4),
report TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table FinancialReports created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search_query = $conn->real_escape_string($_POST['search']);
    $search_sql = "SELECT * FROM FinancialReports WHERE CONCAT(company, ' ', quarter, ' ', year) LIKE '%$search_query%'";
    $result = $conn->query($search_sql);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company = $conn->real_escape_string($_POST['company']);
    $quarter = $conn->real_escape_string($_POST['quarter']);
    $year = $conn->real_escape_string($_POST['year']);
    $report = $conn->real_escape_string($_POST['report']);

    $insert_sql = "INSERT INTO FinancialReports (company, quarter, year, report) VALUES ('$company', '$quarter', '$year', '$report')";
    if ($conn->query($insert_sql) === TRUE) {
      echo "<script>alert('New record created successfully');</script>";
    } else {
      echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Craft Beers Financial Reports</title>
</head>
<body>
<h2>Search Financial Reports</h2>
<form method="post" action="">
  <input type="text" name="search" placeholder="Search reports..." required>
  <input type="submit" value="Search">
</form>

<?php
if (isset($result) && $result->num_rows > 0) {
  echo "<ul>";
  while($row = $result->fetch_assoc()) {
    echo "<li>".$row["company"]." - ".$row["quarter"]." - ".$row["year"]."<br>".$row["report"]."</li>";
  }
  echo "</ul>";
} elseif (isset($result)) {
  echo "<p>No results found.</p>";
}
?>

<h2>Submit Financial Report</h2>
<form method="post" action="">
  <input type="text" name="company" placeholder="Company Name" required><br>
  <input type="text" name="quarter" placeholder="Quarter (e.g., Q2)" required><br>
  <input type="text" name="year" placeholder="Year" required><br>
  <textarea name="report" placeholder="Report details..." required></textarea><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>

<?php
$conn->close();
?>
