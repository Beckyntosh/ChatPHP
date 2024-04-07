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

// Create Jobs Table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS job_listings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
location VARCHAR(100),
type ENUM('full-time', 'part-time', 'remote') NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

$search_query = "";
$location_filter = "";
$type_filter = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $search_query = $_POST['search_query'] ?? '';
  $location_filter = $_POST['location'] ?? '';
  $type_filter = $_POST['type'] ?? '';
}

// Prepare SQL with filters
$sql = "SELECT id, title, description, location, type FROM job_listings WHERE title LIKE ?";
$types = "s"; // string type for bind_param
$search_term = "%" . $search_query . "%";

if(!empty($location_filter)){
  $sql .= " AND location=?";
  $types .= "s"; // add another string parameter
  $search_term .= ",$location_filter";
}

if(!empty($type_filter) && in_array($type_filter, ['full-time', 'part-time', 'remote'])){
  $sql .= " AND type=?";
  $types .= "s"; // add another string parameter
  $search_term .= ",$type_filter";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param($types, ...explode(',', $search_term));
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html>
<head>
<title>Job Search</title>
<style>
* Simple CSS for clarity, update as per paranoid style */
body { font-family: Arial, sans-serif; }
</style>
</head>
<body>

<h2>Job Listings</h2>

<form method="POST">
  <label for="search_query">Search:</label>
  <input type="text" id="search_query" name="search_query" value="<?= htmlspecialchars($search_query); ?>">
  <label for="location">Location:</label>
  <input type="text" id="location" name="location" value="<?= htmlspecialchars($location_filter); ?>">
  <label for="type">Type:</label>
  <select id="type" name="type">
    <option value="" <?= $type_filter == "" ? "selected" : ""; ?>>Any</option>
    <option value="full-time" <?= $type_filter == "full-time" ? "selected" : ""; ?>>Full-time</option>
    <option value="part-time" <?= $type_filter == "part-time" ? "selected" : ""; ?>>Part-time</option>
    <option value="remote" <?= $type_filter == "remote" ? "selected" : ""; ?>>Remote</option>
  </select>
  <button type="submit">Search</button>
</form>

<?php if ($result->num_rows > 0): ?>
<ul>
  <?php while($row = $result->fetch_assoc()): ?>
    <li>
      <h3><?= htmlspecialchars($row['title']); ?></h3>
      <p><?= htmlspecialchars($row['description']); ?></p>
      <p><?= htmlspecialchars($row['location']); ?> - <strong><?= htmlspecialchars($row['type']); ?></strong></p>
    </li>
  <?php endwhile; ?>
</ul>
<?php else: ?>
<p>No job listings found.</p>
<?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>
