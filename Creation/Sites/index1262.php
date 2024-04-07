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

    // Create table if it does not exist
    $sql = "CREATE TABLE IF NOT EXISTS ExerciseLog (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        type VARCHAR(30) NOT NULL,
        duration INT(10),
        intensity VARCHAR(10),
        reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table ExerciseLog created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $type = $_POST["type"];
        $duration = $_POST["duration"];
        $intensity = $_POST["intensity"];

        $stmt = $conn->prepare("INSERT INTO ExerciseLog (type, duration, intensity) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $type, $duration, $intensity);
        
        if ($stmt->execute() === TRUE) {
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
    <title>Add Exercise to Workout Log</title>
</head>
<body>
    <h2>Exercise Log</h2>
    <form method="post" action="exercise_log.php">
        <label for="type">Exercise Type:</label><br>
        <input type="text" id="type" name="type"><br>
        <label for="duration">Duration (in minutes):</label><br>
        <input type="number" id="duration" name="duration"><br>
        <label for="intensity">Intensity:</label><br>
        <select id="intensity" name="intensity">
            <option value="low">Low</option>
            <option value="moderate">Moderate</option>
            <option value="high">High</option>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
