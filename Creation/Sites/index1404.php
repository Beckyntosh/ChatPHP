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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS habits (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(30) NOT NULL,
    goal_amount INT(10),
    current_amount INT(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert or Update Habit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $habit_name = $_POST['habit_name'];
  $goal_amount = $_POST['goal_amount'];
  $current_amount = $_POST['current_amount'];

  $check_habit_sql = "SELECT * FROM habits WHERE habit_name='$habit_name'";
  $result = $conn->query($check_habit_sql);

  if ($result->num_rows > 0) {
    // Update record
    $update_sql = "UPDATE habits SET goal_amount='$goal_amount', current_amount='$current_amount' WHERE habit_name='$habit_name'";
    if ($conn->query($update_sql) !== TRUE) {
      echo "Error updating record: " . $conn->error;
    }
  } else {
    // Create new record
    $insert_sql = "INSERT INTO habits (habit_name, goal_amount, current_amount) VALUES ('$habit_name', '$goal_amount', '$current_amount')";
    if ($conn->query($insert_sql) !== TRUE) {
      echo "Error inserting record: " . $conn->error;
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Habit Tracker for Water Intake</title>
</head>
<body>
    <h1>Track your daily water intake</h1>
    <form action="" method="post">
        <label for="habit_name">Habit Name:</label>
        <input type="text" id="habit_name" name="habit_name" value="Drink 2 liters of water daily" readonly>
        <br>
        <label for="goal_amount">Goal Amount:</label>
        <input type="number" id="goal_amount" name="goal_amount" value="2">
        <br>
        <label for="current_amount">Today's Amount (liters):</label>
        <input type="number" id="current_amount" name="current_amount">
        <br>
        <button type="submit">Submit</button>
    </form>
    <hr>
    <h2>Your Progress</h2>
    <?php
    $sql = "SELECT habit_name, goal_amount, current_amount FROM habits WHERE habit_name='Drink 2 liters of water daily'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<p>Habit: " . $row["habit_name"]. " - Goal: " . $row["goal_amount"]. "L, Current Intake: " . $row["current_amount"]. "L</p>";
      }
    } else {
      echo "No records found";
    }
    $conn->close();
    ?>
</body>
</html>
