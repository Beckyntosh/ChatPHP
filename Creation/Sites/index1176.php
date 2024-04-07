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

$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company VARCHAR(30) NOT NULL,
    report_type VARCHAR(50),
    year YEAR,
    document TEXT,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table financial_reports created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $company = $_POST['company'];
    $report_type = $_POST['report_type'];
    $year = $_POST['year'];
    $document = $_POST['document'];

    $stmt = $conn->prepare("INSERT INTO financial_reports (company, report_type, year, document) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $company, $report_type, $year, $document);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports Submission</title>
</head>
<body>

<h2>Financial Report Search</h2>

<form method="POST" action="">
    <input type="text" name="search" placeholder="Search financial reports...">
    <input type="submit" name="search_submit" value="Search">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search_submit'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM financial_reports WHERE CONCAT(company, ' ', report_type, ' ', year) LIKE '%" . $search . "%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li><strong>" . $row["company"]. "</strong> - " . $row["report_type"]. " " . $row["year"]. "</li>";
        }
        echo "</ul>";
    } else {
        echo "0 results";
    }
}
?>

<h2>Submit New Financial Report</h2>

<form method="POST" action="">
    <input type="text" name="company" placeholder="Company Name" required>
    <input type="text" name="report_type" placeholder="Report Type" required>
    <input type="number" name="year" min="2000" max="2099" step="1" placeholder="Year" required>
    <textarea name="document" placeholder="Document" required></textarea>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>

<?php
$conn->close();
?>
