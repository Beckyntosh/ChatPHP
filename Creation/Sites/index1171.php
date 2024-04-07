<?php
// This script acts as both the front-end and back-end for the search and submit functionality.
// Note: This example is provided for educational purposes and is simplified for clarity.
// Ensure you secure your application appropriately for production environments.

// Database Configuration
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

// Handle form submission for searching reports
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $keyword = $conn->real_escape_string($_POST['keyword']);
    $sql = "SELECT * FROM financial_reports WHERE report LIKE '%$keyword%'";
    $result = $conn->query($sql);
}

// Handle form submission for submitting reports
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_report'])) {
    $reportName = $conn->real_escape_string($_POST['report_name']);
    $reportContent = $conn->real_escape_string($_POST['report_content']);
    $sql = "INSERT INTO financial_reports (report_name, report) VALUES ('$reportName', '$reportContent')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Report submitted successfully');</script>";
    } else {
        echo "<script>alert('Error submitting report: " . $conn->error . "');</script>";
    }
}

// HTML and PHP mixed (Frontend)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports Search and Submit</title>
</head>
<body>
    <h1>Search Financial Reports</h1>
    <form method="post">
        <input type="text" name="keyword" placeholder="Search for reports...">
        <button type="submit" name="search">Search</button>
    </form>

    <?php
    if (isset($result) && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div><h4>" . $row["report_name"]. "</h4><p>" . $row["report"]. "</p></div>";
        }
    } elseif (isset($result)) {
        echo "0 results found";
    }
    ?>

    <h1>Submit a Financial Report</h1>
    <form method="post">
        <input type="text" name="report_name" placeholder="Report Name" required>
        <textarea name="report_content" placeholder="Report Content" required></textarea>
        <button type="submit" name="submit_report">Submit Report</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
