<?php
// Create connection to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for financial reports if it doesn't exist
$table_query = "CREATE TABLE IF NOT EXISTS FinancialReports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    companyName VARCHAR(30) NOT NULL,
    quarter VARCHAR(10) NOT NULL,
    year INT(4) NOT NULL,
    report TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($table_query)) {
  die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_report"])) {
  $companyName = $_POST['companyName'];
  $quarter = $_POST['quarter'];
  $year = $_POST['year'];
  $report = $_POST['report'];

  $insert_query = "INSERT INTO FinancialReports (companyName, quarter, year, report) VALUES (?, ?, ?, ?)";

  // Prepare and bind parameters
  $stmt = $conn->prepare($insert_query);
  $stmt->bind_param("ssis", $companyName, $quarter, $year, $report);

  // Execute and check
  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insert_query . "<br>" . $conn->error;
  }

  $stmt->close();
}

// Search functionality
$search_result = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
  $search_query = $conn->real_escape_string($_POST['search_query']);
  $sql = "SELECT * FROM FinancialReports WHERE CONCAT(companyName, ' ', quarter, ' ', year) LIKE '%$search_query%'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $search_result[] = $row;
    }
  } else {
    echo "0 results";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports</title>
</head>
<body>

<h2>Search for Financial Reports</h2>
<form method="post">
    <input type="text" name="search_query" required>
    <input type="submit" name="search" value="Search">
</form>

<h2>Submit a New Report</h2>
<form method="post">
    <input type="text" name="companyName" placeholder="Company Name" required><br>
    <input type="text" name="quarter" placeholder="Quarter (e.g., Q1)" required><br>
    <input type="number" name="year" placeholder="Year" required><br>
    <textarea name="report" placeholder="Report Details" required></textarea><br>
    <input type="submit" name="submit_report" value="Submit Report">
</form>

<?php if (!empty($search_result)): ?>
    <h2>Search Results</h2>
    <table>
        <tr>
            <th>Company Name</th>
            <th>Quarter</th>
            <th>Year</th>
            <th>Report</th>
        </tr>
        <?php foreach ($search_result as $report): ?>
            <tr>
                <td><?php echo htmlspecialchars($report['companyName']); ?></td>
                <td><?php echo htmlspecialchars($report['quarter']); ?></td>
                <td><?php echo htmlspecialchars($report['year']); ?></td>
                <td><?php echo htmlspecialchars($report['report']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

</body>
</html>
