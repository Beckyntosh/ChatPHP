<?php
// Connect to Database
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

// Create the table if it doesn't already exist
$sql = "CREATE TABLE IF NOT EXISTS HabitTracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(255) NOT NULL,
goal_quantity INT(10) NOT NULL,
current_quantity INT(10) NOT NULL,
date DATE NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $habit_name = $_POST['habit_name'];
    $goal_quantity = $_POST['goal_quantity'];
    $current_quantity = $_POST['current_quantity'];
    $date = date('Y-m-d'); // today's date

    $insertSQL = "INSERT INTO HabitTracker (habit_name, goal_quantity, current_quantity, date) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($insertSQL);
    $stmt->bind_param("siis", $habit_name, $goal_quantity, $current_quantity, $date);

    if ($stmt->execute()) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
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
</head>
<body style="background-color:#f4f1de;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="habit_name"><b>Habit Name:</b></label><br>
        <input type="text" name="habit_name" required><br>
        <label for="goal_quantity"><b>Goal Quantity:</b></label><br>
        <input type="number" name="goal_quantity" required><br>
        <label for="current_quantity"><b>Current Quantity:</b></label><br>
        <input type="number" name="current_quantity" required><br><br>
        <input type="submit" value="Track Habit">
    </form>
</body>
</html>
