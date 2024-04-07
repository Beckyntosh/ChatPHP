<?php
// MySQL Connection Settings
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

// Create Jobs Table If Not Exists
$sql = "CREATE TABLE IF NOT EXISTS job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(50),
    remote ENUM('yes', 'no') DEFAULT 'no',
    posted_date DATE,
    category VARCHAR(50)
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle the search
$search = '';
$filter_remote = '';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
    $filter_remote = isset($_GET['filter_remote']) ? mysqli_real_escape_string($conn, $_GET['filter_remote']) : '';
}

// Fetch Data from Database based on search and filter
$sql = "SELECT * FROM job_listings WHERE title LIKE '%$search%'";

if ($filter_remote != '') {
    $sql .= " AND remote='$filter_remote'";
}

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Listings</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .job-listing { margin-bottom: 20px; padding: 10px; border: 1px solid #ddd; }
    </style>
</head>
<body>
<h2>Search Job Listings</h2>
<form action="" method="GET">
    <input type="text" name="search" placeholder="Search Jobs..." value="<?= $search ?>">
    <select name="filter_remote">
        <option value="">Select Remote</option>
        <option value="yes" <?= $filter_remote == 'yes' ? 'selected' : '' ?>>Remote Only</option>
        <option value="no" <?= $filter_remote == 'no' ? 'selected' : '' ?>>In-office Only</option>
    </select>
    <button type="submit">Search</button>
</form>

<?php
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='job-listing'>";
        echo "<h3>" . $row["title"]. "</h3>";
        echo "<p>" . $row["description"]. "</p>";
        echo "<p>Location: " . $row["location"] . "</p>";
        echo "<p>Remote: " . $row["remote"] . "</p>";
        echo "<p>Posted Date: " . $row["posted_date"] . "</p>";
        echo "</div>";
    }
} else {
    echo "0 results found";
}
?>

</body>
</html>

<?php
$conn->close();
?>
