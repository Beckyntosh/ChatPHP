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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['search'])) {
        $searchTerm = $_POST['searchTerm'];
        
        // Prepared statement to avoid SQL Injection
        $stmt = $conn->prepare("SELECT * FROM financial_reports WHERE report_title LIKE CONCAT('%',?,'%')");
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $reports = [];
        while($row = $result->fetch_assoc()) {
            $reports[] = $row;
        }
        $stmt->close();
        
    } else if (isset($_POST['submitReport'])) {
        $reportTitle = $_POST['reportTitle'];
        $reportContent = $_POST['reportContent'];
        
        // Prepared statement to avoid SQL Injection
        $stmt = $conn->prepare("INSERT INTO financial_reports (report_title, report_content) VALUES (?, ?)");
        $stmt->bind_param("ss", $reportTitle, $reportContent);
        $stmt->execute();
        $stmt->close();
        
        echo "<p>Report submitted successfully!</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Reports</title>
    <style>
        body { font-family: Arial, sans-serif; }
    </style>
</head>
<body>

<h2>Search for Financial Reports</h2>

<form method="post">
    <input type="text" name="searchTerm" placeholder="Type keywords e.g. 'Q2 earnings tech companies 2023'" required>
    <input type="submit" name="search" value="Search">
</form>

<h2>Submit a Financial Report</h2>

<form method="post">
    <input type="text" name="reportTitle" placeholder="Report Title" required>
    <textarea name="reportContent" placeholder="Report Content" required></textarea>
    <input type="submit" name="submitReport" value="Submit">
</form>

<?php
if (isset($reports) && count($reports) > 0) {
    echo "<h2>Search Results:</h2><ul>";
    foreach ($reports as $report) {
        echo "<li>" . htmlspecialchars($report['report_title']) . "</li>";
    }
    echo "</ul>";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<p>No reports found. Try different keywords.</p>";
}
?>

</body>
</html>

<?php
$conn->close();
?>
