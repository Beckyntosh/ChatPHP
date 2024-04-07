<?php
// Configure error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
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
$table_sql = "CREATE TABLE IF NOT EXISTS finance_goals (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  goal_name VARCHAR(255) NOT NULL,
  goal_amount DECIMAL(10, 2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($table_sql) === TRUE) {
  die("Error creating table: " . $conn->error);
}

// Listen for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $goal_name = $_POST["goal_name"] ?? '';
  $goal_amount = $_POST["goal_amount"] ?? 0;

  $stmt = $conn->prepare("INSERT INTO finance_goals (goal_name, goal_amount) VALUES (?, ?)");
  $stmt->bind_param("sd", $goal_name, $goal_amount);

  if ($stmt->execute()) {
    echo "<script>alert('Finance goal added successfully!');</script>";
  } else {
    echo "<script>alert('Error: " . $stmt->error . "');</script>";
  }

  $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Personal Finance Goal</title>
  <style>
      body { font-family: Arial, sans-serif; }
      .container { max-width: 800px; margin: auto; }
      .form-group { margin-bottom: 15px; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Create a Personal Finance Goal</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label for="goal_name">Goal Name:</label>
        <input type="text" id="goal_name" name="goal_name" required>
      </div>
      <div class="form-group">
        <label for="goal_amount">Goal Amount ($):</label>
        <input type="number" id="goal_amount" name="goal_amount" step="0.01" required>
      </div>
      <button type="submit">Submit</button>
    </form>
    <hr>
    <h3>Current Goals</h3>
    <ul>
      <?php
      $sql = "SELECT id, goal_name, goal_amount FROM finance_goals";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<li>" . $row["goal_name"]. " - $" . number_format($row["goal_amount"], 2) . "</li>";
        }
      } else {
        echo "<li>No goals found</li>";
      }
      ?>
    </ul>
  </div>
</body>
</html>
<?php
$conn->close();
?>
