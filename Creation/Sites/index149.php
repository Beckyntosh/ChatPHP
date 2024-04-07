<?php
// Save this file as index.php in your project root

// Connection parameters
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

// SQL to create table for finance goals
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
goal_name VARCHAR(30) NOT NULL,
goal_target DOUBLE NOT NULL,
amount_saved DOUBLE NOT NULL DEFAULT 0,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Uncomment the line below to see the message when the table is created successfully.
  // echo "Table finance_goals created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $goal_name = $_POST['goal_name'];
  $goal_target = $_POST['goal_target'];
  $amount_saved = $_POST['amount_saved'];

  // Prepare SQL and bind parameters
  $stmt = $conn->prepare("INSERT INTO finance_goals (goal_name, goal_target, amount_saved) VALUES (?, ?, ?)");
  $stmt->bind_param("sdd", $goal_name, $goal_target, $amount_saved);
  
  if($stmt->execute()) {
    $successMsg = "Goal added successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Personal Finance Goals</title>
<style>
  body {
    font-family: 'Times New Roman', serif;
    background: #f5f5f5;
    color: #555;
  }
  .container {
    width: 80%;
    margin: auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  h2 {
    color: #333;
  }
  .goal-form {
    margin-top: 20px;
  }
  .goal-form input[type="text"], .goal-form input[type="number"] {
    padding: 10px;
    margin: 10px 0;
    width: calc(100% - 22px);
  }
  .goal-form input[type="submit"] {
    padding: 10px 20px;
    background: #64485C;
    color: white;
    border: none;
    cursor: pointer;
  }
  .goal-form input[type="submit"]:hover {
    background: #513748;
  }
  table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
  }
  table, th, td {
    border: 1px solid #ddd;
  }
  th, td {
    padding: 10px;
    text-align: left;
  }
  th {
    background-color: #64485C;
    color: #fff;
  }
</style>
</head>
<body>

<div class="container">
  <h2>Romeo and Juliet Beauty Products - Finance Goals</h2>
  
  <?php if(!empty($successMsg)): ?>
  <p style="color: green;"><?php echo $successMsg; ?></p>
  <?php endif; ?>
  
  <form action="" method="post" class="goal-form">
    <label for="goal_name">Goal Name:</label><br>
    <input type="text" id="goal_name" name="goal_name" required><br>
    
    <label for="goal_target">Goal Target (USD):</label><br>
    <input type="number" step="0.01" id="goal_target" name="goal_target" required><br>
    
    <label for="amount_saved">Amount Saved (USD):</label><br>
    <input type="number" step="0.01" id="amount_saved" name="amount_saved" required><br>
    
    <input type="submit" value="Add Goal">
  </form>
  
  <?php
    $sql = "SELECT id, goal_name, goal_target, amount_saved, reg_date FROM finance_goals";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<table><tr><th>Goal</th><th>Target</th><th>Saved</th><th>Date</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row["goal_name"]) . "</td><td>" . htmlspecialchars($row["goal_target"]) . "</td><td>" . htmlspecialchars($row["amount_saved"]) . "</td><td>" . htmlspecialchars($row["reg_date"]) . "</td></tr>";
      }
      echo "</table>";
    } else {
      echo "<p>No goals found. Start by adding one!</p>";
    }
    $conn->close();
  ?>
</div>

</body>
</html>