<?php
// Connect to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create the financial_reports table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(50) NOT NULL,
    report_type VARCHAR(50) NOT NULL,
    year YEAR(4),
    content TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle the POST request from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $company_name = $_POST['company_name'];
  $report_type = $_POST['report_type'];
  $year = $_POST['year'];
  $content = $_POST['content'];

  $sql = "INSERT INTO financial_reports (company_name, report_type, year, content)
  VALUES ('$company_name', '$report_type', '$year', '$content')";

  if ($conn->query($sql) === TRUE) {
    echo "New report submitted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// HTML and PHP to display the form and search results
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 50px; }
        form, .search-results { margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Submit & Search Financial Reports</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="company_name" placeholder="Company Name" required>
        <input type="text" name="report_type" placeholder="Report Type (e.g., Q2 earnings)" required>
        <input type="number" name="year" placeholder="Year" required>
        <textarea name="content" placeholder="Report Content" required></textarea>
        <input type="submit" value="Submit Report">
    </form>
    
    <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="search" placeholder="Search Reports (e.g., Q2 earnings reports for tech companies 2023)">
        <input type="submit" value="Search">
    </form>
    
    <div class="search-results">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql = "SELECT * FROM financial_reports WHERE 
                company_name LIKE '%$search%' OR 
                report_type LIKE '%$search%' OR 
                year LIKE '%$search%' OR 
                content LIKE '%$search%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<p><b>" . $row["company_name"]. "</b> - " . $row["report_type"] . " - " . $row["year"]. "<br>" . $row["content"]. "</p>";
                }
            } else {
                echo "0 results";
            }
        }
        $conn->close();
        ?>
    </div>
</div>
</body>
</html>
