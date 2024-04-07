<?php

// Database connection
$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Connect to MySQL
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create jobs table if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100) NOT NULL,
    is_remote BOOLEAN DEFAULT false,
    technology VARCHAR(50),
    reg_date TIMESTAMP
)";

if (!$conn->query($createTableSql)) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission to search for jobs
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchKeyword = $_POST['search'] ?? '';
    $isRemote = isset($_POST['remote']) ? 1 : 0;
    $technology = $_POST['technology'] ?? '';

    $sql = "SELECT * FROM jobs WHERE title LIKE ? AND (is_remote = ? OR location = ?) AND technology LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeSearch = "%$searchKeyword%";
    $stmt->bind_param("siss", $likeSearch, $isRemote, $searchKeyword, $technology);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM jobs");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <h2>Job Search</h2>
    <form method="POST">
        <input type="text" name="search" placeholder="Job title or location">
        <label><input type="checkbox" name="remote" value="1"> Remote Only</label>
        <select name="technology">
            <option value="">Any Technology</option>
            <option value="PHP">PHP</option>
        </select>
        <button type="submit">Search</button>
    </form>

    <h3>Job Listings</h3>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Location</th>
                <th>Remote</th>
                <th>Technology</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".htmlspecialchars($row['title'])."</td>
                            <td>".htmlspecialchars($row['description'])."</td>
                            <td>".htmlspecialchars($row['location'])."</td>
                            <td>".($row['is_remote'] ? 'Yes' : 'No')."</td>
                            <td>".htmlspecialchars($row['technology'])."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No jobs found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    $conn->close();
    ?>
</body>
</html>
