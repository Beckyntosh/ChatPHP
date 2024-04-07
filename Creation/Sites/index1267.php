<?php
// DB connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS ExerciseLog (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        exercise VARCHAR(30) NOT NULL,
        duration INT(11) NOT NULL,
        intensity VARCHAR(30) NOT NULL,
        log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $conn->exec($sql);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $exercise = $_POST['exercise'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];

    $sql = "INSERT INTO ExerciseLog (exercise, duration, intensity) VALUES (?, ?, ?)";
    
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$exercise, $duration, $intensity]);
        echo "New record created successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exercise Log</title>
</head>
<body>
    <h2>Log Your Exercise</h2>
    <form method="post">
        <label for="exercise">Exercise:</label>
        <input type="text" id="exercise" name="exercise" required>
        <label for="duration">Duration (minutes):</label>
        <input type="number" id="duration" name="duration" required>
        <label for="intensity">Intensity:</label>
        <select id="intensity" name="intensity">
            <option value="low">Low</option>
            <option value="moderate" selected>Moderate</option>
            <option value="high">High</option>
        </select>
        <input type="submit" value="Log Exercise">
    </form>

    <h2>Exercise Logs</h2>
    <?php
    $sql = "SELECT * FROM ExerciseLog ORDER BY log_date DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    if ($stmt->rowCount() > 0) {
        echo "<table><tr><th>Exercise</th><th>Duration</th><th>Intensity</th><th>Date</th></tr>";
        foreach ($results as $row) {
            echo "<tr><td>".$row["exercise"]."</td><td>".$row["duration"]." minutes</td><td>".$row["intensity"]."</td><td>".$row["log_date"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No exercise log found.";
    }
    ?>
</body>
</html>
