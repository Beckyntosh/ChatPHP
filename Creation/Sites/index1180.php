<?php

* Database Connection */
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

* Create Table If Not Exists */
$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        company VARCHAR(255) NOT NULL,
        report_type VARCHAR(255) NOT NULL,
        year YEAR(4),
        content TEXT,
        reg_date TIMESTAMP
        )";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

* Insert Report */
$insert_sql = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['company']) && !empty($_POST['report_type']) && !empty($_POST['year']) && !empty($_POST['content'])) {
    $insert_sql = $conn->prepare("INSERT INTO financial_reports (company, report_type, year, content) VALUES (?, ?, ?, ?)");
    $insert_sql->bind_param("ssis", $_POST['company'], $_POST['report_type'], $_POST['year'], $_POST['content']);
  
    if($insert_sql->execute()) {
        echo "<p>Report Submitted Successfully</p>";
    } else {
        echo "<p>Error submitting report: </p>" . $conn->error;
    }

    $insert_sql->close();
}

* Fetch Reports */
$search_result = "";
if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['search'])) {
    $search_query = "%" . $_GET['search'] . "%";
    $stmt = $conn->prepare("SELECT * FROM financial_reports WHERE CONCAT(company, ' ', report_type, ' ', year) LIKE ?");
    $stmt->bind_param("s", $search_query);
  
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $search_result .= "<ul>";
            while($row = $result->fetch_assoc()) {
                $search_result .= "<li>".$row["company"]." - ".$row["report_type"]." (".$row["year"].")</li>";
            }
            $search_result .= "</ul>";
        } else {
            $search_result = "<p>No results found</p>";
        }
    } else {
        $search_result = "<p>Error in search query: </p>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Financial Reports</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { padding: 20px; }
        input[type=text], textarea { width: 100%; padding: 12px; margin: 6px 0; box-sizing: border-box; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Submit a Financial Report</h2>
    <form method="POST">
        <label for="company">Company</label>
        <input type="text" id="company" name="company" required>

        <label for="report_type">Report Type</label>
        <input type="text" id="report_type" name="report_type" required>

        <label for="year">Year</label>
        <input type="text" id="year" name="year" required>

        <label for="content">Content</label>
        <textarea id="content" name="content" required></textarea>

        <input type="submit" value="Submit Report">
    </form>
    <h2>Search for Financial Reports</h2>
    <form method="GET">
        <input type="text" name="search" placeholder="Search for reports... (e.g., Q2 earnings reports for tech companies 2023)">
        <input type="submit" value="Search">
    </form>
    <?php echo $search_result; ?>
</div>

</body>
</html>
