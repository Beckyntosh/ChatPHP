<?php
// Assuming you want a very simple approach without modern frameworks for learning purposes

// Establish database connection
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

// Create jobs table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS jobs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  location VARCHAR(50),
  is_remote BOOLEAN DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  die("Error creating table: " . $conn->error);
}

// Insert dummy data
$jobs = [
  ['title' => 'Remote Software Developer', 'description' => 'PHP Developer', 'location' => 'Anywhere', 'is_remote' => 1],
  ['title' => 'Local Software Engineer', 'description' => 'PHP Engineer', 'location' => 'San Francisco', 'is_remote' => 0],
];

foreach ($jobs as $job) {
  $sql = "INSERT INTO jobs (title, description, location, is_remote) VALUES ('{$job['title']}', '{$job['description']}', '{$job['location']}', {$job['is_remote']})";
  $conn->query($sql);
}

// Handle form submission
$search = isset($_POST['search']) ? $_POST['search'] : '';
$isRemote = isset($_POST['is_remote']) ? 1 : 0;

// Fetch jobs based on search and filter
$sql = "SELECT * FROM jobs WHERE title LIKE '%$search%' AND is_remote = $isRemote";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Job Listings</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .job { margin-bottom: 20px; padding: 20px; border: 1px solid #ddd; }
  </style>
</head>
<body>

<h2>Search for Job Listings</h2>
<form action="" method="post">
  <input type="text" name="search" placeholder="Job title..." value="<?php echo htmlspecialchars($search); ?>">
  <label>
    <input type="checkbox" name="is_remote" <?php echo $isRemote ? 'checked' : '' ?>> Remote only
  </label>
  <button type="submit">Search</button>
</form>

<div class="jobs">
  <?php if ($result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="job">
        <h3><?php echo $row["title"]; ?></h3>
        <p><?php echo $row["description"]; ?></p>
        <p><?php echo $row["is_remote"] ? "Remote" : "Location: " . $row["location"]; ?></p>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p>No jobs found</p>
  <?php endif; ?>
</div>

</body>
</html>
<?php
$conn->close();
?>
