<?php

// Initialize a simple PHP server-side script for a Maternity Wear website with an option to add custom exercises.

// Database credentials
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create table if it does not exist
try {
    $sql = "CREATE TABLE IF NOT EXISTS custom_exercises (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        instructions TEXT NOT NULL,
        video_url VARCHAR(255) NOT NULL,
        UNIQUE(title)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not create table. " . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'], $_POST['instructions'], $_POST['video_url'])) {
    // Prepare a statement
    $query = "INSERT INTO custom_exercises (title, instructions, video_url) VALUES (?, ?, ?)";
    if ($stmt = $pdo->prepare($query)) {
        // Bind variables to the prepared statement
        $stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
        $stmt->bindParam(2, $_POST['instructions'], PDO::PARAM_STR);
        $stmt->bindParam(3, $_POST['video_url'], PDO::PARAM_STR);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "<script>alert('Exercise added successfully.');</script>";
        } else {
            echo "<script>alert('Error. Please try again.');</script>";
        }

        unset($stmt);
    }
}

unset($pdo);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Custom Exercise</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .container { width: 500px; margin: auto; }
    form { display: flex; flex-direction: column; }
    label { margin-top: 10px; }
    input, textarea { margin-top: 5px; }
    button { margin-top: 20px; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Add Custom Exercise to Your Maternity Fitness App</h2>
    <form action="" method="post">
      <label for="title">Exercise Title:</label>
      <input type="text" name="title" id="title" required>
      <label for="instructions">Instructions:</label>
      <textarea name="instructions" id="instructions" rows="5" required></textarea>
      <label for="video_url">Video URL:</label>
      <input type="text" name="video_url" id="video_url" required>
      <button type="submit">Add Exercise</button>
    </form>
  </div>
</body>
</html>