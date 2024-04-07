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
$sql = "CREATE TABLE IF NOT EXISTS exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert new exercise if POST request is made
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise_name = $_POST['exercise_name'];
    $instructions = $_POST['instructions'];
    $video_url = $_POST['video_url'];

    $stmt = $conn->prepare("INSERT INTO exercises (exercise_name, instructions, video_url) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $exercise_name, $instructions, $video_url);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Custom Exercise</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="exercise_name">Exercise Name:</label><br>
    <input type="text" id="exercise_name" name="exercise_name" required><br>
    <label for="instructions">Instructions:</label><br>
    <textarea id="instructions" name="instructions" required></textarea><br>
    <label for="video_url">Video URL:</label><br>
    <input type="text" id="video_url" name="video_url"><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
