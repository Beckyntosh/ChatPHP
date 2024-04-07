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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS jobs (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT,
location VARCHAR(100),
type VARCHAR(50),
remote ENUM('yes', 'no') DEFAULT 'no'
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$search = $_GET['search'] ?? '';
$whereClause = "WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

if (isset($_GET['remote'])) {
    $remote = $_GET['remote'] == 'yes' ? 'yes' : 'no';
    $whereClause .= " AND remote = '$remote'";
}

$sql = "SELECT * FROM jobs $whereClause";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>Job Search</title>
<style>
  body { font-family: Arial, sans-serif; }
  .job { padding: 20px; border: 1px solid #ddd; margin-bottom: 10px; }
</style>
</head>
<body>
<h2>Job Listings</h2>

<form method="GET">
  <input type="text" name="search" placeholder="Search for jobs" value="<?php echo htmlspecialchars($search); ?>">
  <select name="remote">
    <option value="">Select Remote</option>
    <option value="yes" <?php if (isset($_GET['remote']) && $_GET['remote'] == 'yes') { echo 'selected'; } ?>>Yes</option>
    <option value="no" <?php if (isset($_GET['remote']) && $_GET['remote'] == 'no') { echo 'selected'; } ?>>No</option>
  </select>
  <button type="submit">Search</button>
</form>

<?php
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<div class='job'>";
    echo "<h3>" . htmlspecialchars($row["title"]) . "</h3>";
    echo "<p>" . nl2br(htmlspecialchars($row["description"])) . "</p>";
    echo "<p>Location: " . htmlspecialchars($row["location"]) . "</p>";
    echo "<p>Type: " . htmlspecialchars($row["type"]) . "</p>";
    echo "<p>Remote: " . htmlspecialchars($row["remote"]) . "</p>";
    echo "</div>";
  }
} else {
  echo "<p>No results found</p>";
}
$conn->close();
?>
</body>
</html>
