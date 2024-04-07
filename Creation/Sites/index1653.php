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
$sql = "CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(30) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle Post Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exercise_name = $_POST["exercise_name"];
  $instructions = $_POST["instructions"];
  $video_url = $_POST["video_url"];

  $stmt = $conn->prepare("INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $exercise_name, $instructions, $video_url);

  if ($stmt->execute() === TRUE) {
    echo "<p style='color: green;'>New record created successfully</p>";
  } else {
    echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Custom Exercise</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #2a2b2e;
        color: #00ff00;
    }
    form {
        display: flex;
        flex-direction: column;
        width: 300px;
        margin: auto;
    }
    input, textarea, button {
        margin: 10px 0;
    }
</style>
</head>
<body>
<h2>Add Custom Exercise</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="exercise_name">Exercise Name:</label>
    <input type="text" id="exercise_name" name="exercise_name" required>

    <label for="instructions">Instructions:</label>
    <textarea id="instructions" name="instructions" required></textarea>

    <label for="video_url">Video URL:</label>
    <input type="text" id="video_url" name="video_url" required>

    <button type="submit">Submit</button>
</form>
</body>
</html>
