<?php
// Connect to database
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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  company_name VARCHAR(50) NOT NULL,
  report_type VARCHAR(50) NOT NULL,
  quarter INT(1) NOT NULL,
  year YEAR(4) NOT NULL,
  report LONGTEXT,
  reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table financial_reports created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$searchKeyword = $_GET['search'] ?? '';

if(!empty($searchKeyword)) {
    $parts = explode(' ', $searchKeyword);
    $queryParts = [];
    foreach($parts as $part){
        $queryParts[] = "report_type LIKE '%$part%' OR company_name LIKE '%$part%'";
    }
    $queryStr = implode(' OR ', $queryParts);
    $search_sql = "SELECT * FROM financial_reports WHERE ($queryStr) AND year=2023";
    $result = $conn->query($search_sql);

    if ($result->num_rows > 0) {
      // output data of each row
      echo "<ul>";
      while($row = $result->fetch_assoc()) {
        echo "<li>Company: " . $row["company_name"]. " - Report Type: " . $row["report_type"]. " - Quarter: " . $row["quarter"]. "</li>";
      }
      echo "</ul>";
    } else {
      echo "0 results found";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Financial Reports Search</title>
</head>
<body>
    <h1>Search for Financial Reports</h1>
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Search for reports..." value="<?php echo htmlspecialchars($searchKeyword); ?>">
        <button type="submit">Search</button>
    </form>
</body>
</html>
