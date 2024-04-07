<?php
// Establish connection to the database
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
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
goal_name VARCHAR(255) NOT NULL,
goal_amount DECIMAL(10,2) NOT NULL,
saved_amount DECIMAL(10,2) NOT NULL DEFAULT '0.00',
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table finance_goals created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $goal_name = $_POST['goal_name'];
  $goal_amount = $_POST['goal_amount'];
  $saved_amount = $_POST['saved_amount'];

  $sql = "INSERT INTO finance_goals (goal_name, goal_amount, saved_amount)
  VALUES ('$goal_name', '$goal_amount', '$saved_amount')";

  if ($conn->query($sql) === TRUE) {
    echo "New goal created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Finance Goals Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        form { margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Create a Personal Finance Goal</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="goal_name">Goal Name:</label><br>
        <input type="text" id="goal_name" name="goal_name" required><br>
        <label for="goal_amount">Goal Amount ($):</label><br>
        <input type="number" id="goal_amount" name="goal_amount" step="0.01" required><br>
        <label for="saved_amount">Saved Amount ($):</label><br>
        <input type="number" id="saved_amount" name="saved_amount" step="0.01" required><br><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Finance Goals</h2>
    <?php
    $sql = "SELECT id, goal_name, goal_amount, saved_amount FROM finance_goals";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["goal_name"]. " - $" . $row["goal_amount"]. " (Saved: $" . $row["saved_amount"]. ")</li>";
        }
        echo "</ul>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</div>
</body>
</html>
