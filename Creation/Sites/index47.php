<?php
// PHP + MySQLi web application for job listing search with filters
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $position_type = mysqli_real_escape_string($conn, $_POST['position_type']);
  
    $sql = "SELECT * FROM jobs WHERE (title LIKE '%$search%' OR description LIKE '%$search%') AND position_type='$position_type'";
} else {
    $sql = "SELECT * FROM jobs";
}

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .job { padding: 20px; margin: 20px; border: 1px solid #ccc; border-radius: 5px; }
        .job h2 { margin-top: 0; }
        .filter-section { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Job Search</h1>
    <div class="filter-section">
        <form action="" method="post">
            <input type="text" name="search" placeholder="e.g., remote software creator">
            <select name="position_type">
                <option value="">Select Position Type</option>
                <option value="remote">Remote</option>
                <option value="on-site">On-site</option>
            </select>
            <button type="submit">Search</button>
        </form>
    </div>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='job'>";
        echo "<h2>" . htmlspecialchars($row["title"]) . "</h2>";
        echo "<p><strong>Type:</strong> " . htmlspecialchars($row["position_type"]) . "</p>";
        echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
        echo "</div>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>

Given your requirements, the above PHP and HTML code builds a simple job listing web page with search and filter functionality for position types, specifically designed with a single-file approach to meet your request. Please ensure that the MySQL database `my_database` exists and is properly structured with at least a `jobs` table containing columns for `title`, `description`, and `position_type`. Additionally, tailor the security measures such as user authentication, data validation, and error handling as per your project's needs.