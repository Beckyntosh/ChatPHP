<?php
// DB connection info
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

// Create table for finance goals if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
goal_name VARCHAR(255) NOT NULL,
goal_amount DECIMAL(10,2) NOT NULL,
saved_amount DECIMAL(10,2) NOT NULL DEFAULT 0.00,
reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert new finance goal
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $goal_name = $_POST['goal_name'];
  $goal_amount = $_POST['goal_amount'];
  
  $stmt = $conn->prepare("INSERT INTO finance_goals (goal_name, goal_amount) VALUES (?, ?)");
  $stmt->bind_param("sd", $goal_name, $goal_amount);
  
  if($stmt->execute()) {
    echo "New finance goal added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
<title>Finance Goals Tracker</title>
<style>
body {font-family: Arial, sans-serif; background-color: #f0f8ff; margin: 40px;}
.container {background-color: #fff; padding: 20px; border-radius: 5px;}
h2 {color: #0275d8;}
</style>
</head>
<body>
<div class="container">
  <h2>Add a New Finance Goal</h2>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="goal_name">Goal Name:</label><br>
    <input type="text" id="goal_name" name="goal_name" required><br>
    <label for="goal_amount">Goal Amount ($):</label><br>
    <input type="number" id="goal_amount" name="goal_amount" step="0.01" required><br><br>
    <input type="submit" value="Submit">
  </form>
</div>
</body>
</html>
