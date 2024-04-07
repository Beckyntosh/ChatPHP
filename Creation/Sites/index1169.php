<?php
// Connect to Database
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
$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(50) NOT NULL,
    quarter VARCHAR(10) NOT NULL,
    year YEAR(4) NOT NULL,
    report TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo ""; // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $_POST['company_name'];
    $quarter = $_POST['quarter'];
    $year = $_POST['year'];
    $report = $_POST['report'];

    $stmt = $conn->prepare("INSERT INTO financial_reports (company_name, quarter, year, report) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $company_name, $quarter, $year, $report);

    if ($stmt->execute() === TRUE) {
        echo "New report successfully added";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search and Submit Financial Reports</title>
</head>
<body>
    <h2>Submit Financial Report</h2>
    <form method="POST">
        Company Name: <input type="text" name="company_name" required><br>
        Quarter: <input type="text" name="quarter" required><br>
        Year: <input type="text" name="year" required><br>
        Report: <textarea name="report" required></textarea><br>
        <input type="submit">
    </form>

    <h2>Search Reports</h2>
    <form method="GET">
        Search: <input type="text" name="search" required>
        <input type="submit" value="Search">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['search'])) {
        $search = $_GET['search'];
        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "SELECT * FROM financial_reports WHERE CONCAT(company_name, ' ', quarter, ' earnings report ', year) LIKE ?";
        $stmt = $conn->prepare($sql);
        $search_param = "%" . $search . "%";
        $stmt->bind_param("s", $search_param);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<p><strong>" . $row["company_name"]. "</strong> - " . $row["quarter"]. " " . $row["year"]. "<br>" . $row["report"]. "</p>";
            }
        } else {
            echo "0 results";
        }
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
