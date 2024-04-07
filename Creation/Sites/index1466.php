


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
$tableCreateSQL = "CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    goal_amount DECIMAL(10,2) NOT NULL,
    reg_date TIMESTAMP
)";
$conn->query($tableCreateSQL);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goal_name = $_POST["goal_name"];
    $goal_amount = $_POST["goal_amount"];

    $stmt = $conn->prepare("INSERT INTO finance_goals (goal_name, goal_amount) VALUES (?, ?)");
    $stmt->bind_param("sd", $goal_name, $goal_amount);
    $stmt->execute();
    $stmt->close();

    echo "<p>Goal added successfully!</p>";
}

// Fetch all goals
$goals = [];
$result = $conn->query("SELECT goal_name, goal_amount, reg_date FROM finance_goals");
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $goals[] = $row;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Finance Goal Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table, th, td { border: 1px solid black; border-collapse: collapse; }
        th, td { padding: 10px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>Set a New Finance Goal</h2>
<form method="post" action="finance_goal.php">
    <label for="goal_name">Goal Name:</label><br>
    <input type="text" id="goal_name" name="goal_name" required><br>
    <label for="goal_amount">Goal Amount ($):</label><br>
    <input type="number" id="goal_amount" name="goal_amount" min="0" step="0.01" required><br><br>
    <input type="submit" value="Submit">
</form>

<h2>Finance Goals</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Amount</th>
        <th>Date</th>
    </tr>
    <?php foreach ($goals as $goal): ?>
    <tr>
        <td><?= htmlspecialchars($goal['goal_name']) ?></td>
        <td>$<?= number_format($goal['goal_amount'], 2) ?></td>
        <td><?= $goal['reg_date'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>

This example provides a basic implementation. For a production environment or more complex features, consider separating concerns into different files and using more advanced PHP frameworks, implementing robust security measures, and considering user experience aspects in detail.