<?php

// Database connection
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

// Create Financial Reports Table if not exists
$sql = "CREATE TABLE IF NOT EXISTS FinancialReports (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
report_title VARCHAR(255) NOT NULL,
company_name VARCHAR(255),
report_year YEAR,
report_quarter INT,
report_content TEXT,
submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check whether the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $search = $conn->real_escape_string($_POST['search']);
    $sql = "SELECT * FROM FinancialReports WHERE report_title LIKE '%$search%' OR company_name LIKE '%$search%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row["company_name"]) . " - " . htmlspecialchars($row["report_title"]) . " (" . htmlspecialchars($row["report_year"]) . " Q" . htmlspecialchars($row["report_quarter"]) . ")" . "</li>";
        }
        echo "</ul>";
    } else {
        echo "0 results found";
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $conn->real_escape_string($_POST['company_name']);
    $report_title = $conn->real_escape_string($_POST['report_title']);
    $report_year = $conn->real_escape_string($_POST['report_year']);
    $report_quarter = $conn->real_escape_string($_POST['report_quarter']);
    $report_content = $conn->real_escape_string($_POST['report_content']);

    $sql = "INSERT INTO FinancialReports (report_title, company_name, report_year, report_quarter, report_content)
    VALUES ('$report_title', '$company_name', '$report_year', '$report_quarter', '$report_content')";

    if ($conn->query($sql) === TRUE) {
        echo "New report submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Financial Reports Submission System</title>
</head>
<body>

<h2>Search for Financial Reports</h2>

<form action="" method="post">
    <input type="text" name="search" placeholder="Enter search term...">
    <input type="submit" value="Search">
</form>

<h2>Submit a Financial Report</h2>

<form action="" method="post">
    <input type="text" name="company_name" placeholder="Company Name" required><br>
    <input type="text" name="report_title" placeholder="Report Title" required><br>
    <input type="number" name="report_year" placeholder="Year" min="2000" max="2099" step="1" required><br>
    <select name="report_quarter" required>
        <option value="">Select Quarter</option>
        <option value="1">Q1</option>
        <option value="2">Q2</option>
        <option value="3">Q3</option>
        <option value="4">Q4</option>
    </select><br>
    <textarea name="report_content" placeholder="Report content..." required></textarea><br>
    <input type="submit" value="Submit Report">
</form>

</body>
</html>
