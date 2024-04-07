<?php
// Connect to Database
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

// Create table for financial reports if it does not exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS financial_reports (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  company_name VARCHAR(50) NOT NULL,
  report_type VARCHAR(50) NOT NULL,
  year YEAR(4) NOT NULL,
  quarter INT(1) NOT NULL,
  report LONGTEXT,
  reg_date TIMESTAMP
)";

if (!$conn->query($tableCreationQuery)) {
  die("Error creating table: " . $conn->error);
}

// Process search request
$searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';
$reports = [];
if ($searchKeyword) {
  $keywords = explode(' ', $searchKeyword);
  $query = "SELECT * FROM financial_reports WHERE (report_type LIKE '%earnings%') AND (year = 2023) AND (";
  foreach ($keywords as $word) {
    $query .= "company_name LIKE '%$word%' OR ";
  }
  // Remove the last 'OR '
  $query = substr($query, 0, -4);
  $query .= ") ORDER BY quarter DESC";

  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $reports[] = $row;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Financial Reports Search</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    table, th, td { border: 1px solid #ccc; border-collapse: collapse; padding: 10px; text-align: left; }
  </style>
</head>
<body>
  <h2>Search Q2 Earnings Reports for Tech Companies 2023</h2>
  <form action="" method="GET">
    <input type="text" name="search" placeholder="Enter keywords e.g., 'Apple'" value="<?php echo htmlspecialchars($searchKeyword); ?>">
    <input type="submit" value="Search">
  </form>

  <?php if ($searchKeyword && count($reports) > 0): ?>
    <h3>Search Results</h3>
    <table>
      <tr>
        <th>Company Name</th>
        <th>Report Type</th>
        <th>Year</th>
        <th>Quarter</th>
        <th>Report</th>
      </tr>
      <?php foreach ($reports as $report): ?>
        <tr>
          <td><?php echo htmlspecialchars($report['company_name']); ?></td>
          <td><?php echo htmlspecialchars($report['report_type']); ?></td>
          <td><?php echo htmlspecialchars($report['year']); ?></td>
          <td>Q<?php echo htmlspecialchars($report['quarter']); ?></td>
          <td><?php echo htmlspecialchars(substr($report['report'], 0, 100)) . '...'; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php elseif ($searchKeyword): ?>
    <p>No results found for '<?php echo htmlspecialchars($searchKeyword); ?>'.</p>
  <?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>
