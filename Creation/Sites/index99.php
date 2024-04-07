<?php
// Connect to Database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create financial_reports table if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    year INT(4) NOT NULL,
    report_name VARCHAR(50) NOT NULL,
    revenue DECIMAL(10,2) NOT NULL,
    expense DECIMAL(10,2) NOT NULL,
    profit DECIMAL(10,2) AS (revenue - expense),
    reg_date TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
  echo "Table financial_reports created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Frontend + Backend in a single file (Not recommended for production use)
$searchValue = $_POST['searchValue'] ?? '';

// Protect against SQL injection
$searchValue = $conn->real_escape_string($searchValue);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports Search</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .report { margin-bottom: 20px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
        .search-box { margin-bottom: 20px; }
        .search-input { padding: 10px; width: 300px; margin-right: 10px; }
        .search-button { padding: 10px; }
    </style>
</head>
<body>

<div>
    <h2>Search Financial Reports</h2>
    <div class="search-box">
        <form action="" method="post">
            <input type="text" class="search-input" name="searchValue" placeholder="Enter year or report name..." value="<?php echo htmlspecialchars($searchValue); ?>">
            <input type="submit" class="search-button" value="Search">
        </form>
    </div>
    <div class="reports">
        <?php
        if (!empty($searchValue)) {
            $query = "SELECT * FROM financial_reports WHERE year LIKE '%$searchValue%' OR report_name LIKE '%$searchValue%'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='report'>";
                    echo "<h4>" . htmlspecialchars($row['report_name']) . " (" . htmlspecialchars($row['year']) . ")</h4>";
                    echo "<p>Revenue: $" . htmlspecialchars($row['revenue']) . "</p>";
                    echo "<p>Expense: $" . htmlspecialchars($row['expense']) . "</p>";
                    echo "<p>Profit: $" . htmlspecialchars($row['profit']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "0 results found";
            }
        }
        ?>
    </div>
</div>

<?php
$conn->close();
?>

</body>
</html>