<?php

// Define MySQL connection parameters
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

// Create Reports table if not exists
$query = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_title VARCHAR(255) NOT NULL,
    report_content TEXT NOT NULL,
    report_year YEAR NOT NULL,
    report_quarter VARCHAR(50) NOT NULL,
    report_category VARCHAR(100) NOT NULL,
    report_date TIMESTAMP
)";
if (!$conn->query($query)) {
    die("Error creating table: " . $conn->error);
}

// Handle report submission
if (isset($_POST['submit_report'])) {
    $report_title = $_POST['report_title'];
    $report_content = $_POST['report_content'];
    $report_year = $_POST['report_year'];
    $report_quarter = $_POST['report_quarter'];
    $report_category = $_POST['report_category'];

    $stmt = $conn->prepare("INSERT INTO financial_reports (report_title, report_content, report_year, report_quarter, report_category) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $report_title, $report_content, $report_year, $report_quarter, $report_category);
    
    if ($stmt->execute()) {
        echo "<script>alert('Report submitted successfully');</script>";
    } else {
        echo "<script>alert('Unable to submit report');</script>";
    }
}

// Handle report search
$search_results = [];
if (isset($_POST['search'])) {
    $search_query = "%{$_POST['search_query']}%";
    $stmt = $conn->prepare("SELECT * FROM financial_reports WHERE report_title LIKE ? OR report_content LIKE ?");
    $stmt->bind_param("ss", $search_query, $search_query);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $search_results[] = $row;
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Office Supplies - Financial Reports</title>
</head>
<body>

<div>
    <h2>Submit Financial Report</h2>
    <form method="post" action="">
        <input type="text" name="report_title" placeholder="Report Title" required><br>
        <textarea name="report_content" placeholder="Report Content" required></textarea><br>
        <input type="text" name="report_year" placeholder="Report Year" required><br>
        <input type="text" name="report_quarter" placeholder="Report Quarter" required><br>
        <input type="text" name="report_category" placeholder="Category" required><br>
        <input type="submit" name="submit_report" value="Submit Report">
    </form>
</div>

<div>
    <h2>Search Reports</h2>
    <form method="post" action="">
        <input type="text" name="search_query" placeholder="Search..." required>
        <input type="submit" name="search" value="Search">
    </form>
    
    <?php if (!empty($search_results)): ?>
    <ul>
        <?php foreach ($search_results as $report): ?>
            <li>
                <h3><?php echo $report['report_title']; ?></h3>
                <p><?php echo $report['report_content']; ?></p>
                <small>Year: <?php echo $report['report_year']; ?>, Quarter: <?php echo $report['report_quarter']; ?></small><br>
                <small>Category: <?php echo $report['report_category']; ?></small>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</div>

</body>
</html>

<?php $conn->close(); ?>
