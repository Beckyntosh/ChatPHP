<?php
// Connection to the database
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$createTables = "
CREATE TABLE IF NOT EXISTS habits (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(255) NOT NULL,
    goal INT(11) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS habit_entries (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_id INT(6) UNSIGNED,
    date DATE NOT NULL,
    quantity INT(11) NOT NULL,
    FOREIGN KEY (habit_id) REFERENCES habits(id),
    UNIQUE (habit_id, date)
);
";

if ($conn->multi_query($createTables) === TRUE) {
    do {
        if ($res = $conn->store_result()) {
            $res->free();
        }
    } while ($conn->more_results() && $conn->next_result());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $habitName = $_POST['habitName'];
    $goal = $_POST['goal'];

    $sql = "INSERT INTO habits (habit_name, goal) VALUES (?, ?)";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $habitName, $goal);
        $stmt->execute();
        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habit Tracker</title>
</head>
<body>
    <h1>Dennis Ritchie Style Habit Tracker</h1>
    <form action="" method="post">
        <p>
            <label for="habitName">Habit Name:</label>
            <input type="text" name="habitName" id="habitName" required>
        </p>
        <p>
            <label for="goal">Daily Goal (e.g., 2000 ml of water):</label>
            <input type="number" name="goal" id="goal" required>
        </p>
        <button type="submit">Add Habit</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
