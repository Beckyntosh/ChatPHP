<?php
// Database connection setup
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

// SQL to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS HabitTracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit VARCHAR(255) NOT NULL,
goal INT(10),
current INT(10) DEFAULT 0,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $habit = $_POST['habit'];
    $goal = $_POST['goal'];

    // Insert the habit into the database
    $sqlInsert = "INSERT INTO HabitTracker (habit, goal) VALUES ('$habit', '$goal')";

    if ($conn->query($sqlInsert) === TRUE) {
        echo "New habit added successfully";
    } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Habit Tracker</title>
    <style>
        body {font-family: Arial, sans-serif; background-color: #f0e68c; color: #8b4513;}
        .container {max-width: 600px; margin: auto; padding: 20px;}
        input[type="text"], input[type="number"] {width: 100%; padding: 12px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
        input[type="submit"] {width: 100%; background-color: #8b4513; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;}
        input[type="submit"]:hover {background-color: #6b8e23;}
        .habit-list {margin-top: 20px;}
        .habit-item {background: #f4a460; padding: 10px; margin-bottom: 10px; border-radius: 4px;}
    </style>
</head>
<body>

<div class="container">
    <h2>Add a New Habit</h2>
    <form method="POST" action="">
        <label for="habit">Habit Name</label>
        <input type="text" id="habit" name="habit" required>

        <label for="goal">Goal (e.g., liters of water)</label>
        <input type="number" id="goal" name="goal" required>
        
        <input type="submit" value="Add Habit">
    </form>
</div>

<div class="container">
    <h2>My Habits</h2>
    <div class="habit-list">
        <?php
        $sqlSelect = "SELECT id, habit, goal, current FROM HabitTracker";
        $result = $conn->query($sqlSelect);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='habit-item'><strong>Habit:</strong> " . $row["habit"]. " - <strong>Goal:</strong> " . $row["goal"]. "L <strong>Current:</strong> " . $row["current"]. "L</div>";
            }
        } else {
            echo "No habits found";
        }
        ?>
    </div>
</div>

</body>
</html>

<?php $conn->close(); ?>
