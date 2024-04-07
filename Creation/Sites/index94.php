<?php
// Connection to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Creating table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS job_listings (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  location VARCHAR(100),
  is_remote BOOLEAN DEFAULT false,
  technology VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $location = $_POST['location'];
  $is_remote = isset($_POST['is_remote']) ? 1 : 0;
  $technology = $_POST['technology'];

  $stmt = $conn->prepare("INSERT INTO job_listings (title, description, location, is_remote, technology) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssds", $title, $description, $location, $is_remote, $technology);

  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $stmt->close();
}

// Fetching jobs from the database
$sql = "SELECT * FROM job_listings WHERE 1=1";
if (isset($_GET['search'])) {
  $searchTerm = "%{$_GET['search']}%";
  $sql .= " AND (title LIKE '$searchTerm' OR description LIKE '$searchTerm')";
}
if (isset($_GET['technology']) && !empty($_GET['technology'])) {
  $technology = $_GET['technology'];
  $sql .= " AND technology = '$technology'";
}
if (isset($_GET['is_remote']) && $_GET['is_remote'] == 'on') {
  $sql .= " AND is_remote = 1";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Job Listings</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .job-listing { margin-bottom: 20px; padding: 20px; border: 1px solid #ddd; }
    .job-listing h2 { margin: 0; }
  </style>
</head>
<body>
  <h1>Job Listings</h1>
  <form action="" method="get">
    <input type="text" name="search" placeholder="Keywords like 'remote', 'PHP'...">
    <input type="text" name="technology" placeholder="Technology...">
    <label>
      <input type="checkbox" name="is_remote">
      Remote Only
    </label>
    <button type="submit">Search</button>
  </form>
  <?php if ($result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="job-listing">
        <h2><?= $row["title"] ?></h2>
        <p><?= $row["description"] ?></p>
        <p><strong>Location:</strong> <?= $row["is_remote"] ? "Remote" : $row["location"] ?></p>
        <p><strong>Technology:</strong> <?= $row["technology"] ?></p>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p>No job listings found.</p>
  <?php endif; ?>
</body>
</html>
<?php
$conn->close();
?>
