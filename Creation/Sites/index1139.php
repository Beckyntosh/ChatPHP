<?php

// Simple script: Job Listing Search with Filters for "Remote Software Creator Positions"

// Database credentials
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$jobsTableSql = "CREATE TABLE IF NOT EXISTS jobs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  location VARCHAR(100) NOT NULL,
  is_remote BOOLEAN NOT NULL default FALSE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($jobsTableSql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$search = isset($_POST['search']) ? $_POST['search'] : '';
$isRemote = isset($_POST['is_remote']) && $_POST['is_remote'] === 'on' ? 1 : 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Job Search</title>
<style>
    body { font-family: Arial, sans-serif; }
    .job { margin-bottom: 20px; padding: 20px; border: 1px solid #ddd; }
</style>
</head>
<body>

<h1>Find Your Job</h1>

<form method="POST">
    <input type="text" name="search" placeholder="Enter job title" value="<?= htmlspecialchars($search) ?>">
    <label><input type="checkbox" name="is_remote" <?php if ($isRemote) echo 'checked'; ?>> Remote Only</label>
    <button type="submit">Search</button>
</form>

<div class="jobs">
<?php
$sql = "SELECT * FROM jobs WHERE title LIKE ? AND is_remote = ?";

$stmt = $conn->prepare($sql);
$searchParam = "%$search%";
$stmt->bind_param("si", $searchParam, $isRemote);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<div class='job'>";
    echo "<h2>" . htmlspecialchars($row["title"]) . "</h2>";
    echo "<p>" . nl2br(htmlspecialchars($row["description"])) . "</p>";
    echo "<p><strong>Location:</strong> " . htmlspecialchars($row["location"]) . ($row['is_remote'] ? " (Remote)" : "") . "</p>";
    echo "</div>";
  }
} else {
  echo "<p>No jobs found</p>";
}
?>
</div>

</body>
</html>
<?php
$conn->close();
?>
