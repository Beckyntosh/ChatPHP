<?php
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS habit_tracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit VARCHAR(255) NOT NULL,
goal INT NOT NULL,
date DATE NOT NULL,
entries INT DEFAULT 0,
reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle post request
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $habit = $_POST['habit'];
    $goal = $_POST['goal'];
    $date = date("Y-m-d"); // Today's date

    // Check if entry exists
    $check_sql = "SELECT * FROM habit_tracker WHERE date='$date' AND habit='$habit'";
    $result = $conn->query($check_sql);

    if($result->num_rows > 0) {
        // Update entry
        $row = $result->fetch_assoc();
        $entries = $row['entries'] + 1;
        $update_sql = "UPDATE habit_tracker SET entries=$entries WHERE date='$date' AND habit='$habit'";
        if(!$conn->query($update_sql) === TRUE) {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // Insert new entry
        $insert_sql = "INSERT INTO habit_tracker (habit, goal, date, entries) VALUES ('$habit', '$goal', '$date', 1)";
        if(!$conn->query($insert_sql) === TRUE) {
            echo "Error inserting record: " . $conn->error;
        }
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
    <h1>Habit Tracker</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="habit">Habit:</label><br>
        <input type="text" id="habit" name="habit" value="Drink 2 liters of water daily"><br>
        <label for="goal">Goal (liters):</label><br>
        <input type="number" id="goal" name="goal" value="2"><br><br>
        <input type="submit" value="Submit">
    </form>
    <h2>Your Entries</h2>
    <?php
    // Select entries
    $select_sql = "SELECT * FROM habit_tracker WHERE date='$date'";
    $result = $conn->query($select_sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>Habit: " . $row["habit"]. " - Goal: " . $row["goal"]. " liters - Completed: " . $row["entries"]. " times</li>";
        }
        echo "</ul>";
    } else {
        echo "No entries for today!";
    }
    $conn->close();
    ?>
</body>
</html>
