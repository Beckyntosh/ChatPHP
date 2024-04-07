<?php

// MySQL connection parameters
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "my_database");

// Establish MySQL connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS habit_tracker (
    id INT AUTO_INCREMENT PRIMARY KEY,
    goal VARCHAR(255) NOT NULL,
    progress DOUBLE NOT NULL,
    date DATE NOT NULL UNIQUE
)";
if (!$conn->query($createTableSQL)) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goal = $_POST['goal'];
    $progress = $_POST['progress'];
    $date = date("Y-m-d"); // Using current date

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO habit_tracker (goal, progress, date) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $goal, $progress, $date);

    // Execute and close
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
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
        body { font-family: Arial, sans-serif; }
        .container { width: 90%; max-width: 600px; margin: auto; }
        form { display: flex; flex-direction: column; gap: 12px; }
        input, button { padding: 10px; font-size: 16px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daily Habit Tracker</h1>
        <form method="POST">
            <label for="goal">Goal:</label>
            <input type="text" id="goal" name="goal" value="Drink 2 liters of water daily" required>

            <label for="progress">Today's Progress (liters):</label>
            <input type="number" id="progress" name="progress" step="0.01" min="0" max="10" required>

            <button type="submit">Save Entry</button>
        </form>
    </div>
</body>
</html>
