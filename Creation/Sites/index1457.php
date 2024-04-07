<?php
// Assuming a single file application approach and basic functionalities

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

// Create tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    goal_amount DECIMAL(10, 2) NOT NULL,
    current_amount DECIMAL(10, 2) NOT NULL DEFAULT '0.00',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goal_name = $_POST["goal_name"];
    $goal_amount = $_POST["goal_amount"];

    $sql = "INSERT INTO finance_goals (goal_name, goal_amount)
    VALUES ('$goal_name', '$goal_amount')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personal Finance Goal</title>
</head>
<body>

<h2>Set a Finance Goal</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Goal Name: <input type="text" name="goal_name" required>
  <br><br>
  Goal Amount: <input type="number" name="goal_amount" required step="0.01">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<h2>Finance Goals</h2>
<?php
$sql = "SELECT id, goal_name, goal_amount, current_amount FROM finance_goals";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Goal Name</th><th>Goal Amount</th><th>Current Amount</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["goal_name"]. "</td><td> $" . $row["goal_amount"]. "</td><td>$" . $row["current_amount"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
