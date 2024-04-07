<?php

// For security and complexity reasons, this example is simplified and should not be directly used in a production environment without proper validation, sanitization, and security practices.

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

// Create table for financial reports if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_name VARCHAR(255) NOT NULL,
    company VARCHAR(255) NOT NULL,
    report_year YEAR NOT NULL,
    report_quarter VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $searchTerm = $conn->real_escape_string($_POST["search"]);
    $query = "SELECT * FROM financial_reports WHERE report_name LIKE '%$searchTerm%' OR company LIKE '%$searchTerm%'";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reportName = $conn->real_escape_string($_POST["report_name"]);
    $company = $conn->real_escape_string($_POST["company"]);
    $reportYear = $conn->real_escape_string($_POST["report_year"]);
    $reportQuarter = $conn->real_escape_string($_POST["report_quarter"]);
    $content = $conn->real_escape_string($_POST["content"]);

    $sqlInsert = "INSERT INTO financial_reports (report_name, company, report_year, report_quarter, content) VALUES ('$reportName', '$company', '$reportYear', '$reportQuarter', '$content')";

    if (!$conn->query($sqlInsert)) {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }
    echo "<p>Report Submitted Successfully!</p>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Financial Reports Submission and Search</title>
</head>
<body>

<h2>Submit Financial Report</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Report Name: <input type="text" name="report_name" required><br>
    Company: <input type="text" name="company" required><br>
    Report Year: <input type="number" name="report_year" required><br>
    Report Quarter: <input type="text" name="report_quarter" required><br>
    Content: <textarea name="content" required></textarea><br>
    <input type="submit" value="Submit Report">
</form>

<h2>Search Reports</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Search: <input type="text" name="search" required>
    <input type="submit" value="Search">
</form>

<?php
if (isset($query)) {
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row["report_name"] . " - " . $row["company"] . " - " . $row["report_year"] . " Q" . $row["report_quarter"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "0 results found for your search.";
    }
}

$conn->close();
?>

</body>
</html>
