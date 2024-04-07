<?php
// Simple Habit Tracker Entry Web Application with a Romeo and Juliet theme.

// Database connection parameters
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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS habits (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(50) NOT NULL,
    goal_description VARCHAR(255),
    reminder_time TIME,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle Habit Entry Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $habit_name = $_POST['habit_name'];
    $goal_description = $_POST['goal_description'];
    $reminder_time = $_POST['reminder_time'];

    $sql = "INSERT INTO habits (habit_name, goal_description, reminder_time)
    VALUES ('" . $habit_name . "', '" . $goal_description . "', '" . $reminder_time . "')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>New habit successfully created.</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Habit Tracker in Romeo and Juliet Style</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f8f8f8;
            color: #444;
        }
        form, .content {
            background: white;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #b3b3b3;
            border-radius: 10px;
        }
        input[type="text"], input[type="time"] {
            width: calc(100% - 20px);
            padding: 9px 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Habit Tracker Application</h2>
        <p>Style inspired by Romeo and Juliet.</p>
        <form action="habit_tracker.php" method="post">
            <label for="habit_name">Habit Name:</label><br>
            <input type="text" id="habit_name" name="habit_name" required><br>
            <label for="goal_description">Goal Description:</label><br>
            <input type="text" id="goal_description" name="goal_description"><br>
            <label for="reminder_time">Reminder Time (HH:MM):</label><br>
            <input type="time" id="reminder_time" name="reminder_time"><br>
            <input type="submit" value="Create Habit Entry">
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>