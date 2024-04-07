<?php
// Simple Financial Reports Search and Submission System

// Database connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$createReportsTable = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    report_content TEXT NOT NULL,
    submission_date DATE NOT NULL DEFAULT CURRENT_DATE()
)";
if (!$conn->query($createReportsTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['report_title']) && !empty($_POST['report_content'])) {
    $title = $conn->real_escape_string($_POST['report_title']);
    $content = $conn->real_escape_string($_POST['report_content']);

    $insertSQL = "INSERT INTO financial_reports (title, report_content) VALUES ('$title', '$content')";
    if ($conn->query($insertSQL) === TRUE) {
        echo "<p>Report submitted successfully.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

// Handle search
$searchResults = [];
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['search'])) {
    $searchTerm = $conn->real_escape_string($_GET['search']);
    $searchSQL = "SELECT * FROM financial_reports WHERE title LIKE '%$searchTerm%'";
    $result = $conn->query($searchSQL);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }
    } else {
        echo "<p>No results found.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports Submission and Search</title>
    <style>
        /* Basic styles for simplicity */
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        form { margin-bottom: 20px; }
        input, textarea { width: 100%; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search and Submit Financial Reports</h1>
        
Search Form
        <form action="" method="get">
            <input type="text" name="search" placeholder="Search reports..." required>
            <input type="submit" value="Search">
        </form>
        
Results
        <?php if (!empty($searchResults)) : ?>
            <h2>Search Results</h2>
            <?php foreach ($searchResults as $report): ?>
                <div>
                    <h3><?php echo $report['title']; ?></h3>
                    <p><?php echo $report['report_content']; ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        
Submission Form
        <h2>Submit a Report</h2>
        <form action="" method="post">
            <input type="text" name="report_title" placeholder="Title" required>
            <textarea name="report_content" placeholder="Write your report here..." rows="10" required></textarea>
            <input type="submit" value="Submit Report">
        </form>
    </div>
</body>
</html>
