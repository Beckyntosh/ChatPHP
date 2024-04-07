<?php
// Creating connection to the database
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

// Check if the add exercise form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $exerciseName = $_POST['exerciseName'];
    $instructions = $_POST['instructions'];
    $videoURL = $_POST['videoURL'];

    // Prepare an insert statement
    $sql = $conn->prepare("INSERT INTO custom_exercises (exerciseName, instructions, videoURL) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $exerciseName, $instructions, $videoURL);

    if ($sql->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql->close();
}

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exerciseName VARCHAR(30) NOT NULL,
    instructions TEXT NOT NULL,
    videoURL VARCHAR(100),
    reg_date TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
    // echo "Table custom_exercises created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Custom Exercise</title>
</head>
<body>
    <h2>Add Custom Exercise</h2>
    <form action="" method="post">
        <label for="exerciseName">Exercise Name:</label><br>
        <input type="text" id="exerciseName" name="exerciseName" required><br>
        <label for="instructions">Instructions:</label><br>
        <textarea id="instructions" name="instructions" required></textarea><br>
        <label for="videoURL">Video URL:</label><br>
        <input type="text" id="videoURL" name="videoURL"><br><br>
        <input type="submit" name="submit" value="Add Exercise">
    </form>
</body>
</html>