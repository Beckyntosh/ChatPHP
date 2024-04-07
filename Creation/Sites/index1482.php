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
$createTable = "CREATE TABLE IF NOT EXISTS finance_goals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
goal VARCHAR(255) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
  //echo "Table finance_goals created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $goal = $_POST['goal'];
  $amount = $_POST['amount'];

  $sql = "INSERT INTO finance_goals (goal, amount) VALUES ('$goal', '$amount')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; margin: 10px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
        button:hover { opacity: 0.8; }
    </style>
</head>
<body>
<div class="container">
    <h2>Create a Personal Finance Goal</h2>
    <form action="" method="post">
        <label for="goal">Goal:</label>
        <input type="text" id="goal" name="goal" placeholder="e.g., Save $5,000 for travel" required>

        <label for="amount">Amount ($):</label>
        <input type="number" id="amount" name="amount" placeholder="5000" required>

        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
