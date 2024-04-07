<?php
// Set up database connection
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

$pdo = new PDO(
    'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DATABASE, 
    MYSQL_USER, 
    MYSQL_PASSWORD, 
    $pdoOptions
);

// Create tables if not exists
$query = "CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(512) NOT NULL
)";
$pdo->exec($query);

// Handle POST request to add a new custom exercise
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $exerciseName = $_POST['exerciseName'] ?? '';
    $instructions = $_POST['instructions'] ?? '';
    $videoUrl = $_POST['videoUrl'] ?? '';

    if (!empty($exerciseName) && !empty($instructions) && !empty($videoUrl)) {
        $insertQuery = "INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($insertQuery);
        $stmt->execute([$exerciseName, $instructions, $videoUrl]);
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Fetch all custom exercises
$fetchQuery = "SELECT * FROM custom_exercises";
$exercises = $pdo->query($fetchQuery)->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Custom Exercise</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .exercise { margin-bottom: 20px; padding: 10px; background-color: #f2f2f2; }
    </style>
</head>
<body>
<h2>Add Custom Exercise</h2>

<form method="post">
    <div>
        <label for="exerciseName">Exercise Name:</label>
        <input type="text" id="exerciseName" name="exerciseName" required>
    </div>
    <div>
        <label for="instructions">Instructions:</label>
        <textarea id="instructions" name="instructions" required></textarea>
    </div>
    <div>
        <label for="videoUrl">Video URL:</label>
        <input type="text" id="videoUrl" name="videoUrl" required>
    </div>
    <button type="submit">Add Exercise</button>
</form>

<h2>Custom Exercises</h2>
<?php foreach ($exercises as $exercise): ?>
    <div class="exercise">
        <h3><?php echo htmlspecialchars($exercise['exercise_name']); ?></h3>
        <p><?php echo nl2br(htmlspecialchars($exercise['instructions'])); ?></p>
        <p><a href="<?php echo htmlspecialchars($exercise['video_url']); ?>">Watch Video</a></p>
    </div>
<?php endforeach; ?>
</body>
</html>
