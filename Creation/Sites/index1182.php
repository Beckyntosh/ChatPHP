<?php

// MySQL connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_HOST', 'db');

// Create a new connection to the MySQL database
$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create table if not exists
$query = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_title VARCHAR(255) NOT NULL,
    report_year INT NOT NULL,
    report_quarter INT NOT NULL,
    report_company VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
)";
if (!$mysqli->query($query)) {
    die("Error creating table: " . $mysqli->error);
}

// Handle file submit
if (isset($_POST['submit'])) {
    $report_title = $_POST['report_title'];
    $report_year = $_POST['report_year'];
    $report_quarter = $_POST['report_quarter'];
    $report_company = $_POST['report_company'];
    $content = $mysqli->real_escape_string($_POST['content']);

    $insertQuery = "INSERT INTO financial_reports (report_title, report_year, report_quarter, report_company, content) VALUES (?, ?, ?, ?, ?)";

    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param("siiss", $report_title, $report_year, $report_quarter, $report_company, $content);

    if ($stmt->execute()) {
        echo "<p>Report submitted successfully!</p>";
    } else {
        echo "<p>Error submitting report: " . $mysqli->error . "</p>";
    }
}

// Handle search
$results = [];
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $likeTerm = '%' . $mysqli->real_escape_string($searchTerm) . '%';
    $searchQuery = "SELECT * FROM financial_reports WHERE report_title LIKE ? OR report_company LIKE ?";

    $stmt = $mysqli->prepare($searchQuery);
    $stmt->bind_param("ss", $likeTerm, $likeTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports Search and Submit</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .container { width: 80%; margin: 0 auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        form { margin-bottom: 40px; }
        input[type="text"], input[type="number"], textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; }
        input[type="submit"] { background-color: #0056b3; color: #fff; padding: 10px 20px; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #004494; }
        .report { margin-bottom: 20px; padding: 10px; background-color: #f9f9f9; border-left: 4px solid #0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h1>Financial Reports</h1>
    
    <h2>Submit a Report</h2>
    <form action="" method="post">
        <input type="text" name="report_title" placeholder="Report Title" required>
        <input type="number" name="report_year" placeholder="Year" min="2000" max="2099" required>
        <input type="number" name="report_quarter" placeholder="Quarter (1-4)" min="1" max="4" required>
        <input type="text" name="report_company" placeholder="Company" required>
        <textarea name="content" placeholder="Report Content" rows="6" required></textarea>
        <input type="submit" name="submit" value="Submit Report">
    </form>
    
    <h2>Search Reports</h2>
    <form action="" method="get">
        <input type="text" name="search" placeholder="Search reports...">
        <input type="submit" value="Search">
    </form>
    
    <div class="search-results">
        <?php foreach ($results as $report) : ?>
            <div class="report">
                <h3><?= htmlspecialchars($report['report_title']) ?></h3>
                <p>Year: <?= htmlspecialchars($report['report_year']) ?>, Quarter: <?= htmlspecialchars($report['report_quarter']) ?>, Company: <?= htmlspecialchars($report['report_company']) ?></p>
                <p><?= nl2br(htmlspecialchars($report['content'])) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
