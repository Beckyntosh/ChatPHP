<?php

// MySQL Connection Settings
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_SERVER", "db");

// Connect to MySQL Database
$mysqli = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create Jobs Table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255) NOT NULL,
    job_description TEXT NOT NULL,
    job_type ENUM('full-time', 'part-time', 'remote') NOT NULL,
    skills_required VARCHAR(255),
    reg_date TIMESTAMP
)";

if (!$mysqli->query($sql)) {
    echo "Error creating table: " . $mysqli->error;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search</title>
    <style>
        /* Simple CSS for layout */
        body { font-family: Arial, sans-serif; }
        .job { padding: 20px; border-bottom: 1px solid #ddd; }
        .job:last-child { border-bottom: none; }
    </style>
</head>
<body>
    <h1>Job Listings</h1>
    <form method="POST">
        <input type="text" name="search" placeholder="Enter job title or skills" />
        <select name="type">
            <option value="">Any Type</option>
            <option value="full-time">Full-time</option>
            <option value="part-time">Part-time</option>
            <option value="remote">Remote</option>
        </select>
        <button type="submit">Search</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search'] ?? '';
        $type = $_POST['type'] ?? '';

        $sql = "SELECT * FROM jobs WHERE job_title LIKE ? OR skills_required LIKE ?";
        if (!empty($type)) {
            $sql .= " AND job_type = ?";
        }

        $stmt = $mysqli->prepare($sql);

        if (empty($type)) {
            $stmt->bind_param("ss", $searchWildcard, $searchWildcard);
        } else {
            $stmt->bind_param("sss", $searchWildcard, $searchWildcard, $type);
        }
        
        $searchWildcard = '%' . $search . '%';
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='job'>";
                echo "<h2>" . htmlspecialchars($row["job_title"]) . " (" . htmlspecialchars($row["job_type"]) . ")</h2>";
                echo "<p>" . htmlspecialchars($row["job_description"]) . "</p>";
                echo "<p><strong>Skills Required:</strong> " . htmlspecialchars($row["skills_required"]) . "</p>";
                echo "</div>";
            }
        } else {
            echo "0 results found";
        }
    }
    ?>
</body>
</html>
<?php $mysqli->close(); ?>
