<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection credentials
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

    $habitName = $_POST['habitName'];
    $habitGoal = $_POST['habitGoal'];
    $habitDate = date('Y-m-d'); // Current date
    
    // SQL to create table if it does not exist
    $sqlTable = "CREATE TABLE IF NOT EXISTS habit_tracker (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                    habitName VARCHAR(255) NOT NULL,
                    habitGoal VARCHAR(255) NOT NULL,
                    habitDate DATE NOT NULL,
                    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

    if ($conn->query($sqlTable) === TRUE) {
        // echo "Table habit_tracker created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // SQL to insert data
    $sqlInsert = "INSERT INTO habit_tracker (habitName, habitGoal, habitDate) VALUES ('$habitName', '$habitGoal', '$habitDate')";

    if ($conn->query($sqlInsert) === TRUE) {
        echo "<p>Habit successfully tracked!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Habit Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #333;
            display: inline-block;
        }
        label, input {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="number"] {
            width: 200px;
            padding: 10px;
        }
        input[type="submit"] {
            cursor: pointer;
            padding: 10px 20px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <form method="POST">
        <label for="habitName">Habit Name:</label>
        <input type="text" id="habitName" name="habitName" required>
        
        <label for="habitGoal">Habit Goal:</label>
        <input type="text" id="habitGoal" name="habitGoal" placeholder="e.g., Drink 2 liters of water daily" required>
        
        <input type="submit" value="Track Habit">
    </form>
</div>

</body>
</html>
