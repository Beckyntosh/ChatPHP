<?php
$serverName = "db";
$database = "my_database";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($serverName, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create habits table if not exists
$sql = "CREATE TABLE IF NOT EXISTS habits (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(30) NOT NULL,
    goal INT(6) NOT NULL,
    reminder_time TIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Inserting habit entry
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $habit_name = $_POST['habit_name'];
    $goal = $_POST['goal'];
    $reminder_time = $_POST['reminder_time'];

    $stmt = $conn->prepare("INSERT INTO habits (habit_name, goal, reminder_time) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $habit_name, $goal, $reminder_time);
    $stmt->execute();

    echo "New habit created successfully";
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habit Tracker</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f4eee8;
            color: #3e4c59;
        }
        .container {
            width: 50%;
            margin: auto;
            background-color: #dcd7c9;
            padding: 20px;
            border-radius: 8px;
        }
        input, button {
            padding: 10px;
            margin: 5px 0px;
            border: 1px solid #786452;
            border-radius: 5px;
        }
        button {
            cursor: pointer;
            background-color: #786452;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add a New Habit</h2>
        <form method="POST">
            <div>
                <label for="habit_name">Habit Name:</label>
                <input type="text" id="habit_name" name="habit_name" required>
            </div>
            <div>
                <label for="goal">Goal (times per day):</label>
                <input type="number" id="goal" name="goal" min="1" max="100" required>
            </div>
            <div>
                <label for="reminder_time">Reminder Time (HH:MM):</label>
                <input type="time" id="reminder_time" name="reminder_time" required>
            </div>
            <button type="submit">Add Habit</button>
        </form>
    </div>
</body>
</html>