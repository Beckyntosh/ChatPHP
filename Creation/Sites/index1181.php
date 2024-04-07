<?php

// Set up database connection
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

// Create table if it doesn't exist
$table_query = "CREATE TABLE IF NOT EXISTS financial_reports (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
company_name VARCHAR(30) NOT NULL,
report_type VARCHAR(50),
report_year YEAR,
report_content TEXT,
reg_date TIMESTAMP
)";

if (!$conn->query($table_query) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $search_keyword = $_POST["search_keyword"];
} else {
    $search_keyword = '';
}

// Search logic
$search_query = "SELECT id, company_name, report_type, report_year, report_content FROM financial_reports WHERE report_type LIKE '%".$conn->real_escape_script($search_keyword)."%' AND report_year = '2023'";
$search_result = $conn->query($search_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .report { margin-bottom: 20px; padding: 10px; border: 1px solid #ddd; }
        .report h2, .report p { margin: 0 0 10px; }
    </style>
</head>
<body>
    <h1>Search Q2 Earnings Reports for Tech Companies 2023</h1>
    <form action="" method="POST">
        <input type="text" name="search_keyword" placeholder="Enter search keyword" value="<?php echo $search_keyword; ?>">
        <button type="submit" name="search">Search</button>
    </form>
    
    <div>
        <?php
        if (isset($search_result) && $search_result->num_rows > 0) {
            while($row = $search_result->fetch_assoc()) {
                echo "<div class='report'>";
                echo "<h2>" . htmlspecialchars($row["company_name"]) . " - " . htmlspecialchars($row["report_type"]) . " (" . $row["report_year"] . ")</h2>";
                echo "<p>" . nl2br(htmlspecialchars($row["report_content"])) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No reports found.</p>";
        }
        ?>
    </div>
</body>
</html>
<?php $conn->close(); ?>
