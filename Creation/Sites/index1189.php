<?php
* 
 * Simple Example of Search and Submit Financial Reports for a Watches Website in PHP and MySQL
 * Note: This is a basic implementation and doesn't cover security aspects like SQL injection prevention, 
 * validation, and sanitization of user inputs, which are crucial for a real-world application.
 */

$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_title VARCHAR(255) NOT NULL,
    report_content TEXT,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_report'])) {
    $reportTitle = $conn->real_escape_string($_POST['report_title']);
    $reportContent = $conn->real_escape_string($_POST['report_content']);

    $sql = "INSERT INTO financial_reports (report_title, report_content) VALUES ('$reportTitle', '$reportContent')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Report submitted successfully.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM financial_reports WHERE report_title LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Search Results:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<div><h4>" . $row["report_title"] . "</h4><p>" . $row["report_content"] . "</p></div>";
        }
    } else {
        echo "<p>No reports found.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports Search and Submit</title>
    <style>
        body{ font-family: "Courier New", Courier, monospace; }
        form, .results { margin:20px; }
        h2, h4 { color: #333; }
    </style>
</head>
<body>

<h1>Dennis Ritchie Watches Financial Reports</h1>

<form action="" method="POST">
    <h2>Submit a Financial Report</h2>
    <label for="report_title">Title:</label><br>
    <input type="text" id="report_title" name="report_title" required><br>
    <label for="report_content">Content:</label><br>
    <textarea id="report_content" name="report_content" required></textarea><br><br>
    <input type="submit" name="submit_report" value="Submit Report">
</form>

<form action="" method="GET">
    <h2>Search Reports</h2>
    <input type="text" name="search" required placeholder="Enter search term...">
    <input type="submit" value="Search">
</form>

</body>
</html>

<?php
$conn->close();
?>
