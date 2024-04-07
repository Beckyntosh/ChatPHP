<?php
// Define MySQL connection details
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_DATABASE", "my_database");

// Establish connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Habit table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS Habits (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(255) NOT NULL,
    goal_quantity INT(10),
    current_quantity INT(10),
    goal_date DATE,
    reg_date TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
    echo ""; // Table created successfully or already exists. Not displaying message for aesthetics.
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $habitName = $_POST['habitName'];
    $goalQuantity = $_POST['goalQuantity'];
    $currentQuantity = 0; // Initially, no progress.
    $goalDate = $_POST['goalDate'];

    // Prepare SQL Statement
    $stmt = $conn->prepare("INSERT INTO Habits (habit_name, goal_quantity, current_quantity, goal_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siis", $habitName, $goalQuantity, $currentQuantity, $goalDate);

    // Execute statement
    if ($stmt->execute()) {
        echo "<p>Habit successfully added!</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Habit Tracker</title>
</head>
<body style="background: #333; color: #ddd; font-family: Arial, sans-serif;">
    <h2>Create a New Habit Entry</h2>
    <form action="" method="post">
        <label for="habitName">Habit Name:</label><br>
        <input type="text" id="habitName" name="habitName" value="Drink 2 liters of water daily"><br>
        <label for="goalQuantity">Goal Quantity:</label><br>
        <input type="number" id="goalQuantity" name="goalQuantity" value="2"><br>
        <label for="goalDate">Goal Date:</label><br>
        <input type="date" id="goalDate" name="goalDate" value="<?php echo date('Y-m-d'); ?>"><br><br>
        <input type="submit" value="Track Habit">
    </form>
</body>
</html>
