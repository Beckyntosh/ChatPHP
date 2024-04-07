<?php
// Set database connection
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
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  goal_title VARCHAR(255) NOT NULL,
  goal_amount DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goal_title = $_POST['goal_title'];
    $goal_amount = $_POST['goal_amount'];

    $sql = "INSERT INTO finance_goals (goal_title, goal_amount) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sd", $goal_title, $goal_amount);

    if ($stmt->execute()) {
        echo "New goal created successfully";
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
    <title>Personal Finance Goal Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; }
        form { margin-top: 20px; }
        input[type=text], input[type=number] { width: 100%; padding: 12px 20px; margin: 8px 0; box-sizing: border box; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create a Personal Finance Goal</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="goal_title">Goal Title</label>
        <input type="text" id="goal_title" name="goal_title" required>

        <label for="goal_amount">Goal Amount ($)</label>
        <input type="number" id="goal_amount" name="goal_amount" step="0.01" required>
        
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
