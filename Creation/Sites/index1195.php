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
$table_sql = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company VARCHAR(50) NOT NULL,
    report_year YEAR NOT NULL,
    quarter VARCHAR(10) NOT NULL,
    report LONGTEXT NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
  $search_term = $conn->real_escape_string($_POST["search"]);
  $sql = "SELECT * FROM financial_reports WHERE company LIKE '%{$search_term}%' AND report_year='2023'";
  $result = $conn->query($sql);

  $search_results = [];
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $search_results[] = $row;
    }
  }
  // Display results below in HTML
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Financial Reports Search</title>
</head>
<body>
<h1>Search for Financial Reports</h1>
<form action="" method="post">
    <input type="text" name="search" placeholder="Search reports..."/>
    <input type="submit" value="Search">
</form>
<?php if (!empty($search_results)): ?>
    <h2>Search Results:</h2>
    <ul>
    <?php foreach ($search_results as $result): ?>
        <li>Company: <?php echo $result["company"]; ?>, Quarter: <?php echo $result["quarter"]; ?>, Year: <?php echo $result["report_year"]; ?></li>
        <p>Report: <?php echo $result["report"]; ?></p>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
</body>
</html>
<?php $conn->close(); ?>
