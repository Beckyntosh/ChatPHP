<?php
// Connect to MySQL database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create the LearningPath table if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS LearningPath (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  createDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSql)) {
  die("Error creating table: " . $conn->error);
}

// Create Course table if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS Course (
  id INT AUTO_INCREMENT PRIMARY KEY,
  path_id INT,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  FOREIGN KEY (path_id) REFERENCES LearningPath(id)
)";

if (!$conn->query($createTableSql)) {
  die("Error creating table: " . $conn->error);
}

// Handle POST request to add a new learning path
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pathTitle'])) {
  $title = $conn->real_escape_string($_POST['pathTitle']);
  $description = $conn->real_escape_string($_POST['pathDescription']);
  $sql = "INSERT INTO LearningPath (title, description) VALUES ('$title', '$description')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New learning path created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Personalized Learning Paths</title>
</head>
<body>
<h1>Create a Custom Learning Path for Your Craft Beers Website</h1>
Form to create a new learning path
<form action="" method="post">
    <label for="pathTitle">Learning Path Title:</label><br>
    <input type="text" id="pathTitle" name="pathTitle" required><br>
    <label for="pathDescription">Description:</label><br>
    <textarea id="pathDescription" name="pathDescription" required></textarea><br>
    <input type="submit" value="Create">
</form>

<?php
// Retrieve and display all learning paths
$sql = "SELECT id, title, description FROM LearningPath";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<h2>Available Learning Paths</h2>";
  while($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>" . $row["title"] . "</h3>";
    echo "<p>" . $row["description"] . "</p>";
    echo "</div>";
  }
} else {
  echo "No learning paths found.";
}
?>

</body>
</html>
<?php
$conn->close();
?>
