<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Exercise to Digital Log</title>
    <style>
        body { font-family: "Courier New", monospace; }
        form { width: 300px; margin: 100px auto; }
        input, select { display: block; width: 100%; margin-bottom: 10px; }
    </style>
</head>
<body>

<form action="" method="post">
    <label for="exercise">Exercise Name:</label>
    <input type="text" id="exercise" name="exercise" required>

    <label for="duration">Duration (minutes):</label>
    <input type="number" id="duration" name="duration" required>

    <label for="intensity">Intensity:</label>
    <select id="intensity" name="intensity" required>
        <option value="Low">Low</option>
        <option value="Moderate">Moderate</option>
        <option value="High">High</option>
    </select>

    <input type="submit" name="submit" value="Log Exercise">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $exercise = $_POST['exercise'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];

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

    // Check if the table exists, if not create it
    $checkTable = "SHOW TABLES LIKE 'workout_log'";
    $result = $conn->query($checkTable);
    if ($result->num_rows == 0) {
        $createTable = "CREATE TABLE workout_log (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            exercise VARCHAR(255) NOT NULL,
            duration INT(10) NOT NULL,
            intensity VARCHAR(50) NOT NULL,
            log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if ($conn->query($createTable) === TRUE) {
            echo "<p>Table workout_log created successfully</p>";
        } else {
            echo "<p>Error creating table: " . $conn->error . "</p>";
        }
    }

    // Insert exercise log
    $stmt = $conn->prepare("INSERT INTO workout_log (exercise, duration, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $exercise, $duration, $intensity);
    
    if ($stmt->execute()) {
        echo "<p>Exercise logged successfully!</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

</body>
</html>
