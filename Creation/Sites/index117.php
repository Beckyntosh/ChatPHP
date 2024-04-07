<?php
// Connect to Database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create Financial Reports Table if not exists
$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
company_name VARCHAR(50) NOT NULL,
report_type VARCHAR(50),
period VARCHAR(10),
year INT(4),
content TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table financial_reports created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle Search
$search_results = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $conn->real_escape_string($_POST['search_query']);
    $sql = "SELECT * FROM financial_reports WHERE content LIKE '%$search_query%' OR company_name LIKE '%$search_query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $search_results = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $search_results = [];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Search Financial Reports</title>
<style>
body {
    font-family: 'Times New Roman', serif;
    background-color: #f4f4f4;
    color: #333;
}
.container {
    width: 80%;
    margin: auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px #ccc;
}
.search-box{
    display: flex;
    justify-content: center;
    padding: 20px;
}
.search-box input[type='text'] {
    width: 70%;
    padding: 10px;
}
.search-box input[type='submit'] {
    padding: 10px;
    width: 20%;
}
table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}
table, th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}
th {
    background-color: #d2a679;
    color: white;
}
</style>
</head>
<body>

<div class="container">
    <h2>Search Financial Reports</h2>
    <div class="search-box">
        <form action="" method="post">
            <input type="text" name="search_query" placeholder="Enter search term...">
            <input type="submit" value="Search">
        </form>
    </div>
    <table>
        <tr>
            <th>Company</th>
            <th>Type</th>
            <th>Period</th>
            <th>Year</th>
            <th>Content</th>
        </tr>
        <?php
            if (!empty($search_results)) {
                foreach ($search_results as $report) {
                    echo "<tr>";
                    echo "<td>".$report['company_name']."</td>";
                    echo "<td>".$report['report_type']."</td>";
                    echo "<td>".$report['period']."</td>";
                    echo "<td>".$report['year']."</td>";
                    echo "<td>".$report['content']."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No results found</td></tr>";
            }
        ?>
    </table>
</div>

</body>
</html>
