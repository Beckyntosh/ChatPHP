<?php
// Define MySQL connection details
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "my_database");

// Attempt to connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create exercise table if it doesn't exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    intensity ENUM('low', 'moderate', 'high') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($tableCreationQuery)) {
    die("Error creating table: " . $conn->error);
}

$message = "";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $exercise_name = $conn->real_escape_string($_POST['exercise_name']);
    $duration = (int) $conn->real_escape_string($_POST['duration']);
    $intensity = $conn->real_escape_string($_POST['intensity']);

    // Insert the exercise into the database
    $insertQuery = "INSERT INTO exercises (exercise_name, duration, intensity) VALUES ('$exercise_name', $duration, '$intensity')";

    if ($conn->query($insertQuery)) {
        $message = "Exercise added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exercise</title>
</head>
<body>

<h2>Add Exercise to Your Digital Workout Log</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="exercise_name">Exercise Name:</label><br>
    <input type="text" id="exercise_name" name="exercise_name" required><br>
    <label for="duration">Duration (in minutes):</label><br>
    <input type="number" id="duration" name="duration" required><br>
    <label for="intensity">Intensity:</label><br>
    <select id="intensity" name="intensity" required>
        <option value="low">Low</option>
        <option value="moderate">Moderate</option>
        <option value="high">High</option>
    </select><br><br>
    <input type="submit" value="Add Exercise">
</form>

<?php if (!empty($message)) : ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

</body>
</html>
