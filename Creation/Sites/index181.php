<?php
// Connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    video_url VARCHAR(255) NOT NULL
)";

if (!$conn->query($table_sql)) {
    die("Error creating table: " . $conn->error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $video_url = $_POST['video_url'];

    $insert_sql = "INSERT INTO custom_exercises (name, description, video_url) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($insert_sql)) {
        $stmt->bind_param("sss", $name, $description, $video_url);

        if ($stmt->execute()) {
            echo "<p>Exercise added successfully!</p>";
        } else {
            echo "<p>Error adding exercise: " . $conn->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Unable to prepare statement: " . $conn->error . "</p>";
    }
}

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Custom Exercise</title>
</head>
<body>
    <h2>Add Custom Exercise</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Exercise Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <label for="video_url">Video URL:</label><br>
        <input type="text" id="video_url" name="video_url" required><br><br>
        <input type="submit" value="Add Exercise">
    </form>
</body>
</html>