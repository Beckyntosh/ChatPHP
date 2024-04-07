<?php
// Define MySQL connection settings
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

// Create table if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($createTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check for post data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $instructions = $_POST["instructions"];
  $video_url = $_POST["video_url"];

  $stmt = $conn->prepare("INSERT INTO custom_exercises (name, instructions, video_url) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $instructions, $video_url);
  
  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Custom Exercise</title>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
  padding: 20px;
}
.content {
  background-color: #ffffff;
  padding: 20px;
  border-radius: 10px;
}
</style>
</head>
<body>

<div class="content">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="name">Exercise Name:</label><br>
    <input type="text" id="name" name="name" required><br>
    
    <label for="instructions">Instructions:</label><br>
    <textarea id="instructions" name="instructions" required></textarea><br>
    
    <label for="video_url">Video URL:</label><br>
    <input type="text" id="video_url" name="video_url" required><br><br>
    
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
