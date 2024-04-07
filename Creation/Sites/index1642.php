<?php
// Simple PHP script to add custom exercises to a fitness app (Musical Instrument themed website), including a front-end form and backend logic to insert data into MySQL database.

// Database configuration
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $exerciseName = $_POST["exerciseName"];
  $instructions = $_POST["instructions"];
  $videoURL = $_POST["videoURL"];

  // Prepare SQL statement to insert data into the database
  $stmt = $conn->prepare("INSERT INTO custom_exercises (name, instructions, video_url) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $exerciseName, $instructions, $videoURL);

  // Execute query and check if it was successful
  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

// HTML Form for input
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Custom Exercise</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 500px; margin: auto; padding: 20px; }
        form { display: flex; flex-direction: column; }
        input, textarea { margin-bottom: 10px; padding: 8px; }
        label { font-weight: bold; margin-bottom: 5px; }
        button { padding: 10px; background-color: darkblue; color: white; border: none; cursor: pointer; }
        button:hover { background-color: darkred; }
    </style>
</head>
<body>
<div class="container">
    <h2>Add a New Custom Exercise</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="exerciseName">Exercise Name:</label>
        <input type="text" id="exerciseName" name="exerciseName" required>

        <label for="instructions">Instructions:</label>
        <textarea id="instructions" name="instructions" required></textarea>

        <label for="videoURL">Video URL:</label>
        <input type="url" id="videoURL" name="videoURL">

        <button type="submit" name="submit">Add Exercise</button>
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>
