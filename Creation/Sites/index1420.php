<?php
// Database info
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

// Create table for habits if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS daily_habits (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    habit VARCHAR(255) NOT NULL,
    goal INT(6) NOT NULL,
    progress INT(6) DEFAULT 0,
    date DATE NOT NULL,
    UNIQUE KEY unique_habit (habit, date)
    )";

if ($conn->query($createTable) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $habit = $_POST['habit'] ?? '';
    $goal = $_POST['goal'] ?? 0;
    $date = date('Y-m-d'); // Current date

    // Insert or update habit entry
    $insertOrUpdate = "INSERT INTO daily_habits (habit, goal, date) VALUES ('$habit', $goal, '$date')
    ON DUPLICATE KEY UPDATE goal=$goal";

    if ($conn->query($insertOrUpdate) === TRUE) {
        echo "Habit entry added successfully";
    } else {
        echo "Error: " . $insertOrUpdate . "<br>" . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Habit Tracker</title>
</head>
<body>

<h2>Daily Habit Tracker</h2>

<form method="post" action="">
    Habit: <input type="text" name="habit" required>
    <br><br>
    Goal (Liters of water): <input type="number" name="goal" required min="1">
    <br><br>
    <input type="submit" value="Track Habit">
</form>

</body>
</html>

<?php
$conn->close();
?>
