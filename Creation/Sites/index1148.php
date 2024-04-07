<?php
// Define MySQL connection parameters
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
is_remote BOOLEAN NOT NULL,
technology VARCHAR(50),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Jobs created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle search
$search = isset($_POST['search']) ? $_POST['search'] : '';
$is_remote = isset($_POST['is_remote']) ? 1 : 0;
$technology = isset($_POST['technology']) ? $_POST['technology'] : '';

$sql = "SELECT * FROM jobs WHERE title LIKE ? AND is_remote = ? AND technology LIKE ?";

$stmt = $conn->prepare($sql);
$search_term = "%" . $search . "%";
$stmt->bind_param("sis", $search_term, $is_remote, $technology);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .job-listing { background: #f4f4f4; margin: 10px; padding: 20px; border-radius: 8px; }
        .job-listing h2, .job-listing p { margin: 0; }
    </style>
</head>
<body>
    <h1>Job Listings</h1>
    <form method="post">
        <label>Search: <input type="text" name="search" value="<?= $search ?>"></label>
        <label>Remote Only: <input type="checkbox" name="is_remote" <?= $is_remote ? 'checked' : '' ?>></label>
        <select name="technology">
            <option value="">Any Technology</option>
            <option value="PHP" <?= $technology == "PHP"? 'selected' : '' ?>>PHP</option>
        </select>
        <input type="submit" value="Search">
    </form>
    <div class="job-results">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='job-listing'>";
                echo "<h2>" . $row["title"]. "</h2>";
                echo "<p>" . $row["description"]. "</p>";
                echo "<p>Remote: " . ($row["is_remote"] ? 'Yes' : 'No'). "</p>";
                echo "<p>Technology: " . $row["technology"]. "</p>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        
        $conn->close();
        ?>
    </div>
</body>
</html>

