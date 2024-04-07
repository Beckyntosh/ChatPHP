<?php
// Establish database connection
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

// Create exercises table if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS custom_exercises (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  instructions TEXT NOT NULL,
  video_url VARCHAR(255) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $instructions = $_POST["instructions"];
  $video_url = $_POST["video_url"];

  $stmt = $conn->prepare("INSERT INTO custom_exercises (name, instructions, video_url) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $instructions, $video_url);

  if($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Custom Exercise</title>
</head>
<body>

<h2>Add Custom Exercise</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="name">Exercise Name:</label><br>
  <input type="text" id="name" name="name" required><br>
  <label for="instructions">Instructions:</label><br>
  <textarea id="instructions" name="instructions" required></textarea><br>
  <label for="video_url">Video URL:</label><br>
  <input type="url" id="video_url" name="video_url" required><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
