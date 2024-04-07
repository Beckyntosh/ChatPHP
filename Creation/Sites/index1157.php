<?php
// Create connection to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS job_listing (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT,
location VARCHAR(100),
is_remote BOOLEAN DEFAULT false,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle search
$search = isset($_GET['search']) ? $_GET['search'] : '';
$is_remote = isset($_GET['is_remote']) && $_GET['is_remote'] == '1' ? true : false;

// SQL query
$sql = "SELECT * FROM job_listing WHERE title LIKE '%$search%' " . ($is_remote ? "AND is_remote = 1" : "");

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .job-listing { margin-bottom: 20px; padding: 10px; border: 1px solid #cccccc; border-radius: 5px; }
        .job-title { font-size: 18px; font-weight: bold; }
        .job-location, .job-remote { font-size: 14px; }
    </style>
</head>
<body>
    <h2>Job Search</h2>
    <form action="" method="get">
        <input type="text" name="search" placeholder="Job title" value="<?php echo htmlspecialchars($search); ?>">
        <label>
            <input type="checkbox" name="is_remote" value="1" <?php echo $is_remote ? 'checked' : ''; ?>> Remote
        </label>
        <input type="submit" value="Search">
    </form>

    <div class="job-results">
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='job-listing'>";
                    echo "<div class='job-title'>". htmlspecialchars($row["title"]) ."</div>";
                    echo "<div class='job-description'>". nl2br(htmlspecialchars($row["description"])) ."</div>";
                    if($row["is_remote"]) {
                        echo "<div class='job-remote'>Remote</div>";
                    } else {
                        echo "<div class='job-location'>Location: " . htmlspecialchars($row["location"]) . "</div>";
                    }
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
