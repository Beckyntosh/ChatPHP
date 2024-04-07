<?php
// Define database settings
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Attempt to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    goal_amount DOUBLE NOT NULL,
    saved_amount DOUBLE DEFAULT 0,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goal_name = $_POST['goal_name'];
    $goal_amount = $_POST['goal_amount'];

    $stmt = $conn->prepare("INSERT INTO finance_goals (goal_name, goal_amount) VALUES (?, ?)");
    $stmt->bind_param("sd", $goal_name, $goal_amount);

    if ($stmt->execute()) {
        echo "<p>Goal added successfully!</p>";
    } else {
        echo "<p>Error adding goal: " . $conn->error . "</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Finance Goal Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a Finance Goal</h2>
        <form method="POST">
            <label for="goal_name">Goal Name:</label>
            <input type="text" id="goal_name" name="goal_name" required><br><br>
            <label for="goal_amount">Goal Amount ($):</label>
            <input type="number" id="goal_amount" name="goal_amount" step="0.01" required><br><br>
            <button type="submit">Save Goal</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
