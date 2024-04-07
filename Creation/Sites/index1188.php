<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL to create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS financial_reports (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
report VARCHAR(255) NOT NULL,
company VARCHAR(50),
year INT(4),
quarter VARCHAR(2),
reg_date TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
    // Table created successfully, or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert report from POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report = $_POST['report'];
    $company = $_POST['company'];
    $year = $_POST['year'];
    $quarter = $_POST['quarter'];

    $insertSql = "INSERT INTO financial_reports (report, company, year, quarter)
VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("ssii", $report, $company, $year, $quarter);
    
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports Submission</title>
</head>
<body>
<h2>Search for Financial Reports</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="report">Report Name:</label>
    <input type="text" id="report" name="report"><br><br>
    <label for="company">Company:</label>
    <input type="text" id="company" name="company"><br><br>
    <label for="year">Year:</label>
    <input type="number" id="year" name="year"><br><br>
    <label for="quarter">Quarter:</label>
    <input type="text" id="quarter" name="quarter"><br><br>
    <input type="submit" value="Submit">
</form>

<?php
// Search functionality
$search = $_GET['search'] ?? '';
if ($search) {
    $sql = "SELECT id, report, company, year, quarter FROM financial_reports WHERE CONCAT(report, ' ', company, ' ', year, ' Q', quarter) LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchParam = "%" . $search . "%";
    $stmt->bind_param("s", $searchParam);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row["company"] . " " . $row["year"] . " Q" . $row["quarter"] . ": " . $row["report"]) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "0 results";
    }
}
?>
</body>
</html>
<?php
$conn->close();
?>
