<?php

// MySQL connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Establish MySQL connection
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS habit_tracker (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(255) NOT NULL,
    goal INT(11) NOT NULL,
    progress INT(11) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($tableCreationQuery)) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $habit_name = $_POST["habit_name"];
    $goal = (int)$_POST["goal"];

    $insertQuery = $conn->prepare("INSERT INTO habit_tracker (habit_name, goal) VALUES (?, ?)");
    $insertQuery->bind_param("si", $habit_name, $goal);

    if ($insertQuery->execute()) {
        echo "<p>Habit added successfully!</p>";
    } else {
        echo "<p>Error adding habit: " . $conn->error . "</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Habit Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 300px; margin: auto; }
        form { margin-top: 20px; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; margin: 10px 0; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add a New Habit</h2>
        <form method="POST">
            <label for="habit_name">Habit Name:</label>
            <input type="text" id="habit_name" name="habit_name" required>

            <label for="goal">Daily Goal (e.g., liters of water):</label>
            <input type="number" id="goal" name="goal" required>

            <input type="submit" value="Add Habit">
        </form>
    </div>
</body>
</html>
