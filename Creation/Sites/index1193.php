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

// Create Reports table if not exists
$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_title VARCHAR(255) NOT NULL,
    company_type VARCHAR(50),
    year YEAR,
    quarter VARCHAR(50),
    report_content TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
  echo "Table financial_reports created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $report_title = $_POST['report_title'];
  $company_type = $_POST['company_type'];
  $year = $_POST['year'];
  $quarter = $_POST['quarter'];
  $report_content = $_POST['report_content'];
  
  // Insert report into database
  $sql = "INSERT INTO financial_reports (report_title, company_type, year, quarter, report_content)
  VALUES ('$report_title', '$company_type', '$year', '$quarter', '$report_content')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Handle search
$searchResult = "";
if (isset($_GET['search'])) {
  $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);
  $sql = "SELECT * FROM financial_reports WHERE report_title LIKE '%$searchTerm%' OR year = '$searchTerm' ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $searchResult .= "<div><h2>".$row["report_title"]."</h2><p>".$row["report_content"]."</p></div>";
    }
  } else {
    $searchResult = "0 results";
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Financial Reports Submission & Search</title>
</head>
<body style="background-color: #f0eade; font-family: 'Times New Roman', serif;">
    <h1>Submit Financial Report</h1>
    <form method="post" action="">
        Report Title: <input type="text" name="report_title" required><br>
        Company Type: <input type="text" name="company_type"><br>
        Year: <input type="text" name="year"><br>
        Quarter: <select name="quarter">
            <option value="Q1">Q1</option>
            <option value="Q2">Q2</option>
            <option value="Q3">Q3</option>
            <option value="Q4">Q4</option>
        </select><br>
        Report Content:<br> <textarea name="report_content" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <h1>Search Reports</h1>
    <form method="get" action="">
        <input type="text" name="search" placeholder="Search for reports...">
        <input type="submit" value="Search">
    </form>

Display search results
    <div><?php echo $searchResult; ?></div>
</body>
</html>
