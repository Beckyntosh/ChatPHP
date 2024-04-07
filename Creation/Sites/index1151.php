<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
  die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Create Jobs table if it does not exist
$query = "CREATE TABLE IF NOT EXISTS jobs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  location VARCHAR(255) NOT NULL,
  is_remote BOOLEAN NOT NULL DEFAULT 0,
  technology VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$mysqli->query($query)) {
  die("ERROR: Could not create table " . $mysqli->error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $search = mysqli_real_escape_string($mysqli, $_POST['search']);
  $location = mysqli_real_escape_string($mysqli, $_POST['location']);
  $is_remote = isset($_POST['is_remote']) ? 1 : 0;
  $technology = mysqli_real_escape_string($mysqli, $_POST['technology']);

  $sql = "SELECT * FROM jobs WHERE title LIKE '%$search%' AND location LIKE '%$location%' AND is_remote='$is_remote' AND technology LIKE '%$technology%'";
} else {
  $sql = "SELECT * FROM jobs";
}

$result = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Listing Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .job-listing { margin-bottom: 20px; padding: 20px; border: 1px solid #cccccc; }
        .job-listing h3 { margin: 0; padding-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Job Search</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="search">Job Title:</label>
        <input type="text" id="search" name="search"><br><br>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location"><br><br>
        <label for="is_remote">Remote:</label>
        <input type="checkbox" id="is_remote" name="is_remote" value="1"><br><br>
        <label for="technology">Technology:</label>
        <input type="text" id="technology" name="technology"><br><br>
        <input type="submit" value="Search">
    </form>
<?php
if ($result) {
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<div class='job-listing'>";
      echo "<h3>" . $row["title"] . "</h3>";
      echo "<p>" . $row["description"]. "</p>";
      echo "<p><b>Location:</b> " . $row["location"] . "</p>";
      echo "<p><b>Remote:</b> " . ($row["is_remote"] ? "Yes" : "No") . "</p>";
      echo "<p><b>Technology:</b> " . $row["technology"] . "</p>";
      echo "</div>";
    }
  } else {
    echo "<p>No jobs found.</p>";
  }
} else {
  echo "ERROR: Could not execute $sql. " . $mysqli->error;
}
$mysqli->close();
?>
</body>
</html>
