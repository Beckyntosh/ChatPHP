<?php
// Create connection to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch the input from the user
    $habit = $_POST['habit'];
    $goal = $_POST['goal'];
    
    // Create a new PDO connection
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // SQL to create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS HabitTracker (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            habit VARCHAR(30) NOT NULL,
            goal VARCHAR(50),
            reg_date TIMESTAMP
        )";
        
        // Use exec() because no results are returned
        $conn->exec($sql);
        
        // SQL to insert new habit entry
        $sql = "INSERT INTO HabitTracker (habit, goal) VALUES ('$habit', '$goal')";
        
        // Use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hair Care Products - Habit Tracker</title>
    <style>
        /* Basic styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 50px;
        }
        input[type=text], input[type=submit] {
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
        }
        input[type=submit] {
            cursor: pointer;
            background-color: #ff4500;
            border: none;
            color: white;
        }
        input[type=text] {
            border: 2px solid #fff;
            background-color: #666;
            color: white;
        }
    </style>
</head>
<body>

<h2>Daily Habit Tracker</h2>

<form method="post">
  <input type="text" name="habit" placeholder="Enter habit (e.g., Drink water)" required><br>
  <input type="text" name="goal" placeholder="Goal (e.g., 2 liters daily)" required><br>
  <input type="submit" value="Add Habit">
</form>

</body>
</html>
