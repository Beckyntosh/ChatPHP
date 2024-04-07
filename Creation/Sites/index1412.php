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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS HabitTracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit VARCHAR(50) NOT NULL,
goal INT(10) NOT NULL,
logDate DATE NOT NULL,
quantity INT(10) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['quantity'])){
    $habit = 'Drink water';
    $goal = 2000; // 2 Liters
    $logDate = date('Y-m-d');
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO HabitTracker (habit, goal, logDate, quantity) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siis", $habit, $goal, $logDate, $quantity);
    
    if($stmt->execute()){
        echo "<div>Entry Added Successfully</div>";
    } else {
        echo "<div>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Habit Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; }
        .container { width: 80%; margin: auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        form { margin-top: 20px; }
        input[type=number], button { padding: 10px; }
        button { background-color: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .goal { background-color: #e7f7ff; padding: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daily Habit Tracker</h1>
        <div class="goal">Goal: Drink 2 liters of water daily</div>
        <form method="POST">
            <label for="quantity">Today's Quantity (ml):</label>
            <input type="number" id="quantity" name="quantity" min="0" step="100" required>
            <button type="submit">Add Entry</button>
        </form>
    </div>
</body>
</html>
