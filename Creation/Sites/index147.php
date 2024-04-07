<?php
// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create finance_goals table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  goal_name VARCHAR(50) NOT NULL,
  target_amount DOUBLE NOT NULL,
  saved_amount DOUBLE NOT NULL,
  target_date DATE NOT NULL,
  creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $goal_name = $_POST['goal_name'];
  $target_amount = $_POST['target_amount'];
  $saved_amount = $_POST['saved_amount'];
  $target_date = $_POST['target_date'];

  $stmt = $conn->prepare("INSERT INTO finance_goals (goal_name, target_amount, saved_amount, target_date) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sdds", $goal_name, $target_amount, $saved_amount, $target_date);

  if ($stmt->execute()) {
    echo "New goal created successfully!";
  } else {
    echo "Error: " . $stmt->error;
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
    <title>Personal Finance Goal Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #50a3a2;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #077187 1px solid;
        }
        content {
            padding: 20px;
        }
        input[type="text"], input[type="date"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
        }
        input[type="submit"] {
            background: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Personal Finance Goal Tracker</h1>
        </div>
    </header>
    <content class="container">
        <h2>Create a New Goal</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" name="goal_name" placeholder="Goal Name" required><br>
            <input type="number" step="any" name="target_amount" placeholder="Target Amount" required><br>
            <input type="number" step="any" name="saved_amount" placeholder="Amount Already Saved" required><br>
            <input type="date" name="target_date" placeholder="Target Date" required><br>
            <input type="submit" value="Create Goal">
        </form>
    </content>
</body>
</html>