<?php
// Initialize the database connection
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

// Create finance_goals table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    target_amount DOUBLE NOT NULL,
    current_amount DOUBLE DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["goal_name"]) && isset($_POST["target_amount"])) {
  $goal_name = $_POST["goal_name"];
  $target_amount = $_POST["target_amount"];
  $sql = "INSERT INTO finance_goals (goal_name, target_amount) VALUES (?, ?)";
  
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sd", $goal_name, $target_amount);
  $stmt->execute();
  
  echo "New record created successfully";
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Finance Goal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .form-control label {
            display: block;
            margin-bottom: 5px;
        }

        .form-control input[type="text"],
        .form-control input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            margin: 10px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

<h2>Create a Personal Finance Goal</h2>

<form method="post">
    <div class="form-control">
        <label for="goal_name">Goal Name:</label>
        <input type="text" name="goal_name" id="goal_name" required>
    </div>
    
    <div class="form-control">
        <label for="target_amount">Target Amount ($):</label>
        <input type="number" name="target_amount" id="target_amount" step="0.01" required>
    </div>
    
    <button type="submit">Submit Goal</button>
</form>

</body>
</html>
